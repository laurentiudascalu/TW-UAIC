<?php
	$user=array();
	$user['id']=0;
	$user['admin']=0;
	$user['del']=0;
	$user['mail']='';
	$user['parola']='';
	$user['tel']='';
	$user['nume_complet']='';
	$user['oras']='';
	$user['judet']='';
	$user['adresa']='';
	$user['data_nasterii']='';
	$user['culoare_preferata']='';
	$user['mancare_preferata']='';
	$user['animal_preferat']='';
	$user['descriere']='';
	if(isset($_COOKIE['login'])){
		$sql="SELECT * FROM `login` WHERE `cookie` = '".$_COOKIE['login']."' AND expire > '".date('Y-m-d H:i:s')."' AND del = 0";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
	      	while($row = mysqli_fetch_assoc($result)) { 
	        	$sql="SELECT * FROM `useri` WHERE `id` = '".$row['id_user']."'";
	        	$result1 = mysqli_query($conn, $sql);
	        	if(mysqli_num_rows($result1) > 0){
		        	while($row1 = mysqli_fetch_assoc($result1)) {
		        		$user=$row1;
		        	}
		        }
	      	}
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
}

?>