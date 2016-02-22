<?php
include("config.inc.php"); //include config file
//sanitize post value
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * 8);

//Limit our results within a specified range. 
$sql = "SELECT * FROM version ORDER BY idproducto ASC LIMIT $position, 8";
$results = mysqli_query($connecDB, $sql);

//output results from database

/*echo '<ul class="page_result">';*/
echo '<table><tr>'; $i=1;
while($row = mysqli_fetch_array($results))
{
    echo '<th><a href="detalle.php?id='.$row["idproducto"].'&color='.$row["color"].'"><img src="catalogo/'.$row["idproducto"].'/'.$row["color"].'.jpg" width=143px></a></th>';
    if($i%4 == 0) break;
    /*echo '<li id="item_'.$row["id"].'">'.$row["id"].'. <span class="page_name">'.$row["name"].'</span><span class="page_message">'.$row["message"].'</span></li>';*/
    $i++;
}
mysqli_data_seek($results, 0); $i=1;
/*echo '</ul>';*/
echo '</tr><tr>';
while($row = mysqli_fetch_array($results))
{
    echo '<td>'.$row["nombre"].'</td>';
    if($i%4 == 0) break;
    $i++;
}
echo '</tr></table>
        </div>
        <div class="twelve columns">
          <table>
            <tr>'; $i=1;
while($row = mysqli_fetch_array($results))
{
    echo '<th><a href="detalle.php?id='.$row["idproducto"].'&color='.$row["color"].'"><img src="catalogo/'.$row["idproducto"].'/'.$row["color"].'.jpg" width=143px></a></th>';
    if($i%4 == 0) break;
    $i++;
}
mysqli_data_seek($results, 4);
echo '</tr><tr>';
while($row = mysqli_fetch_array($results))
{
    echo '<td>'.$row["nombre"].'</td>';
}
echo '</tr>
          </table>';
?>