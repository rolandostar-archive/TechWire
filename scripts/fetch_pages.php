<?php
include("config.inc.php"); //include config file
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else $page_number = 1;

$position = (($page_number-1) * 8);
//Limit our results within a specified range. 

if(isset($_POST["sql"])) $sql = "SELECT *".substr($_POST["sql"], 15);
else $sql = "SELECT * FROM version ORDER BY idproducto ASC";
$sql = $sql." LIMIT $position, 8";
//echo $sql;
$results = mysqli_query($connecDB, $sql);
if(mysqli_num_rows($results)>0){

//output results from database

echo '<table style="table-layout : fixed"><col width="25%"><col width="25%"><col width="25%"><col width="25%"><tr>'; $i=1;
while($row = mysqli_fetch_array($results)) {
    echo '<th><a href="detalle.php?id='.$row["idproducto"].'&color='.$row["color"].'"><img src="catalogo/'.$row["idproducto"].'/'.$row["color"].'/0.jpg" width=143px style="border-radius:15px;"><div class="info"><p style="margin-top:10px;">MXN $'.$row["precio"].'</p></div></a></th>';
    if($i%4 == 0) break; $i++;
}
mysqli_data_seek($results, 0); $i=1; //Reinicio
echo '</tr><tr>';
while($row = mysqli_fetch_array($results)) {
    echo '<td>'.$row["nombre"].'</td>';
    if($i%4 == 0) break; $i++;
}
echo '</tr></table style="table-layout : fixed"><col width="25%"><col width="25%"><col width="25%"><col width="25%"></div><div class="twelve columns"><table><tr>'; $i=1;
while($row = mysqli_fetch_array($results)) {
    echo '<th><a href="detalle.php?id='.$row["idproducto"].'&color='.$row["color"].'"><img src="catalogo/'.$row["idproducto"].'/'.$row["color"].'/0.jpg" width=143px style="border-radius:15px;"><div class="info"><p style="margin-top:10px;">MXN $'.$row["precio"].'</p></div></a></th>';
    if($i%4 == 0) break; $i++;
}
mysqli_data_seek($results, 4); //Reinicio parcial
echo '</tr><tr>';
while($row = mysqli_fetch_array($results)) echo '<td>'.$row["nombre"].'</td>';
echo '</tr></table>';
}else{
    echo '<h1>No se encontraron resultados</h1>';
}
?>
