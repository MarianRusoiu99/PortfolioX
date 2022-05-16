<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
// include 'includes/includesMain.php';
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css">
      
    <title>Vite App</title>
  </head>
  <body>
  
  <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    
<script type="importmap">
  {
    "imports": {
      "three": "https://unpkg.com/three/build/three.module.js"
    }
  }
</script>



    <canvas id="app">
      

    </canvas>
      <div class="main">
        <!-- <p><a href="try.php"> asdfsdsdf</a></p>
        <p><a href="control/dashboard.php"> dashboard</a></p>
        <p> SDFSDFASFSFSDF</p> -->
        <?php 

    // $obj = new Interact();
    // $interogation = $obj->fetchPost();
    // $imgpath = "media/";
    
    
    
    // for($x=0;$x<count($interogation);$x++){
    //   echo "<br>";
      
    //   echo '<p>'.$interogation[$x]['title'].'</p>';
    //   echo '<p>'.$interogation[$x]['content'].'</p>';
    //   //print_r($interogation);
    //   if (array_key_exists('img', $interogation[$x])) {
    //       for ($y=0;$y<count((array)$interogation[$x]['img']);$y++) {
    //           echo "<img src = ".$imgpath.$interogation[$x]['img'][$y]['fname']." width = '200' height = '200'>";
    //       }
    //   }
    //   echo "<br>";
      
    //   echo '<p>'.$interogation[$x]['title'].'</p>';
    //   echo '<p>'.$interogation[$x]['content'].'</p>';
    //   //print_r($interogation);
    //   if (array_key_exists('img', $interogation[$x])) {
    //       for ($y=0;$y<count((array)$interogation[$x]['img']);$y++) {
    //           echo "<img src = ".$imgpath.$interogation[$x]['img'][$y]['fname']." width = '200' height = '200'>";
    //       }
    //   }
    //   echo "<br>";
      
    //   echo '<p>'.$interogation[$x]['title'].'</p>';
    //   echo '<p>'.$interogation[$x]['content'].'</p>';
    //   //print_r($interogation);
    //   if (array_key_exists('img', $interogation[$x])) {
    //       for ($y=0;$y<count((array)$interogation[$x]['img']);$y++) {
    //           echo "<img src = ".$imgpath.$interogation[$x]['img'][$y]['fname']." width = '200' height = '200'>";
    //       }
    //   }
    //   echo "<br>";
      
    //   echo '<p>'.$interogation[$x]['title'].'</p>';
    //   echo '<p>'.$interogation[$x]['content'].'</p>';
    //   //print_r($interogation);
    //   if (array_key_exists('img', $interogation[$x])) {
    //       for ($y=0;$y<count((array)$interogation[$x]['img']);$y++) {
    //           echo "<img src = ".$imgpath.$interogation[$x]['img'][$y]['fname']." width = '200' height = '200'>";
    //       }
    //   }
      
    // }
    
    ?>

      </div>
    

    <script type="module" src="./main.js"></script>
    
  </body>
</html>
