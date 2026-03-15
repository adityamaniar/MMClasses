<?php
session_start();

// Security check - only allow admin
if (!isset($_SESSION['SESS_FIRST_NAME']) || $_SESSION['SESS_FIRST_NAME'] != 'admin') {
    header('Location: ../index.php');
    exit();
}

require('connection.php');

$uploadDir = __DIR__ . '/../images/';
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
$maxFileSize = 5 * 1024 * 1024; // 5MB

// Handle Upload
if (isset($_POST['upload']) && isset($_FILES['slider_image'])) {
    $file = $_FILES['slider_image'];

    // Validate file type
    if (!in_array($file['type'], $allowedTypes)) {
        header('Location: ../index.php?error=Invalid file type. Only JPG, PNG, GIF, and WebP are allowed.');
        exit();
    }

    // Validate upload error
    if ($file['error'] !== UPLOAD_ERR_OK) {
        header('Location: ../index.php?error=Upload failed. Please try again.');
        exit();
    }

    // Get file extension and create safe filename
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $basename = pathinfo($file['name'], PATHINFO_FILENAME);
    $safeName = preg_replace('/[^a-zA-Z0-9_-]/', '', $basename);
    $filename = $safeName . '_' . time() . '.' . $extension;

    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $filename)) {
        // Get max display_order and add 1
        $result = mysqli_query($conn, "SELECT MAX(display_order) as max_order FROM slider_images");
        $row = mysqli_fetch_assoc($result);
        $newOrder = ($row['max_order'] ?? 0) + 1;

        // Insert into database
        $stmt = mysqli_prepare($conn, "INSERT INTO slider_images (filename, display_order) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, 'si', $filename, $newOrder);
        mysqli_stmt_execute($stmt);

        header('Location: ../index.php?success=Image uploaded successfully.');
        exit();
    } else {
        header('Location: ../index.php?error=Failed to move uploaded file.');
        exit();
    }
}

// Handle Delete
if (isset($_POST['delete']) && isset($_POST['image_id']) && isset($_POST['filename'])) {
    $imageId = (int)$_POST['image_id'];
    $filename = basename($_POST['filename']); // Prevent path traversal

    // Delete from database
    $stmt = mysqli_prepare($conn, "DELETE FROM slider_images WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $imageId);

    if (mysqli_stmt_execute($stmt)) {
        // Delete file from server
        $filePath = $uploadDir . $filename;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        header('Location: ../index.php?success=Image deleted successfully.');
        exit();
    } else {
        header('Location: ../index.php?error=Failed to delete image from database.');
        exit();
    }
}

// Invalid request
header('Location: ../index.php');
exit();
?>