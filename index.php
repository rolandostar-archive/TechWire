<?php 
include("scripts/config.inc.php");
header('Content-Type: text/html; charset=utf-8');
$sql="SELECT COUNT(*) FROM version WHERE 1 AND ";
if(isset($_GET["categoria"])) $sql = "SELECT COUNT(*) FROM version,producto WHERE producto.idcategoria='".$_GET["categoria"]."' AND producto.idproducto = version.idproducto AND ";

if(isset($_GET["buscar"])){
  $sql = $sql."version.nombre LIKE '%".$_GET["buscar"]."%' AND ";
}

if(isset($_GET["precio"])){
  switch ($_GET["precio"]) {
    case 1:$sql = $sql."precio < 250";                break;
    case 2:$sql = $sql."precio BETWEEN 250 AND 500";  break;
    case 3:$sql = $sql."precio BETWEEN 500 AND 1000"; break;
    case 4:$sql = $sql."precio BETWEEN 1000 AND 2000";break;
    case 5:$sql = $sql."precio > 2000";               break;
    default:$sql = $sql."1";                          break;
  }
}else $sql = $sql."1";
//echo $sql;
$results = mysqli_query($connecDB,$sql);
$get_total_rows = mysqli_fetch_array($results); //total
$pages = ceil($get_total_rows[0]/8);
?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <title>TechWire - Catalogo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
  <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <?php require_once('scripts/catalog.php'); ?>

</head>
<body>
  <div class="page-wrap">
  <!-- Logos
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="title">
    <div class="row">
      <div class="one-half column">
        <a href="/"><img src="img/logo.png" width="198px"></a>
      </div>
    </div>
  </div>
  <!-- Navegacion
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div id="menu">
    <ul class="menu" align="center">
      <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Electrodomesticos');" class="menu"><span>Electrodomesticos</span></a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Audio');"  class="menu"><span>Audio</span></a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','TV');"  class="menu"><span>TV y Video</span></a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Tecnologia');"  class="menu"><span>Tecnología</span></a></li>
      <li><a href="javascript:void(0)" onclick="setGetParameter('categoria','Videojuegos');"  class="menu"><span>Videojuegos</span></a></li>
    </ul>
  </div> 
  <!-- Catalogo
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container catalog">
    <div class="row">
      <div class="twelve columns">
        <form action="/" method="GET" style="margin: 0 auto">
        <input type="text" name="buscar" id="Busqueda" placeholder="Buscar por Nombre"> <input type="submit">
        </form>
      </div>
    </div>
    <div class="row" style="height:530px">
      <div class="two columns filter">
        <div class="filter">
          <p>FILTRO POR PRECIO: </p>
          <li><a href="javascript:void(0)" onclick="setGetParameter('precio','1');">Menos de $250</a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('precio','2');">$250 - $500</a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('precio','3');">$500 - $1000</a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('precio','4');">$1000 - $2000</a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('precio','5');">Mas de $2000</a></li>
          <li><a href="javascript:void(0)" onclick="setGetParameter('precio','0');">Todos los precios</a></li>
        </div>
      </div>
    <div class="ten columns">
          <div class="twelve columns" id="results"></div>
      </div>
    </div>
    <div class="row">
      <div class="pagination"></div>
    </div>
  </div>
</div>
  <!-- Footer
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="site-footer">
    <div class="caja-redes">
      <a href="#" class="icono twitter"><img src="img/twitter.png" class="icont"><span></span></a>
      <a href="#" class="icono facebook"><img src="img/fb.png" class="iconfb"><span></span></a>
      <a href="#" class="icono google"><img src="img/gp.png" class="icongp"><span></span></a>
    </div>
    <div class="copyright">&copy; 2016, Made by Sindral Software. All rights reserved.</div>
  </div>
</body>
</html>