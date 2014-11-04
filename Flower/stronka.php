
<table class = "tabelka">
  <tr>
    <td>Miniaturka</td>
    <td>Tytuł</td> 
    <td>Autor</td>
    <td>Ocena</td>
  </tr>
 <?php
 echo "<tr>";
 $array = array(array("http://i2.cdn.turner.com/cnn/dam/assets/130618174740-01-syria-refugees-horizontal-gallery.jpg","Syria, jaka piękna","Jacek Jackowski",5.0));
		foreach ($array as &$value) {
		echo"<td><img src=\"". $value[0] ."\"></img></td>";
		echo"<td>". $value[1] ."</td>";
		echo"<td>". $value[2] ."</td>";
		echo"<td>". $value[3] ."</td>";
		}
 echo "</tr>";
 ?>

</table>