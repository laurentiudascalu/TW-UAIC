<?php
	if(isset($_POST['editeazadate'])){
		$sql="SELECT * from `useri` where (`mail` = '".$_POST['mail']."' OR `tel` = '".$_POST['telefon']."' ) AND `id`!='".$user['id']."'";
		$result = mysqli_query($conn, $sql.'');
		$corect=1;
		if(mysqli_num_rows($result)>0){
			$corect=0;
		}
		if(!(validTel($_POST['telefon']))){
			$corect=0;
		}
		if(!(validMail($_POST['mail']))){
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
			$sql.=" where `id`='".$user['id']."'";
				if ($conn->query($sql) === TRUE) {
				    echo "Profil modificat";
				} else {
				    echo "Error updating record: " . $conn->error;
				}
				header('Location: '.$base_url.'contultau');
				exit;
		}else{
				$_SESSION["mesaj"]='Datele introduse nu sunt corecte';
				header('Location: '.$base_url.'contultau');
				exit;			
		}
	}

	if(isset($_POST['schimbaparola'])){
		$sql="SELECT * from `useri` where `parola` = '".$_POST['parolaveche']."' AND `id` = '".$user['id']."'";
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
					$sql = "UPDATE useri SET `parola`='".$_POST['parolanoua']."' WHERE `id` = '".$user['id']."'";
			}

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $conn->error;
			}
			header('Location: '.$base_url.'contultau');
			exit;
		}else{
				$_SESSION["mesaj"]='Datele introduse sunt gresite';
				header('Location: '.$base_url.'contultau');
				exit;	
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
		if(isset($_POST['judet']) && $_POST['judet']!=''){
			if($ok==0){
			$sql = "UPDATE useri SET `judet`='".$_POST['judet']."'";
			$ok=1;
		}elseif($ok==1){
			$sql.=", `judet`='".$_POST['judet']."'";
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
		$sql.=" where `id`='".$user['id']."'";

		if ($conn->query($sql) === TRUE) {
			$_SESSION["mesaj"]='Profil modificat cu succes';
		} else {
		    echo "Error updating record: " . $conn->error;
		}
		header('Location: '.$base_url.'profil');
		exit;
	}

	if(isset($_POST['stergecont'])){
		$sql='';
		if(isset($_POST['parola']) && $_POST['parola']!=''){
				$sql = "UPDATE useri SET `del`='1' where `id`='".$user['id']."'";
		}
		if ($conn->query($sql) === TRUE) {
		    $_SESSION["mesaj"]='Cont sters cu succes';
			header('Location: '.$base_url);
			exit;
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}

	if(isset($_POST['login'])){
		if($_POST['mail']!='' && $_POST['parola']!='' && !isset($_COOKIE['login'])){
			$sql="SELECT * FROM `useri` WHERE `mail` = '".$_POST['mail']."' AND `parola` = '".$_POST['parola']."'";
			$result = mysqli_query($conn, $sql);

		    if(mysqli_num_rows($result) > 0){
		      	while($row = mysqli_fetch_assoc($result)) { 
		        	$user=$row;
		      	}

		      	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
			    $cookie = ''; 
			    for ($i = 0; $i < 12; $i++) { 
			        $index = rand(0, strlen($characters) - 1); 
			        $cookie .= $characters[$index]; 
			    } 

			    $sql="INSERT INTO `login` SET `id_user` = '".$user['id']."' , `cookie` = '".$cookie."', `expire` = '".date('Y-m-d H:i:s',time()+60*60*24*365)."'";
			    //echo $sql; exit;
			    $result = mysqli_query($conn, $sql);

			    setcookie('login',$cookie,time()+60*60*24*365);
		    }
		}
		header('Location: '.$base_url);
		exit;
	}
	if(isset($_POST['addintrebare'])){
		$sql="";
		if(isset($_POST['titlu']) && $_POST['titlu']!='' && isset($_POST['categorie']) && $_POST['categorie']!='' && isset($_POST['taguri']) && $_POST['taguri']!='' && isset($_POST['intrebare']) && $_POST['intrebare']!=''){
				$sql="INSERT INTO `intrebari`(`id_user`, `id_categorie`, `titlu`, `text`, `data`) 
				VALUES ('".$user['id']."', '".$_POST['categorie']."', '".$_POST['titlu']."', '".$_POST['intrebare']."', '".date('Y-m-d H:i:s')."')";
		}
		$result = mysqli_query($conn, $sql);
		header('Location: '.$base_url); //redirect in intrebare
		exit;
	}
	if(isset($_POST['signup'])){
		$sql1="";
		$sql="select * from useri where (`mail`='".$_POST['mail']."' or `tel`='".$_POST['telefon']."')";
		$result = mysqli_query($conn, $sql);
 		if(mysqli_num_rows($result) == 0){
			if((isset($_POST['nume']) && $_POST['nume']!='') && (isset($_POST['mail']) && $_POST['mail']!='') && (isset($_POST['telefon']) && $_POST['telefon']!='') && (isset($_POST['parola']) && $_POST['parola']!='') && (isset($_POST['reparola']) && $_POST['reparola']!='')){
				if(validMail($_POST['mail']) && validTel($_POST['telefon']) && validParola($_POST['parola'])==1 && $_POST['parola']==$_POST['reparola']){
					$sql1="INSERT INTO `useri`(`mail`, `parola`, `nume_complet`, `tel`) VALUES ('".$_POST['mail']."','".$_POST['parola']."', '".$_POST['nume']."', '".$_POST['telefon']."')";
				}
			}
		}else{
			    $_SESSION["mesaj"]='Exista cont cu aceste';
				header('Location: '.$base_url.'contnou');
				exit;			
		}
		if ($conn->query($sql1) === TRUE) {
		    $_SESSION["mesaj"]='Cont creat cu succes';
			header('Location: '.$base_url);
			exit;
		} else {
		    $_SESSION["mesaj"]='Datele introduse sunt gresite';
			header('Location: '.$base_url.'contnou');
			exit;
		}
	}
	

 ?>