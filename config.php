<?php

/**
 * @author Shoaib
 * @copyright 2017
 */


function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "import_csv";
 
try {
   
    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>

<?php 
function fetch_all() {
  
	$con = getdb();
	$Sql = "SELECT * FROM product_data LIMIT 0, 10";
	$result = mysqli_query($con, $Sql);
	
	if (mysqli_num_rows($result) > 0) {
	    echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead>
                     <tr>
                          
                          <th>id</th>
                          <th>A</th>
                          <th>B</th>
                          <th>C</th>
                          <th>D</th>
                          <th>E</th>
                          <th>F</th>
                          <th>G</th>
                          <th>H</th>
                          <th>I</th>
                          <th>J</th>
                          <th>K</th>
                          <th>L</th>
                          <th>M</th>
                          <th>N</th>
                          <th>O</th>
                          <th>P</th>
                          <th>Q</th>
                          <th>R</th>
                          <th>S</th>
                          <th>T</th>
                          <th>U</th>
                          <th>V</th>
                          <th>W</th>
	           </tr></thead><tbody>";
	
	
	    while($row = mysqli_fetch_assoc($result)) {
	
	
	        echo "<tr>
                   <td>" . $row['id']."</td>
                   <td>" . $row['a']."</td>
                   <td>" . $row['b']."</td>
                   <td>" . $row['c']."</td>
                   <td>" . $row['d']."</td>
                   <td>" . $row['e']."</td>
                   <td>" . $row['f']."</td>
                   <td>" . $row['g']."</td>
                   <td>" . $row['h']."</td>
                   <td>" . $row['i']."</td>
                   <td>" . $row['j']."</td>
                   <td>" . $row['k']."</td>
                   <td>" . $row['l']."</td>
                   <td>" . $row['m']."</td>
                   <td>" . $row['n']."</td>
                   <td>" . $row['o']."</td>
                   <td>" . $row['p']."</td>
                   <td>" . $row['q']."</td>
                   <td>" . $row['r']."</td>
                   <td>" . $row['s']."</td>
                   <td>" . $row['t']."</td>
                   <td>" . $row['u']."</td>
                   <td>" . $row['v']."</td>
                   <td>" . $row['w']."</td>
               </tr>";
	    }
	
	    echo "</tbody></table></div>";
	
	} else {
	    echo "you have no records";
	}

}?>

