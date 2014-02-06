<?php include('connect_db.php');
      session_start();
       $thisPage="home"; 
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Alumni IITI</title>
    <link type="text/css" rel="stylesheet" href="menu.css"/>
    <link type="text/css" rel="stylesheet" href="style.css"/ >
    <link type="text/css" rel="stylesheet" href="themes/1/js-image-slider.css"/>

    <script src="jquery.js"></script>
    <script src="themes/1/js-image-slider.js"></script>
    <script type="text/javascript" src="menu.js"></script>
</head>
<body> 

<?php include('header.php'); ?>



    <div id="bgr1">
        <div id="sliderFrame">
            
            <div id="slider">
                
                <img src="images/1.jpg" alt="stay in touch">
                <img src="images/2.jpg" alt="year 2009" />
                <img src="images/3.jpg" alt="nostalgia" />
            </div>
        </div>
    </div>

    <article>
        <ul>
        <li>
        <div id="article1">
            <h1>IIT Indore Alumni</h1>
            <p>This web-portal serves the purpose of connecting the Alumni of IIT Indore. The full website will be functional soon. </p>
        </div>
        </li>
       
        <li>
        <div id="article2">
          <div id="text">
            <h1>Pioneer Batch</h1>
            <p>The first batch graduated from IIT Indore in June, 2013 thus making them the first Alumni of IIT Indore.</p>
          </div>
        </div>
        </li>

        <div style="clear:both"></div>
    </article>


<footer>
<div id="wrapper">
    <ul>
        <li><a href="#">Help</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Sitemap</a></li>
        <li><a href="#">Developers</a></li>
    </ul>
</div>
</footer>
</body>
</html>

