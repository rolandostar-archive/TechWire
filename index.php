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
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/jquery.bootpag.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
  $("#results").load("scripts/fetch_pages.php");  //initial page number to load
  $(".pagination").bootpag({
   total: <?php echo $pages; ?>,
   page: 1,
   maxVisible: 10 
 }).on("page", function(e, num){
  e.preventDefault();
  $("#results").prepend('<div class="loading-indication"><img src="img/ajax-loader.gif" /> Loading...</div>');
  $("#results").load("scripts/fetch_pages.php", {'page':num});
});

});
</script>



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