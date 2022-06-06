<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include 'includes/includesMain.php';
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style/style.css">
    
 

      
    <title>Vite App</title>
  </head>
  <body>
  
  <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
  <script async src="https://unpkg.com/perlin-noise-3d"></script>  


<script type="importmap">
  {
    "imports": {
      "three": "https://unpkg.com/three/build/three.module.js"
    }
  }
</script>



    <canvas id="app">
      

    </canvas>
      <div class="main smooth-scroll-wrapper" >
        <div class="placement">
        <p class="title">Lorem ipsum</p>
        <p class="subtitle">Lorem ipsum</p>
        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur facilisis consectetur felis in eleifend. Nulla ut odio vel arcu venenatis vulputate. Sed libero massa, blandit nec condimentum a, porttitor interdum turpis. Quisque nec nunc diam. Maecenas tempor consequat odio vel commodo. Sed vel nibh dapibus, viverra nibh at, finibus odio. Nunc varius nisl iaculis nulla elementum, at pretium diam posuere. Morbi tincidunt sed nunc non volutpat. Etiam in augue iaculis, cursus libero eu, pellentesque libero.w</p>
        <a href="control/login.html"><p>Login</p></a>
        <a href="control/register.html"><p>Register</p></a>  
      </div>



      <div class="container">
        <?php 

    $obj = new Interact();
    $interogation = $obj->fetchPost();
    $imgpath = "media/";
    
    
    
    for($x=0;$x<count($interogation);$x++){
      echo "<br>";
      
      echo '<p class="postTitle">'.$interogation[$x]['title'].'</p>';
      echo '<p class="postContent">'.$interogation[$x]['content'].'</p>';
      //print_r($interogation);
      if (array_key_exists('img', $interogation[$x])) {
          for ($y=0;$y<count((array)$interogation[$x]['img']);$y++) {
              echo "<img class='postImg' src = ".$imgpath.$interogation[$x]['img'][$y]['fname']." width = '200' height = '200'>";
          }
      }
      
      
    }
    
    ?>
    </div>
      </div>
    

    <script type="module" src="./main.js"></script>
    <script type="application/javascript">
    const body = document.body,
scrollWrap = document.getElementsByClassName("smooth-scroll-wrapper")[0],
height = scrollWrap.getBoundingClientRect().height - 1,
speed = 0.07;

var offset = 0;

body.style.height = Math.floor(height) + "px";

function smoothScroll() {
offset += (window.pageYOffset - offset) * speed;

var scroll = "translateY(-" + offset + "px) translateZ(0)";
scrollWrap.style.transform = scroll;

callScroll = requestAnimationFrame(smoothScroll);
}

smoothScroll();
    </script>
    
  </body>
</html>
