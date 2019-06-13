<?php
	function getNrLike($dislike = 0, $id_intrebare=-1, $id_raspuns=-1, $id_user=-1){
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

		$sql="select COUNT(*) as `nr` FROM `likeuri` ";
		$sql.="where `dislike`='".$dislike."' ";
		$sql.="and `del`='0' ";
		if($id_intrebare!=-1){
			$sql.="and `id_intrebare`='".$id_intrebare."' ";
		}
		if($id_raspuns!=-1){
			$sql.="and `id_raspuns`='".$id_raspuns."' ";
		}
		if($id_user!=-1){
			$sql.="and `id_user`='".$id_user."' ";
		}
		return mysqli_query($conn,$sql);
	}

	function getRaspunsuri($id = -1, $mail_user='', $id_intrebare=-1, $acceptat=-1, $acc=1, $id_user= -1){
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

		$sql="select `A`.*, COUNT(`L1`.`id_raspuns`) as `nrLike`, COUNT(`L2`.`id_raspuns`) as `nrDisLike`, IF(`C`.`nume_complet`!='', `C`.`nume_complet`, 'Anonim') as `nume_complet` from `raspunsuri` as A ";
		$sql.=' left join `useri` 	    as `C` on `A`.`id_user` = `C`.`id` AND `C`.`del` = 0 ';
		$sql.=" left join `likeuri` 	as `L1` on `L1`.`id_raspuns` = `A`.`id` AND `L1`.`dislike` = '0' AND `L1`.`del` = 0 ";
		$sql.=" left join `likeuri` 	as `L2` on `L2`.`id_raspuns` = `A`.`id` AND `L2`.`dislike` = '1'  AND `L2`.`del` = 0 ";
		$ok=0;
		if($id!=-1){
			$sql.="where `A`.`id`='".$id."'";
			$ok=1;
		}
		if ($mail_user!=''){
			if($ok==1){
				$sql.=" and `A`.`mail`='".$mail_user."'";
			}else{
				$sql.="where `A`.`mail`='".$mail_user."'";
				$ok=1;
			}
		}
		if ($id_user!=-1){
			if($ok==1){
				$sql.=" and `A`.`id_user`='".$id_user."'";
			}else{
				$sql.="where `A`.`id_user`='".$id_user."'";
				$ok=1;
			}
		}
		if ($id_intrebare!=-1){
			if($ok==1){
				$sql.=" and `A`.`id_intrebare`='".$id_intrebare."'";
			}else{
				$sql.="where `A`.`id_intrebare`='".$id_intrebare."'";
				$ok=1;
			}
		}
		if ($acceptat!=-1){
			if($ok==1){
				$sql.=" and `A`.`acceptat`='".$acceptat."'";
			}else{
				$sql.="where `A`.`acceptat`='".$acceptat."'";
				$ok=1;
			}
		}
		if($ok==1){
			$sql.=" and `A`.`del`='0'";
		}else{
			$sql.="where `A`.`del`='0'";
			$ok=1;
		}
		if($ok==1){
			$sql.=" and `A`.`acc`='".$acc."'";
		}else{
			$sql.="where `A`.`acc`='".$acc."'";
			$ok=1;
		}
		$sql.=" group by `A`.`id` ";
		$sql.=" order by `acceptat` DESC, `data` DESC";
		//echo $sql; exit;
		return mysqli_query($conn,$sql);
	}

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
				$ok=1;
			}
		}
		if($ok==1){
			$sql.=" and `del`='0'";
		}else{
			$sql.="where `del`='0'";
			$ok=1;
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

		$sql='select `A`.* from `taguri` as `A` ';
		$sql.="left join `tag_leg` as `B` on `A`.`id` = `B`.`id_tag` AND `B`.`del` = '0' ";
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
				$ok=1;
			}
		}
		if ($id_intrebare!=-1){
			if($ok==1){
				$sql.=" and `B`.`id_intrebare`='".$id_intrebare."'";
			}else{
				$sql.="where `B`.`id_intrebare`='".$id_intrebare."'";
				$ok=1;
			}
		}

		if($ok==1){
			$sql.=" and `A`.`del`='0'";
		}else{
			$sql.="where `A`.`del`='0'";
			$ok=1;
		}
		$sql.=" group by `A`.`id` ";
		$sql.=" order by `ordine` ASC, `tag` ASC";
		return mysqli_query($conn,$sql);
	}
	function getIntrebariStatistici($id_user=-1){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "twuaic";

		$res=array();
		for ($i=6; $i>=0; $i--) {
		    $res[date('Y-m-d',strtotime ( '-'.$i.' day' , strtotime (date('Y-m-d'))))]=0;
		}

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit;
		}

		$sql="select COUNT(`A`.`id`) as `nr`,DATE_FORMAT(`A`.`data`, '%Y-%m-%d') as `data` from `intrebari` as `A` where `A`.`data` >= '".date('Y-m-d',strtotime ( '-6 day' , strtotime (date('Y-m-d'))))."' and `A`.`acc` = '1' and `A`.`del` = '0'";
		if($id_user!=-1){
			$sql.=" and `A`.`id_user`='".$id_user."'";
		}
		$sql.=" group by DATE_FORMAT(`A`.`data`, '%Y-%m-%d') ";
		$ret = mysqli_query($conn,$sql);
		if(mysqli_num_rows($ret) > 0){
		    while($row = mysqli_fetch_assoc($ret)) {
		    	$res[$row['data']]=$row['nr'];
		    }
		}
		return $res;
	}
	function getRaspunsuriStatistici($id_user=-1){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "twuaic";

		$res=array();
		for ($i=6; $i>=0; $i--) {
		    $res[date('Y-m-d',strtotime ( '-'.$i.' day' , strtotime (date('Y-m-d'))))]=0;
		}

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		    exit;
		}

		$sql="select COUNT(`A`.`id`) as `nr`,DATE_FORMAT(`A`.`data`, '%Y-%m-%d') as `data` from `raspunsuri` as `A` where `A`.`data` >= '".date('Y-m-d',strtotime ( '-6 day' , strtotime (date('Y-m-d'))))."' and `A`.`acc` = '1' and `A`.`del` = '0'";
		if($id_user!=-1){
			$sql.=" and `A`.`id_user`='".$id_user."'";
		}
		$sql.=" group by DATE_FORMAT(`A`.`data`, '%Y-%m-%d') ";
		$ret = mysqli_query($conn,$sql);

		if(mysqli_num_rows($ret) > 0){
		    while($row = mysqli_fetch_assoc($ret)) {
		    	$res[$row['data']]=$row['nr'];
		    }
		}
		return $res;
	}
	function getIntrebari($id = -1, $id_user=-1, $id_cat = -1, $id_tag=-1, $rezolvata=-1, $search='', $de_la='', $pana_la='', $limit=array(), $order=array('data','DESC'), $acc=1){
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

		$sql="select `A`.*, IF(`C`.`nume_complet`!='', `C`.`nume_complet`, 'Anonim') as `nume_complet`, COUNT(`D`.`id`) as 'nr_raspunsuri' from `intrebari` as `A`";
		$sql.=' left join `tag_leg` 	as `B` on `A`.`id` 		= `B`.`id_intrebare` AND `B`.`del` = 0';
		$sql.=' left join `useri` 	    as `C` on `A`.`id_user` = `C`.`id` AND `C`.`del` = 0';
		$sql.=' left join `raspunsuri` 	as `D` on `A`.`id` 		= `D`.`id_intrebare` AND `D`.`acceptat` = 1 AND `D`.`del` = 0 ';
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
				$ok=1;
			}
		}
		if ($id_user!=-1){
			if($ok==1){
				$sql.=" and `A`.`id_user`='".$id_user."'";
			}else{
				$sql.="where `A`.`id_user`='".$id_user."'";
				$ok=1;
			}
		}
		if ($rezolvata!=-1){
			if($ok==1){
				$sql.=" and `A`.`rezolvata`='".$rezolvata."'";
			}else{
				$sql.="where `A`.`rezolvata`='".$rezolvata."'";
				$ok=1;
			}
		}
		if ($de_la!=''){
			if($ok==1){
				$sql.=" and `A`.`data` >= '".$de_la."'";
			}else{
				$sql.="where `A`.`data` >= '".$de_la."'";
				$ok=1;
			}
		}
		if ($pana_la!=''){
			if($ok==1){
				$sql.=" and `A`.`data` <= '".$pana_la."'";
			}else{
				$sql.="where `A`.`data` <= '".$pana_la."'";
				$ok=1;
			}
		}
		if ($search!=''){
			if($ok==1){
				$sql.=" and (`A`.`titlu` LIKE '%".$search."%' OR `A`.`text` LIKE '%".$search."%')";
			}else{
				$sql.="where (`A`.`titlu` LIKE '%".$search."%' OR `A`.`text` LIKE '%".$search."%')";
				$ok=1;
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
				$ok=1;
			}
		}
		if($ok==1){
			$sql.=" and `A`.`del`='0'";
		}else{
			$sql.="where `A`.`del`='0'";
			$ok=1;
		}
		if($ok==1){
			$sql.=" and `A`.`acc`='".$acc."'";
		}else{
			$sql.="where `A`.`acc`='".$acc."'";
			$ok=1;
		}
		$sql.=" group by `A`.`id` ";
		if(!empty($limit)){
			$sql.=" limit ".$limit[0].", ".$limit[1];
		}

		$sqlBig='SELECT `sqlMic`.*, COUNT(`L1`.`id_intrebare`) as `nrLike`, COUNT(`L2`.`id_intrebare`) as `nrDisLike` FROM ( '.$sql.' ) AS `sqlMic` ';
		$sqlBig.=" left join `likeuri` 	as `L1` on `L1`.`id_intrebare` = `sqlMic`.`id` AND `L1`.`dislike` = '0' AND `L1`.`del` = 0 ";
		$sqlBig.=" left join `likeuri` 	as `L2` on `L2`.`id_intrebare` = `sqlMic`.`id` AND `L2`.`dislike` = '1' AND `L2`.`del` = 0 ";
		$sqlBig.=" group by `sqlMic`.`id` ";
		$sqlBig.=" order by `".$order[0]."` ".$order[1];
		//echo $sqlBig; exit;
		return mysqli_query($conn,$sqlBig);
	}
	function getUseri($id = -1, $mail = '', $admin=-1){
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

		$sql='select `A`.* from `useri` as `A` ';
		$ok=0;
		if($id!=-1){
			$sql.="where `A`.`id`='".$id."'";
			$ok=1;
		}
		if ($mail!=''){
			if($ok==1){
				$sql.=" and `A`.`mail`='".$mail."'";
			}else{
				$sql.="where `A`.`mail`='".$mail."'";
				$ok=1;
			}
		}
		if ($admin!=-1){
			if($ok==1){
				$sql.=" and `A`.`admin`='".$admin."'";
			}else{
				$sql.="where `A`.`admin`='".$admin."'";
				$ok=1;
			}
		}

		if($ok==1){
			$sql.=" and `A`.`del`='0'";
		}else{
			$sql.="where `A`.`del`='0'";
			$ok=1;
		}
		$sql.=" group by `A`.`id` ";
		return mysqli_query($conn,$sql);
	}
	function getInsigne($id = -1, $titlu = '', $id_user=-1){
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

		$sql='select `A`.* from `insigne` as `A` ';
		$sql.="left join `insigne_leg` as `B` on `A`.`id` = `B`.`id_insigna` AND `B`.`del` = '0' ";
		$ok=0;
		if($id!=-1){
			$sql.="where `A`.`id`='".$id."'";
			$ok=1;
		}
		if ($titlu!=''){
			if($ok==1){
				$sql.=" and `A`.`titlu`='".$titlu."'";
			}else{
				$sql.="where `A`.`titlu`='".$titlu."'";
				$ok=1;
			}
		}
		if ($id_user!=-1){
			if($ok==1){
				$sql.=" and `B`.`id_user`='".$id_user."'";
			}else{
				$sql.="where `B`.`id_user`='".$id_user."'";
				$ok=1;
			}
		}

		if($ok==1){
			$sql.=" and `A`.`del`='0'";
		}else{
			$sql.="where `A`.`del`='0'";
			$ok=1;
		}
		$sql.=" group by `A`.`id` ";
		return mysqli_query($conn,$sql);
	}

	function cmpTop($a, $b){
	    if ($a['puncte'] == $b['puncte']) {
	        return 0;
	    }
	    return ($a['puncte'] > $b['puncte']) ? -1 : 1;
	}

	function getPuncte($id_user=-1){
		$puncte = 0;

		$intrebari  = getIntrebari(-1, $id_user);
		$intrebari  = mysqli_num_rows($intrebari);

		$raspunsuri = getRaspunsuri(-1, '', -1, -1, 1, $id_user);
		$raspunsuri = mysqli_num_rows($raspunsuri);

		$raspC  	= getRaspunsuri(-1, '', -1, 1, 1, $id_user);
		$raspC		= mysqli_num_rows($raspC);

		$puncte = $intrebari*100 + $raspunsuri*10 + $raspC*50;

		$insigne = getInsigne(-1,'',$id_user);
		if(mysqli_num_rows($insigne) >0){
		    while($row = mysqli_fetch_assoc($insigne)) { 
				$puncte += $row['puncte'];
			}
		}
		return $puncte;
	}
	function verificaInsigne($id_user){
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

		$insigne	= getInsigne();
		$puncte		= getPuncte($id_user);

		$intrebari  = getIntrebari(-1, $id_user);
		$intrebari  = mysqli_num_rows($intrebari);

		$raspunsuri = getRaspunsuri(-1, '', -1, -1, 1, $id_user);
		$raspunsuri = mysqli_num_rows($raspunsuri);

		$raspC  	= getRaspunsuri(-1, '', -1, 1, 1, $id_user);
		$raspC		= mysqli_num_rows($raspC);

		//echo $intrebari.' '.$raspunsuri.' '.$raspC.' '.$puncte; exit();

		$sql = "UPDATE insigne_leg SET `del`='1' where `id_user`='".$id_user."'";
		mysqli_query($conn,$sql);

		if(mysqli_num_rows($insigne) >0){
		    while($row = mysqli_fetch_assoc($insigne)) { 
		    	if($intrebari >= $row['nr_intrebari'] && $raspunsuri >= $row['nr_raspunsuri'] && $raspC >= $row['nr_rasp_corecte'] && $puncte >= $row['nr_puncte']){
		    		$sql = "INSERT INTO insigne_leg (`id_insigna`, `id_user`) VALUES ('".$row['id']."', '".$id_user."')";
					mysqli_query($conn,$sql);
					if($row['titlu']=='Admin'){
						$sql = "UPDATE useri SET `admin` = '1' WHERE `id` = '".$id_user."'";
						mysqli_query($conn,$sql);
					}
		    	}
		    }
		}

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
		if($mesaj!=''){
			$_SESSION["mesaj"]=$mesaj;
		}
		header('Location: '.$base_url);
		exit;
	}	
	function goBack($base_url, $mesaj='Nu aveti acces in aceasta zona.'){
		$link='Location: '.$base_url;
		if(isset($_SERVER['HTTP_REFERER'])){
			$link='Location: '.$_SERVER['HTTP_REFERER'];
		}
		if($mesaj!=''){
			$_SESSION["mesaj"]=$mesaj;
		}
		header($link);
		exit;
	}	
?>