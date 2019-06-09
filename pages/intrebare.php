<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="boxPrimaPagina">
				<div class="likeDislike">
					<a href="<?php echo $base_url; ?>like/intrebare/<?php echo $intrebare['id']; ?>"><div class="like"><i class="fas fa-thumbs-up"></i> <?php echo $intrebare['nrLike']; ?></div></a>
					<a href="<?php echo $base_url; ?>like/intrebare/<?php echo $intrebare['id']; ?>/1"><div class="dislike"><i class="fas fa-thumbs-down"></i> <?php echo $intrebare['nrDisLike']; ?></div></a>
				</div>
				<div class="titluPrimaPagina intrebareTitluPagina areLike"><?php echo $intrebare['titlu']; ?><span class="blackC"> - postata de: </span> <?php echo $intrebare['nume_complet']; ?></div>
				<div class="intrebarePaginaContent mb20">
					<?php echo $intrebare['text']; ?>
				</div>
				<div class="intrebareHashtaguri mb20">
					<?php if(mysqli_num_rows($taguri) > 0){
		     		while($row = mysqli_fetch_assoc($taguri)) { ?>
		     			<div class="hashtag">#<?php echo $row['tag']; ?></div>
		     		<?php } } ?>
				</div>
				<div class="box full">
					<div class="titluBox pl40">
						<i class="fas fa-plus"></i>Adauga un raspuns
					</div>
					<div class="formular">
						<form action="<?php echo $base_url; ?>p" method="post">
							<input type="hidden" name="id_intrebare" value="<?php echo $intrebare['id']; ?>">
							<div class="linieForm <?php echo (($user['id']==0)?'':'pt0'); ?>">
								<div class="label">
									<?php if($user['id']==0){ echo 'Mail'; }?>
								</div>
								<div class="input">
									<input type="<?php echo (($user['id']==0)?'mail':'hidden'); ?>" name="mail" value="<?php echo (($user['id']==0)?'':$user['mail']); ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="input">
									<textarea name="raspuns" class="height170" placeholder="Adauga un raspuns.."></textarea> 
								</div>
							</div>
							<div class="linieForm">
								<div class="submit">
							 		<input type="submit" value="Adauga raspuns" name="adaugaraspuns">
							 	</div>
							</div>
						</form>
					</div>
				</div>
				<div class="contentPrimaPagina pt30">
					<?php if(mysqli_num_rows($raspunsuri) > 0){
		     		while($row = mysqli_fetch_assoc($raspunsuri)) { ?>
		     			<div class="intrebare nohover <?php echo (($row['acceptat']==1)?'raspunsCorect':''); ?>">
							<div class="titluRaspuns areLike"><?php echo $row['data']; ?> - <span class="redC"><?php echo $row['nume_complet']; ?> </span> a scris:</div>
							<br/>
							<div class="intrebareContent">
								<?php echo $row['text']; ?>
							</div>
							<div class="likeDislike">
								<a href="<?php echo $base_url.'like/raspuns/'.$row['id']; ?>" class="like"><i class="fas fa-thumbs-up"></i> <?php echo $row['nrLike']; ?></a>
								<a href="<?php echo $base_url.'like/raspuns/'.$row['id'].'/1'; ?>" class="dislike"><i class="fas fa-thumbs-down"></i> <?php echo $row['nrDisLike']; ?></a>
							</div>
						</div>
		     		<?php } } ?>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>