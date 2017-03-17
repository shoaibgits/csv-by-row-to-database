<?php
include 'config.php';
$con = getdb();
 if(isset($_POST["Import"])){
    
		$filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
		  	$rowCount = 0 ;
		  	$secondColumnArray = array();
		  	
	        while (($getData = fgetcsv($file,  100000, ",")) !== FALSE)
	         {
	         if($rowCount >=0 && $rowCount <=500 ){
	             if(strpos($getData[0],"Bestand")!==false){
                 array_push($secondColumnArray, $getData[0]);
	               }
                 foreach ($secondColumnArray as $all_elements){
                   
                    $all_elements_refine = explode(',', $all_elements);
                    
                    $new_refine =  $all_elements_refine[0];
                    
                    $all_elements_refine1 = explode(';', $new_refine);
                    
                    $specialChars = array(" ", "\r", "\n", '"', "*");
                    $replaceChars = array("", "", "");
                    $all_elements_refine2 = str_replace($specialChars, $replaceChars, $all_elements_refine1);
                    
                     $a_ele = $all_elements_refine2[0];
                     $b_ele = $all_elements_refine2[1];
                     $c_ele = $all_elements_refine2[2];
                     $d_ele = $all_elements_refine2[3];
                     $e_ele = $all_elements_refine2[4];
                     $f_ele = $all_elements_refine2[5];
                     $g_ele = $all_elements_refine2[6];
                     $h_ele = $all_elements_refine2[7];
                     $i_ele = $all_elements_refine2[8];
                     $j_ele = $all_elements_refine2[9];
                     $k_ele = $all_elements_refine2[10];
                     $l_ele = $all_elements_refine2[11];
                     $m_ele = $all_elements_refine2[12];
                     $n_ele = $all_elements_refine2[13];
                     $o_ele = $all_elements_refine2[14];
                     $p_ele = $all_elements_refine2[15];
                     $q_ele = $all_elements_refine2[16];
                     $r_ele = $all_elements_refine2[17];
                     $s_ele = $all_elements_refine2[18];
                     $t_ele = $all_elements_refine2[19];
                     $u_ele = $all_elements_refine2[20];
                     $v_ele = $all_elements_refine2[21];
                     $w_ele = $all_elements_refine2[22];
                     
                    
                   //$sql = "INSERT INTO `product_data`(`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `u`, `v`, `w`)
                  // values ('".$a_ele."','".$b_ele."','".$c_ele."','".$d_ele."','".$e_ele."' ,'".$f_ele."' ,'".$g_ele."','".$h_ele."','".$i_ele."','".$j_ele."','".$k_ele."','".$l_ele."','".$m_ele."','".$n_ele."','".$o_ele."','".$p_ele."','".$q_ele."','".$r_ele."','".$s_ele."','".$t_ele."','".$u_ele."','".$v_ele."','".$w_ele."')";
                    //echo $result = mysqli_query($con, $sql);
                   //echo "<pre>"; print_r($all_elements_refine); echo "</pre>";
                     //echo "<pre>";  print_r($all_elements_refine); echo "</pre>";
                     //array_push($secondColumnsArray, $all_elements);
                   // echo "<pre>";  print_r($secondColumnsArray); echo "</pre>";
                     
                 }
                    
	         }
                     ++$rowCount;
	       
	         }
	         
	        echo "<pre>"; print_r($secondColumnArray);   echo "</pre>"; 
	         fclose($file);	
		 }
	}	 

	
	
	if(isset($_POST["Export"])){
	    	
	    header('Content-Type: text/csv; charset=utf-8');
	    header('Content-Disposition: attachment; filename=data.csv');
	    $output = fopen("php://output", "w");
	    fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date'));
	    $query = "SELECT * from product_data ORDER BY id DESC";
	    $result = mysqli_query($con, $query);
	    while($row = mysqli_fetch_assoc($result))
	    {
	        fputcsv($output, $row);
	    }
	    fclose($output);
	}
	

	
	
	function correct_csv_data($input) {
	    ##mysql_connect("localhost", "root", "TXF2JFUeEHKLF54M") or die('SERVER DATABASE CONNECTION ERROR');
	    $input = filter_var($input, FILTER_SANITIZE_STRING);
	    $input = mb_convert_encoding($input, 'UTF-8', 'HTML-ENTITIES');
	    $input = mysql_real_escape_string($input);
	    return $input;
	}
 ?>