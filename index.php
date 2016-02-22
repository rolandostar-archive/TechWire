<?php 
include("scripts/config.inc.php");

$sql="SELECT COUNT(*) FROM version WHERE 1 AND ";
if(isset($_GET["categoria"])) $sql = "SELECT COUNT(*) FROM version,producto WHERE producto.idcategoria='".$_GET["categoria"]."' AND producto.idproducto = version.idproducto AND ";

if(isset($_GET["precio"])){
  switch ($_GET["precio"]) {
    case 0:$sql = $sql."precio < 250";                break;
    case 1:$sql = $sql."precio BETWEEN 250 AND 500";  break;
    case 2:$sql = $sql."precio BETWEEN 500 AND 1000"; break;
    case 3:$sql = $sql."precio BETWEEN 1000 AND 2000";break;
    case 4:$sql = $sql."precio > 2000";               break;
    default:$sql = $sql."1";                          break;
  }
}else $sql = $sql."1";
$results = mysqli_query($connecDB,$sql);
$get_total_rows = mysqli_fetch_array($results); //total
$pages = ceil($get_total_rows[0]/8);
?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <title>TechWire - Catalogo</title>
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

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/jquery.bootpag.min.js"></script>
  <?php require_once('scripts/catalog.php'); ?>

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
          <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Electrodomesticos');"><span>Electrodomesticos</span></a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Audio');"><span>Audio</span></a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','TV');"><span>TV y Video</span></a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Tecnologia');"><span>Tecnología</span></a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Videojuegos');"><span>Videojuegos</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Catalogo
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container catalog">
    <div class="two columns filter">
      <span>Filtrar por Precio</span>
      <li><a href="javascript:void(0)" onclick="setGetParameter('precio','0');">Menos de $250</a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('precio','1');">$250 - $500</a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('precio','2');">$500 - $1000</a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('precio','3');">$1000 - $2000</a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('precio','4');">Mas de $2000</a></li>
    </div>
    <div class="ten columns">
      <div class="products">
        <div class="twelve columns" id="results"></div>
      </div>
    </div>
  </div>
  <div class="pagination"></div>
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