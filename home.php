<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <title>Manisha Maniar Classes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>
<body id="top">

<div class="bgded overlay">
    <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
            <div class="fl_left">
                <ul>
                    <li><i class="fa fa-phone"></i>+91 9820682840</li>
                    <li><i class="fa fa-envelope-o"></i> manishavmaniar@gmail.com</li>
                </ul>
            </div>
            <div class="fl_right">
                <ul>
                    <li><a href=""><i class="fa fa-lg fa-home"></i></a></li>
                    <?php
                    if (isset($_SESSION['SESS_FIRST_NAME'])) {
                        echo '<li style="font-size: 12px;">';
                        echo $_SESSION['SESS_FIRST_NAME'];
                        echo '</li> <li style="font-size: 12px;"><a href="pages/slide.php">My Resources</a></li>';
                        echo '</li> <li style="font-size: 12px;"><a href="pages/logout.php">Logout</a></li>';
                    }
                    else {
                        echo '<li style="font-size: 12px;"><a href="pages/login/login.php">Login</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left">
                <h1><a href="index.php">Manisha Maniar</a></h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a onclick="kolo" id="toregister" href="#register1">Register</a></li>
                    <li><a id="tocontactus" href="#contact_us">Contact Me At</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="slider" id = "slider1">
        <div style="background-image:url(images/class_pic.jpg)"></div>
        <div style="background-image:url(images/pic1.jpeg)"></div>
        <div style="background-image:url(images/pic2.jpeg)"></div>
        <div style="background-image:url(images/pic3.jpeg)"></div>
        <div style="background-image:url(images/pic4.jpeg)"></div>
        <div style="background-image:url(images/pic5.jpeg)"></div>
        <div style="background-image:url(images/pic6.jpeg)"></div>
        <div style="background-image:url(images/pic8.jpeg)"></div>

        <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
        <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
    </div>

</div>

<div class="wrapper row3">
    <main class="hoc container clear">
        <div class="center btmspace-80">
            <h3 class="heading">Testimonials</h3>
        </div>
        <ul class="nospace">
            <li class="one_quarter first">
                <article><a class="inverse" href="#"><i class="btmspace-30 icon fa fa-expand"></i></a>
                    <h6 class="heading font-x1">Mrs. Rushangi</h6>
                    <p> Thank you so much ..
                        Ma'am  for the support and help that you showered on our kids.They are really lucky to have a wonderful  teacher like you..</p>
                </article>
            </li>
            <li class="one_quarter">
                <article><a class="inverse" href="#"><i class="btmspace-30 icon fa fa-headphones"></i></a>
                    <h6 class="heading font-x1">Mrs. Madhavi Mehta</h6>
                    <p>You've been so much more than a teacher for us. You've been our mentor, our support and our guide. Thank you for everything ...</p>
                </article>
            </li>
            <li class="one_quarter">
                <article><a class="inverse" href="#"><i class="btmspace-30 icon fa fa-history"></i></a>
                    <h6 class="heading font-x1">Mrs. Shweta Kabra</h6>
                    <p>Thanx a lot miss. It was indeed our pleasure to send our children in such experienced hands </p>
                </article>
            </li>
        </ul>
        <li class="one_quarter">
            <article><a class="inverse" href="#"><i class="btmspace-30 icon fa fa-headphones"></i></a>
                <h6 class="heading font-x1">Mrs. Shah</h6>
                <p>Miss today Aryan also said that his fear for exam went because of you.  Thank you so much for all the love and affection you bestowed on our kids. My big gratitude to you.</p>
            </article>
        </li>

        <div class="clear"></div>
    </main>
</div>

<div class="wrapper bgded" style="background-image:url('images/3.jpg');">
    <div class="hoc split clear">
        <section>
            <h2 class="heading">More About Me</h2>
            <p class="btmspace-50"></p>
            <article><a href="#"><i class="icon fa fa-odnoklassniki"></i></a>
                <h6 class="heading font-x1">Love Children </h6>
                <p>I have been in this profession for the past 8 years. My affection with children is unparalleled.</p>
            </article>
            <article><a href="#"><i class="icon fa fa-object-ungroup"></i></a>
                <h6 class="heading font-x1">A 100% Dedication</h6>
                <p>I believe the each student is equal and they all should receive equal commitment from my side.</p>
            </article>
            <article><a href="#"><i class="icon fa fa-signing"></i></a>
                <h6 class="heading font-x1">Guaranteed Success</h6>
                <p>Every year my children sail through the exams with flying colours. I believe in putting my heart and soul into my work
                    which reflects in my childrens' results </p>
            </article>
        </section>
    </div>
</div>
<div id="register1" class="wrapper row2">
    <article class="hoc container clear">
        <div class="one_quarter first">
            <h3 class="heading font-x2">You are a short way from registering your child</h3>
        </div>
        <div class="three_quarter">
            <p class="nospace btmspace-30">Give Us Your Details And We will Get Back With You Soon Regarding The Admissions</p>
            <div><a class="btn" href="pages/register.php">Register &raquo;</a></div>
        </div>
    </article>
</div>

<div class="wrapper coloured">
    <article class="hoc cta clear">
        <h6 class="three_quarter first">Your child's future is in good hands :)</h6>
        <footer class="one_quarter"><div class="btn" id="yolo" onclick="change()">Click and smile</div></footer>
    </article>
</div>

<div id="contact_us" class="wrapper row4 bgded overlay">
    <footer id="footer" class="hoc clear">
        <div class="one_third first">
            <h6 class="title">Happy to help!</h6>
            <p>If you have general questions regarding the admission process or availability of batches then feel free to contact me!</p>
            <p class="btmspace-15">Please do respect a teacher's privacy and refrain from contacting me on a Sunday or during my class hours unless urgently required.</p>
        </div>
        <div class="one_third">
            <h6 class="title">Home Contact</h6>
            <ul class="nospace linklist contact">
                <li><i class="fa fa-map-marker"></i>
                    <address>
                        502, Diwani Mahal, Gulmohar Road No. 1, Juhu Scheme, Opposite Irla Masjid
                    </address>
                </li>
                <li><i class="fa fa-phone"></i> +91 9820682840  </li>
                <li><i class="fa fa-envelope-o"></i> manishavmaniar@gmail.com</li>
            </ul>
        </div>
        <div class="one_third">
            <h6 class="title">Class Address</h6>
            <ul class="nospace linklist">
                <li>
                    <article>
                        <p class="nospace">Garage No 1, Classique bldg, Gulmohar Road, Near Juhu Lane, Mumbai</p><br>
                    </article>
                </li>
            </ul>
        </div>
    </footer>
</div>

<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <p class="fl_right">Created by Aditya Maniar</p>
    </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.tocontactus.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
<script>
    function change()
    {
        if (document.getElementById("yolo").innerHTML=="Click and smile") document.getElementById("yolo").innerHTML = ":)";
        else document.getElementById("yolo").innerHTML = "Click and smile";
    }
</script>
<script src="layout/scripts/sliderResponsive.js"></script>
<script>
    $(document).ready(function() {

        $("#slider1").sliderResponsive({
            // Using default everything
            // slidePause: 5000,
            // fadeSpeed: 800,
            // autoPlay: "on",
            // showArrows: "off",
            // hideDots: "off",
            // hoverZoom: "on",
            // titleBarTop: "off"
        });
    });
</script>
<script>

    $(document).ready(function() {
        var id = Math.floor((Math.random() * 10000) + 1);
        alert("You have successfull registered. Your registration ID is " + id + ".\n Registration does not confirm admission. You will be notified about the admission personally. God bless.");
    });

</script>
</body>
</html>