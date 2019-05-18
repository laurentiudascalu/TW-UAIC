<?php
	require('./declarations.php');

	require('./autentificare.php');
	 
	if(strstr($url,'/delogare')){
		$sql="UPDATE login SET `del` = '1' WHERE `cookie` = '".$_COOKIE['login']."'";
		$result = mysqli_query($conn, $sql);
		unset($_COOKIE['login']);
    	setcookie('login', '', time() - 3600);
	}elseif(strstr($url,'/autentificare')){
		require('./autentificare.php');
	}elseif(strstr($url,'/despre')){
		require('./pages/despre.php');
	}elseif(strstr($url,'/adaugaintrebare')){
		$activ='adaugaintrebare';
		require('./pages/adaugaintrebare.php');
	}elseif(strstr($url,'/contnou')){
		require('./pages/contnou.php');
	}elseif(strstr($url,'/contultau')){
		$activCont = 'contultau';
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
		require('./pages/stergecont.php');
	}elseif(strstr($url,'/taskindeplinite')){
		require('./pages/taskindeplinite.php');
	}elseif(strstr($url,'/top')){
		$activ='top';
		require('./pages/top.php');
	}elseif(strstr($url,'/p')){
		require('./p.php');
	}else{
		require('./pages/home.php');
		exit;
	}
	exit;
?>