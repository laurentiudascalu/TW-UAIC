<?php
	if(isset($_POST['editeazadate'])){
		$sql="SELECT * from `useri` where (`mail` = '".$_POST['mail']."' OR `tel` = '".$_POST['telefon']."' ) AND `id`!='".$user['id']."'";
		$result = mysqli_query($conn, $sql.'');
		$corect=1;
		$gresit=0;
		if(mysqli_num_rows($result)>0){
			$corect=0;
			$gresit=1;
		}
		if(!(validTel($_POST['telefon']))){
			$corect=0;
			$gresit=2;
		}
		if(!(validMail($_POST['mail']))){
			$corect=0;
			$gresit=3;
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
			}else{
				$gresit=4;
			}
			if(isset($_POST['mail']) && $_POST['mail']!=''){
				if($ok==0){
					$sql = "UPDATE useri SET `mail`='".$_POST['mail']."'";
					$ok=1;
				}elseif($ok==1){
					$sql.=", `mail`='".$_POST['mail']."'";
				}
			}else{
				$gresit=5;
			}
			if(isset($_POST['telefon']) && $_POST['telefon']!=''){
				if($ok==0){
				$sql = "UPDATE useri SET `tel`='".$_POST['telefon']."'";
				$ok=1;
				}elseif($ok==1){
					$sql.=", `tel`='".$_POST['telefon']."'";
				}
			}else{
				$gresit=6;
			}
			$sql.=" where `id`='".$user['id']."'";
		}
		if($gresit==1){
			$_SESSION["mesaj"]='Mailul sau telefonul exista in baza de date';				
		}elseif($gresit==2){
			$_SESSION["mesaj"]='Telefonul nu este valid';
		}elseif($gresit==3){
			$_SESSION["mesaj"]='Mailul nu este valid';
		}elseif($gresit==4){
			$_SESSION["mesaj"]='Numele trebuie sa fie completat';
		}elseif($gresit==5){
			$_SESSION["mesaj"]='Mailul trebuie sa fie completat';
		}elseif($gresit==6){
			$_SESSION["mesaj"]='Telefonul trebuie sa fie completat';
		}elseif($gresit==0){
			$result=mysqli_query($conn, $sql);
			$_SESSION["mesaj"]='Date editate cu succes';
			header('Location: '.$base_url);
			exit;
		}
		
		header('Location: '.$base_url.'contultau');
		exit;
	}

	if(isset($_POST['schimbaparola'])){
		$sql="SELECT * from `useri` where `parola` = '".$_POST['parolaveche']."' AND `id` = '".$user['id']."'";
		$result = mysqli_query($conn, $sql.'');
		$corect=1;
		$gresit=0;
		if(mysqli_num_rows($result)==0){
			$corect=0;
			$gresit=1;
		}
		if(!( $_POST['parolanoua']==$_POST['reparolanoua'])){
			$corect=0;
			$gresit=2;
		}
		if(!(validParola($_POST['parolanoua']))){
			$corect=0;
			$gresit=4;
		}
		if($corect){
			$sql='';
			if(isset($_POST['parolaveche']) && $_POST['parolaveche']!='' && isset($_POST['parolanoua']) && $_POST['parolanoua']!='' && isset($_POST['reparolanoua']) && $_POST['reparolanoua']!=''){
					$sql = "UPDATE useri SET `parola`='".$_POST['parolanoua']."' WHERE `id` = '".$user['id']."'";
			}else{
				$gresit=3;
			}
		}
		if($gresit==1){
			$_SESSION["mesaj"]='Parola veche este gresita';				
		}elseif($gresit==2){
			$_SESSION["mesaj"]='Parola repetata si parola noua trebuie sa fie la fel';
		}elseif($gresit==3){
			$_SESSION["mesaj"]='Toate campurile trebuie sa fie completate';
		}elseif($gresit==0){
			$result=mysqli_query($conn, $sql);
			$_SESSION["mesaj"]='Parola schimbata cu succes';
			header('Location: '.$base_url);
			exit;
		}elseif($gresit==4){
			$_SESSION["mesaj"]='Parola noua nu este valida';
		}
		header('Location: '.$base_url.'contultau');
		exit;
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
		$sql="SELECT * from `useri` where `parola` = '".$_POST['parola']."' AND `id` = '".$user['id']."'";
		$gresit=0;
		$corect=1;
		$result = mysqli_query($conn, $sql.'');
		$sql='';
		if(mysqli_num_rows($result)==0){
			$corect=0;
			$gresit=1;
		}
		if ($corect){
			if(validParola($_POST['parola']) && isset($_POST['parola']) && $_POST['parola']!=''){
					$sql = "UPDATE useri SET `del`='1' where `id`='".$user['id']."'";
			}		
		}		
		if($gresit==0){
			$result=mysqli_query($conn, $sql);
			$_SESSION["mesaj"]='Cont sters cu succes';
			header('Location: '.$base_url);
			exit;
		}elseif($gresit==1){
			$_SESSION["mesaj"]='Parola gresita';
			header('Location: '.$base_url.'stergecont');
			exit;
		}
	}

	if(isset($_POST['login'])){
		$gresit=0;
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
		    }else{
		    	$gresit=1;
		    }
		}else{
			$gresit=2;
		}
		if($gresit==0){
			$result=mysqli_query($conn, $sql);
			$_SESSION["mesaj"]='Te-ai autentificat cu succes';
			header('Location: '.$base_url);
			exit;
		}elseif($gresit==1){
			$_SESSION["mesaj"]='Nu exista cont cu aceste date';
			header('Location: '.$base_url.'login');
			exit;	
		}elseif($gresit==2){
			$_SESSION["mesaj"]='Datele introduse nu sunt valide';
			header('Location: '.$base_url.'login');
			exit;				
		}
	}
	if(isset($_POST['addintrebare'])){
		$sql="";
		$gresit=0;
		$corect=1;
		if(!(isset($_POST['mail']) && $_POST['mail']!='' && validMail($_POST['mail']))){
			$corect=0;
			$gresit=2;
		}
		if(!(isset($_POST['titlu']) && $_POST['titlu']!='' && isset($_POST['categorie']) && $_POST['categorie']!='' && isset($_POST['taguri']) && $_POST['taguri']!='' && isset($_POST['intrebare']) && $_POST['intrebare']!='')){
				$corect=0;
				$gresit=1;
		}
		if($corect){
			$sql="INSERT INTO `intrebari`(`id_user`, `id_categorie`, `titlu`, `text`, `data`) 
				VALUES ('".$user['id']."', '".$_POST['categorie']."', '".$_POST['titlu']."', '".$_POST['intrebare']."', '".date('Y-m-d H:i:s')."')";
		}
		if($gresit==0){
			$_SESSION["mesaj"]='Intrebare introdusa cu succes';
			$result = mysqli_query($conn, $sql);
			header('Location: '.$base_url); //redirect in intrebare
			exit;			
		}elseif($gresit==1){
			$_SESSION["mesaj"]='Datele introduse nu sunt valide';
			header('Location: '.$base_url.'adaugaintrebare');
			exit;				
		}elseif($gresit==2){
			$_SESSION["mesaj"]='Mailul introdus nu este valid';
			header('Location: '.$base_url.'adaugaintrebare');
			exit;				
		}
	}

	if(isset($_POST['adaugaraspuns'])){
		$sql="";
		$gresit=0;
		$corect=1;
		if(!(isset($_POST['mail']) && $_POST['mail']!='' && validMail($_POST['mail']))){
			$corect=0;
			$gresit=2;
		}
		if(!(isset($_POST['raspuns']) && $_POST['raspuns']!='')){
			$corect=0;
			$gresit=1;
		}
		if($corect){
			$sql="INSERT INTO `raspunsuri`(`id_user`, `id_intrebare`, `data`, `acceptat`, `text`) 
				VALUES ('".$user['id']."', '1', '".date('Y-m-d H:i:s')."', '1', '".$_POST['raspuns']."')";
		}
		if($gresit==0){
			$_SESSION["mesaj"]='Raspus adaugat cu succes';
			$result = mysqli_query($conn, $sql);
			header('Location: '.$base_url); //redirect in intrebare
			exit;			
		}elseif($gresit==1){
			$_SESSION["mesaj"]='Raspunsul introdus nu este valid';
			header('Location: '.$base_url.'intrebare');
			exit;				
		}elseif($gresit==2){
			$_SESSION["mesaj"]='Mailul introdus nu este valid';
			header('Location: '.$base_url.'intrebare');
			exit;				
		}
	}
	if(isset($_POST['signup'])){
		$sql1="";
		$gresit=0;
		$sql="select * from useri where (`mail`='".$_POST['mail']."' or `tel`='".$_POST['telefon']."')";
		$result = mysqli_query($conn, $sql);
 		if(mysqli_num_rows($result) == 0){
			if((isset($_POST['nume']) && $_POST['nume']!='') && (isset($_POST['mail']) && $_POST['mail']!='') && (isset($_POST['telefon']) && $_POST['telefon']!='') && (isset($_POST['parola']) && $_POST['parola']!='') && (isset($_POST['reparola']) && $_POST['reparola']!='')){
				if(validMail($_POST['mail']) && validTel($_POST['telefon']) && validParola($_POST['parola'])==1 && $_POST['parola']==$_POST['reparola']){
					$sql1="INSERT INTO `useri`(`mail`, `parola`, `nume_complet`, `tel`) VALUES ('".$_POST['mail']."','".$_POST['parola']."', '".$_POST['nume']."', '".$_POST['telefon']."')";
				}else{
					$gresit=2;
				}
			}else{
				$gresit=2;
			}
		}else{	
			$gresit=1;		
		}
		if($gresit==0){
			$result=mysqli_query($conn, $sql1);
			$_SESSION["mesaj"]='Cont creat cu succes';
			header('Location: '.$base_url);
			exit;
		}elseif($gresit==1){
			$_SESSION["mesaj"]='Exista deja un cont cu aceste date';
			header('Location: '.$base_url.'contnou');
			exit;	
		}elseif($gresit==2){
			$_SESSION["mesaj"]='Datele introduse nu sunt corecte';
			header('Location: '.$base_url.'contnou');
			exit;				
		}
	}
 ?>