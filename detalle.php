<?php 
include("scripts/config.inc.php");

$id_producto = $_GET["id"];
$color = $_GET["color"];
$results = mysqli_query($connecDB, "SELECT * FROM version WHERE idproducto=".$id_producto." AND color='".$color."'");
while($row = mysqli_fetch_array($results)){
$nombre = $row["descripcion"];
$precio = $row["precio"];
  }

?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <title>TechWire - <?php echo $nombre?></title>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="scripts/jquery.bootpag.min.js"></script>
  <script type="text/javascript" src="scripts/megamenu.js"></script>

</head>
<body>
  <!-- Logos
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container title">
    <div class="row">
      <div class="one-half column">
        <a href="/"><img src="img/logo.png" width="198px"></a>
      </div>
      <div class="one-half column">
        <img class="u-pull-right" src="img/Sindral_AltLogo.png" height="55px">
      </div>
    </div>
  </div>
  <!-- Navegacion
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="nav">
    <div class="container navbar">
      <div class="menu">
        <ul>
          <li><a href="#"><span>Electrodomesticos</span></a>
            <ul>
              <li><a href="#">Refrigeradores</a></li>
              <li><a href="#">Microondas</a></li>
              <li><a href="#">Estufas</a></li>
            </ul>
          </li>
          <li><a href="#"><span>Audio</span></a>
            <ul>
              <li><a href="#">iPod y MP3</a></li>
              <li><a href="#">Bocinas</a></li>
              <li><a href='#'>Audifonos</a></li>
              <li><a href='#'>Estéreo</a></li>
            </ul>
          </li>
          <li><a href="#"><span>TV y Video</span></a>
            <ul>
              <li><a href='#'>DVD y Bluray</a></li>
              <li><a href='#'>Televisiones</a></li>
              <li><a href='#'>Proyectores</a></li>
            </ul>
          </li>
          <li><a href="#"><span>Tecnología</span></a>
            <ul>
              <li><a href='#'>Celulares</a></li>
              <li><a href='#'>Laptops</a></li>
              <li><a href='#'>Desktop PC</a></li>
              <li><a href='#'>Tablets</a></li>
            </ul>
          </li>
          <li><a href="#"><span>Videojuegos</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Catalogo
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container catalog">
    <div class="two columns filter">
      

    </div>
    <div class="ten columns">
  <div class="detalle">
    <h5>Nombre: <?php echo $nombre ?></h5>
    <h5>Precio: <?php echo $precio ?></h5>
    <h5>Imagen: <?php
echo '<img src="catalogo/'.$id_producto.'/'.$color.'.jpg" width=143px>';

     ?></h5>
  </div>
</div>
<div class="twelve columns">
</div>
  </div>
  <!-- Footer
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <a href="#"><img src="img/facebook-icon.png"/></a>
        <a href="#"><img src="img/google-plus-icon.png"/></a>
        <a href="#"><img src="img/twitter-icon.png"/></a>
      </div>
    </div>
  </div>
</body>
</html>