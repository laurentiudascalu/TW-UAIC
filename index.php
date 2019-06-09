<?php
	require('./declarations.php');

	require('./mod.php');

	require('./autentificare.php');

	if($urlSeg[2]=='delogare'){
		$sql="UPDATE login SET `del` = '1' WHERE `cookie` = '".$_COOKIE['login']."'";
		$result = mysqli_query($conn, $sql);
		unset($_COOKIE['login']);
    	setcookie('login', '', time() - 3600);
		header('Location: '.$base_url);
		exit;
	}elseif($urlSeg[2]=='despre'){
		require('./pages/despre.php');
	}elseif($urlSeg[2]=='adaugaintrebare'){
		$categorii=getCategorii();
		$taguri=getTaguri();
		$activ='adaugaintrebare';
		require('./pages/adaugaintrebare.php');
	}elseif($urlSeg[2]=='contnou'){
		require('./pages/contnou.php');
	}elseif($urlSeg[2]=='contultau'){
		$activCont = 'contultau';
		require('./pages/contultau.php');
	}elseif($urlSeg[2]=='editraspuns' && $urlSeg[3]!=''){
		$rasp=getRaspunsuri($urlSeg[3]);
		if(mysqli_num_rows($rasp) > 0){
			$raspuns = mysqli_fetch_assoc($rasp);
		}
		require('./pages/editraspuns.php');
	}elseif($urlSeg[2]=='edit'){
		require('./pages/edit.php');
	}elseif($urlSeg[2]=='intrebariacc'){
		$intrebari=getIntrebari(-1, -1, -1, -1, -1, '', '', '', array(), array('data','DESC'), 0);
		require('./pages/intrebariacc.php');
	}elseif($urlSeg[2]=='raspunsuriacc'){
		$intrebari=getRaspunsuri(-1, '', -1, -1,  0);
		require('./pages/raspunsuriacc.php');
	}elseif($urlSeg[2]=='inceputuri'){
		require('./pages/inceputuri.php');
	}elseif($urlSeg[2]=='insigneletale'){
		$activCont = 'insigneletale';
		require('./pages/insigneletale.php');
	}elseif($urlSeg[2]=='editintrebare' && $urlSeg[3]!=''){
		$categorii=getCategorii();
		$taguriIntrebare=getTaguri(-1,'',$urlSeg[3]);
		$taguri=getTaguri();
		if(mysqli_num_rows($taguriIntrebare) > 0){
		    while($row = mysqli_fetch_assoc($taguriIntrebare)) {
		    	$taguriSelectate[]=$row['id'];
		    }
		}
		$intr=getIntrebari($urlSeg[3]);
		if(mysqli_num_rows($intr) > 0){
			$intrebare = mysqli_fetch_assoc($intr);
		}
		require('./pages/editintrebare.php');
	}elseif($urlSeg[2]=='insigne'){
		$activ='insigne';
		require('./pages/insigne.php');
	}elseif($urlSeg[2]=='intrebareAdmin'){
		$activ='intrebareAdmin';
		require('./pages/intrebareAdmin.php');
	}elseif($urlSeg[2]=='accIntrebare' && $urlSeg[3]!=''){
		$sql="UPDATE `intrebari` set `acc`= '1' where `id`='".$urlSeg[3]."'";
		$result = mysqli_query($conn, $sql);
		goBack($base_url,'Ai acceptat cu succes');
	}elseif($urlSeg[2]=='accRaspuns' && $urlSeg[3]!=''){
		$sql="UPDATE `raspunsuri` set `acc`= '1' where `id`='".$urlSeg[3]."'";
		$result = mysqli_query($conn, $sql);
		goBack($base_url,'Ai acceptat cu succes');
	}elseif($urlSeg[2]=='intrebare' && $urlSeg[3]!=''){
		$intr=getIntrebari($urlSeg[3]);
		if(mysqli_num_rows($intr) > 0){
			$intrebare = mysqli_fetch_assoc($intr);
			$raspunsuri = getRaspunsuri(-1,'',$intrebare['id']);
			$taguri = getTaguri(-1,'',$intrebare['id']);
			require('./pages/intrebare.php');
		}else{
			goHome($base_url);
		}				
	}elseif($urlSeg[2]=='like'){
		$intrebare=0;
		$raspuns=0;
		$dislike=0;
		if($urlSeg[3]=='intrebare'){
			$intrebare=$urlSeg[4];
		}elseif($urlSeg[3]=='raspuns'){
			$raspuns=$urlSeg[4];
		}
		if(@$urlSeg[5]==1){
			$dislike=1;
		}
		$sql1="select * from `likeuri` where `id_intrebare`='".$intrebare."' and `id_raspuns`='".$raspuns."' and `id_user`='".$user['id']."'";
		$result = mysqli_query($conn, $sql1);
		if(mysqli_num_rows($result) == 0){
			$sql= "INSERT INTO `likeuri` (`id_user`, `id_intrebare`, `id_raspuns`, `dislike`) VALUES ('".$user['id']."','"
				.$intrebare."', '".$raspuns."','".$dislike."')";
			$result1 = mysqli_query($conn, $sql);}
		header('Location: '.$_SERVER['HTTP_REFERER']);
		exit;		
	}elseif($urlSeg[2]=='intrebariletale'){
		$intrebari=getIntrebari(-1,$user['id']);
		$activCont = 'intrebariletale';
		require('./pages/intrebariletale.php');
	}elseif($urlSeg[2]=='stergeintrebare'){
		$sql="UPDATE `intrebari` set `del` = `1` where `id` = '".$urlSeg[3]."'";
		$sql1="UPDATE `raspunsuri` set `del` = `1` where `id_intrebare` = '".$urlSeg[3]."'";
		$sql2="UPDATE `likeuri` set `del` = `1` where `id_intrebare` ='".$urlSeg[3]."'";
		$sql2="UPDATE `tag_leg` set `del` = `1` where `id_intrebare` ='".$urlSeg[3]."'";
		print_r($sql);print_r($sql1);print_r($sql2);exit;
	}elseif($urlSeg[2]=='stergeraspuns'){
		$sql="UPDATE `raspunsuri` set `del` = `1` where `id` = '".$urlSeg[3]."'";
		$sql1="UPDATE `likeuri` set `del` = `1` where `id_raspuns` ='".$urlSeg[3]."'";
		print_r($sql);print_r($sql1);exit;
	}elseif($urlSeg[2]=='intrebari'){
		$categorii=getCategorii();
		$taguri=getTaguri();
		$categorii=getCategorii();
		$activ='intrebari';
		if(isset($_POST['ordonare'])){
			$order=array('data','DESC');
			if($_POST['ordonare']==1){
				$order=array('data','ASC');
			}elseif($_POST['ordonare']==2){
				$order=array('nr_raspunsuri','ASC');
			}elseif($_POST['ordonare']==3){
				$order=array('nr_raspunsuri','DESC');
			}
			$intrebari=getIntrebari(-1,-1,$_POST['categorie'],$_POST['tag'],$_POST['status'],$_POST['cuvant'],$_POST['dela'],$_POST['la'],array(),$order);
		}else{
			$intrebari=getIntrebari();
		}
		
		require('./pages/intrebari.php');
	}elseif($urlSeg[2]=='login'){
		require('./pages/login.php');
	}elseif($urlSeg[2]=='planuriviitor'){
		require('./pages/planuriviitor.php');
	}elseif($urlSeg[2]=='profil'){
		$activCont = 'profil';
		require('./pages/profil.php');
	}elseif($urlSeg[2]=='raspunsuriletale'){
		$raspunsuri = getRaspunsuri(-1,$user['mail']);
		$activCont = 'raspunsuriletale';
		require('./pages/raspunsuriletale.php');
	}elseif($urlSeg[2]=='reparola'){
		require('./pages/reparola.php');
	}elseif($urlSeg[2]=='statisticiletale'){
		$activCont = 'statisticiletale';
		require('./pages/statisticiletale.php');
	}elseif($urlSeg[2]=='statistici'){
		$activ='statistici';
		require('./pages/statistici.php');
	}elseif($urlSeg[2]=='stergecont'){
		$activCont = 'stergecont';
		require('./pages/stergecont.php');
	}elseif($urlSeg[2]=='taskindeplinite'){
		require('./pages/taskindeplinite.php');
	}elseif($urlSeg[2]=='top'){
		$activ='top';
		require('./pages/top.php');
	}elseif($urlSeg[2]=='p'){
		require('./p.php');
	}elseif($urlSeg[2]==''){
		require('./pages/home.php');
		exit;
	}else{
		goHome($base_url);
	}
	exit;
?>