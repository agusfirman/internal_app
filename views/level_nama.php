<?php 
	if($data[level]=="1"){
      $level = "<font color='green'>administrator</font>";
    }else if($data[level]==2){
      $level = "<font color='orange'>op. keuangan</font>";
    }else if($data[level]==3){
      $level = "<font color='orange'>op. IGD</font>";
    }else if($data[level]==4){
      $level = "<font color='red'>Perawat Lt.1</font>";
    }else if($data[level]==5){
      $level = "<font color='red'>Perawat Lt.2</font>";
    }else if($data[level]==6){
      $level = "<font color='red'>Perawat Lt.3</font>";
    }else if($data[level]==7){
      $level = "<font color='red'>Poliklinik</font>";
    }else if($data[level]==8){
      $level = "<font color='red'>VK</font>";
    }else if($data[level]==9){
      $level = "<font color='red'>NICU</font>";
    }else if($data[level]==10){
      $level = "<font color='red'>OK</font>";
    }else if($data[level]==11){
      $level = "<font color='red'>Kamar Bayi</font>";
    }else if($data[level]==12){
      $level = "<font color='red'>Lainya</font>";
    }
 ?>
        