<?php 
include("scripts/config.inc.php");

$id_producto = $_GET["id"];
$color = $_GET["color"];
$results = mysqli_query($connecDB, "SELECT * FROM version WHERE idproducto=".$id_producto." AND color='".$color."'");
while($row = mysqli_fetch_array($results)){
  $nombre = $row["nombre"];
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
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="page-wrap">
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
          <li><a href="#"><span>Electrodomesticos</span></a></li>
          <li><a href="#"><span>Audio</span></a></li>
          <li><a href="#"><span>TV y Video</span></a></li>
          <li><a href="#"><span>Tecnología</span></a></li>
          <li><a href="#"><span>Videojuegos</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Catalogo
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container detail">
    <div class="row">
      <div class="twelve columns">
        <h1>Nombre producto</h1>
      </div>
    </div>
    <div class="row">
      <div class="one-third column">
        <div class="one-third column">
          <img src="img/aud1.jpg" width=90px>
          <img src="img/aud2.jpg" width=90px>
          <img src="img/aud3.jpg" width=90px>
        </div>
        <div class="two-thirds column">
          <img src="img/aud1.jpg" width=100%>
        </div>
      </div>
      <div class="two-thirds column">
        <div class="info_p">
          <p style="font-size:30px;  font-weight:bold;">MXN $479.00</p>
          Versiones disponibles:
          <br>
          <select class="ver">
          </select>
          <br>
          <div class="Ndesc">Descripción</div>
          
          <div class="descrip">
            Sinopsis: <br>
            gggg<br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Footer
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <footer class="site-footer">
    <div class="caja-redes">
      <a href="#" class="icono twitter"><img src="img/twitter.png" class="icont"><span></span></a>
      <a href="#" class="icono facebook"><img src="img/fb.png" class="iconfb"><span></span></a>
      <a href="#" class="icono google"><img src="img/gp.png" class="icongp"><span></span></a>
    </div>
    <div class="copyright">
      &copy; 2016, Sindral Software. All rights reserved.
    </div>
  </footer>
</body>
</html>