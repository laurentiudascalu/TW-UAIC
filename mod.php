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

	function getTaguri($id = -1, $nume = '', $id_intrebare=-1){
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

		$sql='select `A`.* from `taguri` as `A`';
		$sql.='left join `tag_leg` as `B` on `A`.`id` = `B`.`id_tag`';
		$ok=0;
		if($id!=-1){
			$sql.="where `A`.`id`='".$id."'";
			$ok=1;
		}
		if ($nume!=''){
			if($ok==1){
				$sql.=" and `A`.`tag`='".$nume."'";
			}else{
				$sql.="where `A`.`tag`='".$nume."'";
			}
		}
		if ($id_intrebare!=-1){
			if($ok==1){
				$sql.=" and `B`.`id_intrebare`='".$id_intrebare."'";
			}else{
				$sql.="where `B`.`id_intrebare`='".$id_intrebare."'";
			}
		}
		$sql.=" order by `ordine` ASC, `tag` ASC";
		return mysqli_query($conn,$sql);
	}
	function getIntrebari($id = -1, $id_user=-1, $id_cat = -1, $id_tag=-1, $rezolvata=-1, $search='', $de_la='', $pana_la='', $limit=array(), $order=array('data','DESC')){
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

		$sql='select `A`.*, `C`.`nume_complet` from `intrebari` as `A`';
		$sql.='left join `tag_leg` 	as `B` on `A`.`id` 		= `B`.`id_intrebare`';
		$sql.='left join `useri` 	as `C` on `A`.`id_user` = `C`.`id`';
		$ok=0;
		if($id!=-1){
			$sql.="where `A`.`id`='".$id."'";
			$ok=1;
		}
		if ($id_cat!=-1){
			if($ok==1){
				$sql.=" and `A`.`id_categorie`='".$id_cat."'";
			}else{
				$sql.="where `A`.`id_categorie`='".$id_cat."'";
			}
		}
		if ($id_user!=-1){
			if($ok==1){
				$sql.=" and `A`.`id_user`='".$id_user."'";
			}else{
				$sql.="where `A`.`id_user`='".$id_user."'";
			}
		}
		if ($rezolvata!=-1){
			if($ok==1){
				$sql.=" and `A`.`rezolvata`='".$rezolvata."'";
			}else{
				$sql.="where `A`.`rezolvata`='".$rezolvata."'";
			}
		}
		if ($de_la!=''){
			if($ok==1){
				$sql.=" and `A`.`data` >= '".$de_la."'";
			}else{
				$sql.="where `A`.`data` >= '".$de_la."'";
			}
		}
		if ($pana_la!=''){
			if($ok==1){
				$sql.=" and `A`.`data` <= '".$pana_la."'";
			}else{
				$sql.="where `A`.`data` <= '".$pana_la."'";
			}
		}
		if ($search!=''){
			if($ok==1){
				$sql.=" and (`A`.`titlu` LIKE %'".$search."'% OR `A`.`text` LIKE %'".$search."'%)";
			}else{
				$sql.="where (`A`.`titlu` LIKE %'".$search."'% OR `A`.`text` LIKE %'".$search."'%)";
			}
		}
		if ($id_tag!=-1){
			$id_tag=(array)$id_tag;
			$textTag='('.$id_tag[0];
			for($i=1; $i<count($id_tag); $i++){
				$textTag.=', '.$id_tag[$i];
			}
			$textTag.=')';
			if($ok==1){
				$sql.=" and `B`.`id_tag` in '".$textTag."'";
			}else{
				$sql.="where `B`.`id_tag` in '".$textTag."'";
			}
		}
		if(!empty($limit)){
			$sql.=" limit ".$limit[0].", ".$limit[1];
		}
		$sql.=" order by `".$order[0]."` ".$order[1];
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
	function goHome($base_url, $mesaj='Nu aveti acces in aceasta zona.'){
		$_SESSION["mesaj"]=$mesaj;
		header('Location: '.$base_url);
		exit;
	}	
?>