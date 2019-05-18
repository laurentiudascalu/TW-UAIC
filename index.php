<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$base_url = 'https://';
	} else {
		$base_url = 'http://';
	}
	$base_url .= $_SERVER['HTTP_HOST'].'/adwise/';
	$url       = $_SERVER['REQUEST_URI'];
	$activ     = 'home';
	$activCont = '';


	//ini_set('max_execution_time', 0);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "twuaic";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if(isset($_POST['editeazadate'])){
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
	}
	if(isset($_POST['schimbaparola'])){
		$sql='';
		if(isset($_POST['parolaveche']) && $_POST['parolaveche']!='' && isset($_POST['parolanoua']) && $_POST['parolanoua']!='' && isset($_POST['reparolanoua']) && $_POST['reparolanoua']!='' && $_POST['parolanoua']==$_POST['reparolanoua']){
				$sql = "UPDATE useri SET `parola`='".$_POST['parolanoua']."'";
		}
		/*if ($conn->query($sql) === TRUE) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
		print_r($sql);exit;*/
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
	}


	if(strstr($url,'/despre')){
		require('./pages/despre.php');
	}elseif(strstr($url,'/adaugaintrebare')){
		$activ='adaugaintrebare';
		require('./pages/adaugaintrebare.php');
	}elseif(strstr($url,'/contnou')){
		require('./pages/contnou.php');
	}elseif(strstr($url,'/contultau')){
		$activCont = 'contultau';
		$sql="select * from `useri` where `del` = '0' and `id` = '1'";
		$result = mysqli_query($conn, $sql.'');
		$useri=array();
		while($row = mysqli_fetch_assoc($result)) { 
			$useri['id']=$row['id'];
			$useri['mail']=$row['mail'];
			$useri['parola']=$row['parola'];
			$useri['nume_complet']=$row['nume_complet'];
			$useri['tel']=$row['tel'];
			$useri['admin']=$row['admin'];
			$useri['oras']=$row['oras'];
			$useri['judet']=$row['judet'];
			$useri['adresa']=$row['adresa'];
			$useri['data_nasterii']=$row['data_nasterii'];
			$useri['culoare_preferata']=$row['culoare_preferata'];
			$useri['mancare_preferata']=$row['mancare_preferata'];
			$useri['animal_preferat']=$row['animal_preferat'];
			$useri['descriere']=$row['descriere'];
			$useri['del']=$row['del'];
		}
		require('./pages/contultau.php');
	}elseif(strstr($url,'/editraspuns')){
		require('./pages/editraspuns.php');
	}elseif(strstr($url,'/edit')){
		require('./pages/edit.php');
	}elseif(strstr($url,'/inceputuri')){
		require('./pages/inceputuri.php');
	}elseif(strstr($url,'/insigneletale')){
		$activCont = 'insigneletale';
		require('./pages/insigneletale.php');
	}elseif(strstr($url,'/insigne')){
		$activ='insigne';
		require('./pages/insigne.php');
	}elseif(strstr($url,'/intrebareAdmin')){
		$activ='intrebareAdmin';
		require('./pages/intrebareAdmin.php');
	}elseif(strstr($url,'/intrebare')){
		require('./pages/intrebare.php');
	}elseif(strstr($url,'/intrebariletale')){
		$activCont = 'intrebariletale';
		require('./pages/intrebariletale.php');
	}elseif(strstr($url,'/intrebari')){
		$activ='intrebari';
		require('./pages/intrebari.php');
	}elseif(strstr($url,'/login')){
		require('./pages/login.php');
	}elseif(strstr($url,'/planuriviitor')){
		require('./pages/planuriviitor.php');
	}elseif(strstr($url,'/profil')){
		$activCont = 'profil';
		$sql="select * from `useri` where `del` = '0' and `id` = '1'";
		$result = mysqli_query($conn, $sql.'');
		$useri=array();
		while($row = mysqli_fetch_assoc($result)) { 
			$useri['id']=$row['id'];
			$useri['mail']=$row['mail'];
			$useri['parola']=$row['parola'];
			$useri['nume_complet']=$row['nume_complet'];
			$useri['tel']=$row['tel'];
			$useri['admin']=$row['admin'];
			$useri['oras']=$row['oras'];
			$useri['judet']=$row['judet'];
			$useri['adresa']=$row['adresa'];
			$useri['data_nasterii']=$row['data_nasterii'];
			$useri['culoare_preferata']=$row['culoare_preferata'];
			$useri['mancare_preferata']=$row['mancare_preferata'];
			$useri['animal_preferat']=$row['animal_preferat'];
			$useri['descriere']=$row['descriere'];
			$useri['del']=$row['del'];
		}
		require('./pages/profil.php');
	}elseif(strstr($url,'/raspunsuriletale')){
		$activCont = 'raspunsuriletale';
		require('./pages/raspunsuriletale.php');
	}elseif(strstr($url,'/reparola')){
		require('./pages/reparola.php');
	}elseif(strstr($url,'/statisticiletale')){
		$activCont = 'statisticiletale';
		require('./pages/statisticiletale.php');
	}elseif(strstr($url,'/statistici')){
		$activ='statistici';
		require('./pages/statistici.php');
	}elseif(strstr($url,'/stergecont')){
		$activCont = 'stergecont';
		$sql="select * from `useri` where `del` = '0' and `id` = '1'";
		$result = mysqli_query($conn, $sql.'');
		$useri=array();
		while($row = mysqli_fetch_assoc($result)) { 
			$useri['id']=$row['id'];
			$useri['mail']=$row['mail'];
			$useri['parola']=$row['parola'];
			$useri['del']=$row['del'];
		}
		require('./pages/stergecont.php');
	}elseif(strstr($url,'/taskindeplinite')){
		require('./pages/taskindeplinite.php');
	}elseif(strstr($url,'/top')){
		$activ='top';
		require('./pages/top.php');
	}else{
		require('./pages/home.php');
		exit;
	}
	exit;
?>