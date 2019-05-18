<?php
	if(isset($_POST['editeazadate'])){
		$sql="SELECT * from `useri` where (`mail` = '".$_POST['mail']."' OR `tel` = '".$_POST['telefon']."' ) AND `id`!=1 ";
		$result = mysqli_query($conn, $sql.'');
		$corect=1;
		if(mysqli_num_rows($result)>0){
			$corect=0;
		}
		if(!(strlen($_POST['telefon'])>9 && is_numeric($_POST['telefon']))){
			$corect=0;
		}
		if(!(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))){
			$corect=0;
		}
		if($corect){
			$sql='';
			$ok=0;
			if(isset($_POST['nume']) && $_POST['nume']!=''){
				if($ok==0){
					$sql = "UPDATE useri SET `nume_complet`='".$_POST['nume']."'";
					$ok=1;
				}elseif($ok==1){
					$sql.=", `nume_complet`='".$_POST['nume']."'";
				}
			}
			if(isset($_POST['mail']) && $_POST['mail']!=''){
				if($ok==0){
					$sql = "UPDATE useri SET `mail`='".$_POST['mail']."'";
					$ok=1;
				}elseif($ok==1){
					$sql.=", `mail`='".$_POST['mail']."'";
				}
			}
			if(isset($_POST['telefon']) && $_POST['telefon']!=''){
				if($ok==0){
				$sql = "UPDATE useri SET `tel`='".$_POST['telefon']."'";
				$ok=1;
			}elseif($ok==1){
				$sql.=", `tel`='".$_POST['telefon']."'";
			}
			}
			$sql.=" where `id`='".$_POST['id']."'";
				if ($conn->query($sql) === TRUE) {
				    echo "Profil modificat";
				} else {
				    echo "Error updating record: " . $conn->error;
				}
				header('Location: '.$base_url.'contultau');
				exit;
		}else{
			echo 'Exista deja aceste date';
		}
	}

	if(isset($_POST['schimbaparola'])){
		$sql="SELECT * from `useri` where `parola` = '".$_POST['parolaveche']."' AND `id` = '".$_POST['id']."'";
		$result = mysqli_query($conn, $sql.'');
		$corect=1;
		if(mysqli_num_rows($result)==0){
			$corect=0;
		}
		if(!(strlen($_POST['parolanoua'])>=6 && $_POST['parolanoua']==$_POST['reparolanoua'])){
			$corect=0;
		}

		if($corect){
			$sql='';
			if(isset($_POST['parolaveche']) && $_POST['parolaveche']!='' && isset($_POST['parolanoua']) && $_POST['parolanoua']!='' && isset($_POST['reparolanoua']) && $_POST['reparolanoua']!=''){
					$sql = "UPDATE useri SET `parola`='".$_POST['parolanoua']."' WHERE `id` = '".$_POST['id']."'";
			}

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			header('Location: '.$base_url.'contultau');
			exit;
		}else{
			echo 'Eroare';
		}
	}

	if(isset($_POST['complprofil'])){
		$sql='';
		$ok=0;
		if(isset($_POST['oras']) && $_POST['oras']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `oras`='".$_POST['oras']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `oras`='".$_POST['oras']."'";
		}
		}
		if(isset($_POST['adresa']) && $_POST['adresa']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `adresa`='".$_POST['adresa']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `adresa`='".$_POST['adresa']."'";
		}
		}
		if(isset($_POST['datanastere']) && $_POST['datanastere']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `data_nasterii`='".$_POST['datanastere']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `data_nasterii`='".$_POST['datanastere']."'";
		}
		}
		if(isset($_POST['culoarepref']) && $_POST['culoarepref']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `culoare_preferata`='".$_POST['culoarepref']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `culoare_preferata`='".$_POST['culoarepref']."'";
		}
		}
		if(isset($_POST['mancarepref']) && $_POST['mancarepref']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `mancare_preferata`='".$_POST['mancarepref']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `mancare_preferata`='".$_POST['mancarepref']."'";
		}
		}
		if(isset($_POST['animalpref']) && $_POST['animalpref']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `animal_preferat`='".$_POST['animalpref']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `animal_preferat`='".$_POST['animalpref']."'";
		}
		}
		if(isset($_POST['descriere']) && $_POST['descriere']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `descriere`='".$_POST['descriere']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `descriere`='".$_POST['descriere']."'";
		}
		}
		$sql.=" where `id`='".$_POST['id']."'";

		if ($conn->query($sql) === TRUE) {
		    echo "Profil modificat";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
		header('Location: '.$base_url.'profil');
		exit;
	}

	if(isset($_POST['stergecont'])){
		$sql='';
		if(isset($_POST['parola']) && $_POST['parola']!=''){
				$sql = "UPDATE useri SET `del`='1' where `id`='".$_POST['id']."'";
		}
		if ($conn->query($sql) === TRUE) {
		    echo "Cont sters";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
		header('Location: '.$base_url.'stergecont');
		exit;
	}
 ?>