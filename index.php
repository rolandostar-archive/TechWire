<?php 
include("scripts/config.inc.php");

$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM version ORDER BY idproducto");
$get_total_rows = mysqli_fetch_array($results); //total

//Division
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
  <script type="text/javascript" src="scripts/sindral.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
  $("#results").load("scripts/fetch_pages.php");  //initial page number to load
  $(".pagination").bootpag({
   total: <?php echo $pages; ?>,
   page: 1,
   maxVisible: 5 
 }).on("page", function(e, num){
  e.preventDefault();
  $("#results").prepend('<div class="loading-indication"><img src="img/ajax-loader.gif" /> Loading...</div>');
  $("#results").load("scripts/fetch_pages.php", {'page':num});
});

});
</script>



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
      <span>Filtrar por Precio</span>
      <li><a href="#">Menos de $250</a></li>
      <li><a href="#">$250 - $500</a></li>
      <li><a href="#">$500 - $1000</a></li>
      <li><a href="#">$1000 - $2000</a></li>
      <li><a href="#">Mas de $2000</a></li>
    </div>
    <div class="ten columns">
      <div class="products">
        <div class="twelve columns" id="results"></div>
      </div>
    </div>
  </div>
        <div class="pagination"></div>
  <!-- Footer
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="footer">
    <div class="caja-redes">
    <a href="#" class="icono twitter"><img src="../img/twitter.png" class="icont"><span></span></a>
      <a href="#" class="icono facebook"><img src="../img/fb.png" class="iconfb"><span></span></a>
      <a href="#" class="icono google"><img src="../img/gp.png" class="icongp"><span></span></a>
    </div>
    <div class="copyright">
      &copy; 2016, Sindral Software. All rights reserved.
    </div>
  </div>
</body>
</html>