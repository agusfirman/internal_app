<?php
include"../../include/koneksi.php";
$output_dir = "../../assets/images/uploads/";

if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
   {
    
    	if(!is_array($_FILES["myfile"]['name'])) //single file
    	{
            $RandomNum   = time();
            
            $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
            $ImageType      = $_FILES['myfile']['type']; 
            $ImageSize      = $_FILES['myfile']['size'];
			$tgl			= date('Y-m-d');
         
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;

       	 	move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
       	 	 //echo "<br> Error: ".$_FILES["myfile"]["error"];
       	 	 
	       	 	 $ret[$fileName]= $output_dir.$NewImageName;
				// mysql_query("insert into upload values('','$NewImageName','$ImageType','$ImageSize','$tgl')");
				
    	}
    	else
    	{
            $fileCount = count($_FILES["myfile"]['name']);
    		for($i=0; $i < $fileCount; $i++)
    		{
                $RandomNum   = time();
            
                $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
                $ImageType      = $_FILES['myfile']['type'][$i]; 
				$ImageSize      = $_FILES['myfile']['size'][$i];
				$tgl			= date('Y-m-d')[$i];
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
                
                $ret[$NewImageName]= $output_dir.$NewImageName;
    		    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$NewImageName );
				//
                //mysql_query("insert into upload values('','$NewImageName','$ImageType','$ImageSize','$tgl')");
    		}
    	}
    }
    echo json_encode($ret);
 
}

?>