<?php 
include("scripts/config.inc.php");

$id_producto = $_GET["id"];
$color = $_GET["color"];
$results = mysqli_query($connecDB, "SELECT * FROM version WHERE idproducto=".$id_producto." AND color='".$color."'");
$nomcat= mysqli_query($connecDB, "SELECT DISTINCT idcategoria FROM categorias, producto WHERE idproducto=".$id_producto."");
$versiones = mysqli_query($connecDB, "SELECT color FROM version WHERE idproducto=".$id_producto);

while($row = mysqli_fetch_array($results)){
  $nombre = $row["nombre"];
  $precio = $row["precio"];
  $sinopsis = $row["sinopsis"];
}

while($row = mysqli_fetch_array($nomcat)){
  $ncat = $row["idcategoria"];
}

?><!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <title>TechWire - <?php echo $nombre?></title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/style.css">
  <script>

    function setGetParameter(paramName, paramValue) {
      var url = window.location.href;
      var hash = location.hash;
      url = url.replace(hash, '');
      if (url.indexOf(paramName + "=") >= 0)
      {
        var prefix = url.substring(0, url.indexOf(paramName));
        var suffix = url.substring(url.indexOf(paramName));
        suffix = suffix.substring(suffix.indexOf("=") + 1);
        suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
        url = prefix + paramName + "=" + paramValue + suffix;
      }
      else
      {
        if (url.indexOf("?") < 0)
          url += "?" + paramName + "=" + paramValue;
        else
          url += "&" + paramName + "=" + paramValue;
      }
      window.location.href = url + hash;
    }
  </script>
</script>
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
      <li><a href="index.php?categoria=Electrodomesticos" class="menu"><span>Electrodomesticos</span></a></li>
      <li><a href="index.php?categoria=Audio"  class="menu"><span>Audio</span></a></li>
      <li><a href="index.php?categoria=TV" class="menu"><span>TV y Video</span></a></li>
      <li><a href="index.php?categoria=Tecnologia"  class="menu"><span>Tecnología</span></a></li>
      <li><a href="index.php?categoria=Videojuegos"  class="menu"><span>Videojuegos</span></a></li>
    </ul>
  </div>
  <!-- Catalogo
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div id="dNav">
    <p><a href='index.php'>INICIO</a> > <a href='index.php?categoria=<?php echo $ncat?>'><?php echo $ncat?></a> > <label><?php echo $nombre?></label> </p>
  </div>
  <div id="nameC">
    <p style="color:#55C1E7;"><?php echo $nombre?></p>
  </div>
  <div class="jMyCarousel">
    <ul>
      <li><a href="#img1"><?php echo '<img src="catalogo/'.$id_producto.'/'.$color.'/0.jpg" width=90px>'?></a></li>
      <li><a href="#img2"><?php echo '<img src="catalogo/'.$id_producto.'/'.$color.'/1.jpg" width=90px>'?></a></li>
      <li><a href="#img3"><?php echo '<img src="catalogo/'.$id_producto.'/'.$color.'/2.jpg" width=90px>'?></a></li>
    </ul>
  </div>
  <div id="iCont">
    <div id="img1"><?php echo '<img src="catalogo/'.$id_producto.'/'.$color.'/0.jpg" width=100%>'?></div>
    <div id="img2"><?php echo '<img src="catalogo/'.$id_producto.'/'.$color.'/1.jpg" width=100%>'?></div>
    <div id="img3"><?php echo '<img src="catalogo/'.$id_producto.'/'.$color.'/2.jpg" width=100%>'?></div>        </div>    
    <div class="info_p">
      <p style="font-size:30px;  font-weight:bold;">MXN $<?php echo $precio?>.00</p>
      <?php if ($id_producto==25||$id_producto==30){
        echo '<br>';
}else{
       ?>
      Versiones disponibles:
      <br>
      <select onchange="console.log(this.options[this.selectedIndex].value);setGetParameter('color',this.options[this.selectedIndex].value);">
        <?php
        while($row = mysqli_fetch_array($versiones)){
          if ($row["color"]==$color) echo '<option value="'.$row["color"].'" selected="selected">'.$row["color"].'</option>';
          else echo '<option value="'.$row["color"].'">'.$row["color"].'</option>';
        }
        ?>
      </select>
      <br>
      <?php } ?>
      <div class="Ndesc">Descripción</div>

      <div class="descrip">
        <?php echo $sinopsis?><br>
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
    <div class="copyright">&copy; 2016, Sindral. All rights reserved.</div>
  </div>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js?ver=1.4.4"></script>
  <script type="text/javascript">
  $(document).ready(function(){ // Script de la Galeria
    $('#iCont div').css('position', 'absolute').not(':first').hide();
    $('#iCont div:first').addClass('aqui');
    $('.jMyCarousel a').click(function(){
      $('#iCont div.aqui').fadeOut(400);
      $('#iCont div').removeClass('aqui').filter(this.hash).fadeIn(400).addClass('aqui');
      return false;
    });
  });
</script> 
</body>
</html>