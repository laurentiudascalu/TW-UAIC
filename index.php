<?php
	require('./declarations.php');

	require('./autentificare.php');
	 
	if(strstr($url,'/delogare') && $user['id']==0){
		$sql="UPDATE login SET `del` = '1' WHERE `cookie` = '".$_COOKIE['login']."'";
		$result = mysqli_query($conn, $sql);
		unset($_COOKIE['login']);
    	setcookie('login', '', time() - 3600);
		header('Location: '.$base_url);
		exit;
	}elseif(strstr($url,'/despre')){
		require('./pages/despre.php');
	}elseif(strstr($url,'/adaugaintrebare')){
		$activ='adaugaintrebare';
		require('./pages/adaugaintrebare.php');
	}elseif(strstr($url,'/contnou') && $user['id']==0){
		require('./pages/contnou.php');
	}elseif(strstr($url,'/contultau') && $user['id']>0){
		$activCont = 'contultau';
		require('./pages/contultau.php');
	}elseif(strstr($url,'/editraspuns')){
		require('./pages/editraspuns.php');
	}elseif(strstr($url,'/edit')){
		require('./pages/edit.php');
	}elseif(strstr($url,'/inceputuri')){
		require('./pages/inceputuri.php');
	}elseif(strstr($url,'/insigneletale') && $user['id']>0){
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
	}elseif(strstr($url,'/intrebariletale')&& $user['id']>0){
		$activCont = 'intrebariletale';
		require('./pages/intrebariletale.php');
	}elseif(strstr($url,'/intrebari')){
		$activ='intrebari';
		require('./pages/intrebari.php');
	}elseif(strstr($url,'/login') && $user['id']==0){
		require('./pages/login.php');
	}elseif(strstr($url,'/planuriviitor')){
		require('./pages/planuriviitor.php');
	}elseif(strstr($url,'/profil') && $user['id']>0){
		$activCont = 'profil';
		require('./pages/profil.php');
	}elseif(strstr($url,'/raspunsuriletale') && $user['id']>0){
		$activCont = 'raspunsuriletale';
		require('./pages/raspunsuriletale.php');
	}elseif(strstr($url,'/reparola') && $user['id']==0){
		require('./pages/reparola.php');
	}elseif(strstr($url,'/statisticiletale') && $user['id']>0){
		$activCont = 'statisticiletale';
		require('./pages/statisticiletale.php');
	}elseif(strstr($url,'/statistici')){
		$activ='statistici';
		require('./pages/statistici.php');
	}elseif(strstr($url,'/stergecont') && $user['id']>0){
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