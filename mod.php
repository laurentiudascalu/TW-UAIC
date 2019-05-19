<?php
	function getCategorii($id = -1, $nume = ''){
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
			}
		}
		$sql.=" order by `ordine` ASC";
		return mysqli_query($conn,$sql);
	}

	function getTaguri($id = -1, $nume = ''){
		$sql='select * from `taguri` ';
		$ok=0;
		if($id!=-1){
			$sql.="where `id`='".$id."'";
			$ok=1;
		}
		if ($nume!=''){
			if($ok==1){
				$sql.=" and `tag`='".$nume."'";
			}else{
				$sql.="where `tag`='".$nume."'";
			}
		}
		$sql.=" order by `ordine` ASC";
		return mysqli_query($conn,$sql);
	}
?>