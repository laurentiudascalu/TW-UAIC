<?php
	function getCategorii($id = -1, $nume = ''){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "twuaic";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit;
		}

		$sql='select * from `categorii` ';
		$ok=0;
		if($id!=-1){
			$sql.="where `id`='".$id."'";
			$ok=1;
		}
		if ($nume!=''){
			if($ok==1){
				$sql.=" and `categorie`='".$nume."'";
			}else{
				$sql.="where `categorie`='".$nume."'";
			}
		}
		$sql.=" order by `ordine` ASC, `categorie` ASC";
		return mysqli_query($conn,$sql);
	}

	function getTaguri($id = -1, $nume = ''){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "twuaic";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit;
		}

		$sql='select * from `taguri` ';
		$ok=0;
		if($id!=-1){
			$sql.="where `id`='".$id."'";
			$ok=1;
		}
		if ($nume!=''){
			if($ok==1){
				$sql.=" and `tag`='".$nume."'";
			}else{
				$sql.="where `tag`='".$nume."'";
			}
		}
		$sql.=" order by `ordine` ASC, `tag` ASC";
		return mysqli_query($conn,$sql);
	}
	function validMail($mail = ''){
		if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
			return 1;
		}else{
			return 0;
		}
	}
	function validTel($tel = ''){
		if(strlen($tel)>9 && is_numeric($tel)){
			return 1;
		}else {
			return 0;
		}
	}
	function validParola($pas = ''){
		if(strlen($pas)>=6){
			return 1;
		}else {
			return 0;
		}
	}	
?>