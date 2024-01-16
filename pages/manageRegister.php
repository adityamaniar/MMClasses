<?php
  require_once("connection.php");
  //require_once("auth.php");
  $std = $_GET['std'];
?>
<html>
  <head>
    <title>Registered Students</title>
    <style type="text/css">
      body {
        font-size: 15px;
        color: #343d44;
        font-family: "segoe-ui", "open-sans", tahoma, arial;
      }
      table {
        margin: auto;
        font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
        font-size: 12px;
      }

      h1 {
        margin: 25px auto 0;
        text-align: center;
        text-transform: uppercase;
        font-size: 17px;
      }

      table td {
        transition: all .5s;
        text-align: center;
      }
      
      /* Table */
      .data-table {
        border-collapse: collapse;
        font-size: 14px;
        min-width: 537px;
      }

      .data-table th, 
      .data-table td {
        border: 1px solid #e1edff;
        padding: 7px 17px;
      }

      /* Table Header */
      .data-table thead th {
        background-color: #508abb;
        color: #FFFFFF;
        border-color: #6ea1cc !important;
        text-transform: uppercase;
      }

      /* Table Body */
      .data-table tbody td {
        color: #353535;
      }
      .data-table tbody td:first-child,
      .data-table tbody td:nth-child(4),
      .data-table tbody td:last-child {
        
      }

      .data-table tbody tr:nth-child(odd) td {
        background-color: #f4fbff;
      }
      .data-table tbody tr:hover td {
        background-color: #ffffa2;
        border-color: #ffff0f;
      }

      /* Table Footer */
      .data-table tfoot th {
        background-color: #e5f5ff;
        text-align: right;
      }
      .data-table tfoot th:first-child {
        text-align: left;
      }
      
    </style>
  </head>
  <body>
    <h1>Standard <?php echo $std; ?></h1>
    <table class="data-table">
      <thead>
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Parent Name</th>
          <th>Reference By</th>
          <th>Mobile Number</th>
          <th>Residential Number</th>
          <th>Year</th>
          <th>Date Registered</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
        $sql = "SELECT * FROM student WHERE std='$std' ORDER BY date";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          $no   = 1;
          while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
              <td>'.$no.'</td>
              <td>'.$row['name'].'</td>
              <td>'.$row['pname'].'</td>
              <td>'.$row['rname'].'</td>
              <td>'.$row['mbl'].'</td>
              <td>'.$row['res'].'</td>
              <td>'.$row['year'].'</td>
              <td>'. date('F d, Y', strtotime($row['date'])) . '</td>
              <td><a href="deleteRowStudent.php?id='.$row['Sr_no'].'&std='.$row['std'].'">x</a></td>
            </tr>';
            $no++;
          }
        }
      ?>
      </tbody>
    </table>
  </body>
</html>