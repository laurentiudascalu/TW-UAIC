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
	}elseif($urlSeg[2]=='editraspuns'){
		require('./pages/editraspuns.php');
	}elseif($urlSeg[2]=='edit'){
		require('./pages/edit.php');
	}elseif($urlSeg[2]=='inceputuri'){
		require('./pages/inceputuri.php');
	}elseif($urlSeg[2]=='insigneletale'){
		$activCont = 'insigneletale';
		require('./pages/insigneletale.php');
	}elseif($urlSeg[2]=='insigne'){
		$activ='insigne';
		require('./pages/insigne.php');
	}elseif($urlSeg[2]=='intrebareAdmin'){
		$activ='intrebareAdmin';
		require('./pages/intrebareAdmin.php');
	}elseif($urlSeg[2]=='intrebare' && $urlSeg[3]!=''){
		$intr=getIntrebari($urlSeg[3]);
		if(mysqli_num_rows($intr) > 0){
			$intrebare = mysqli_fetch_assoc($intr);
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
		$activ='intrebari';
		$intrebari=getIntrebari();
		require('./pages/intrebari.php');
	}elseif($urlSeg[2]=='login'){
		require('./pages/login.php');
	}elseif($urlSeg[2]=='planuriviitor'){
		require('./pages/planuriviitor.php');
	}elseif($urlSeg[2]=='profil'){
		$activCont = 'profil';
		require('./pages/profil.php');
	}elseif($urlSeg[2]=='raspunsuriletale'){
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