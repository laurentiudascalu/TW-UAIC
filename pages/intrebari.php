<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="titluPrimaPagina">
				<span>Intrebari</span>
			</div>
			<form action="<?php echo $base_url; ?>intrebari" class="filtre" method="post">
				<div class="filtru">
					<select name="categorie" class="inputSelect">
						<option value="-1">Alege categorie...</option>
						<?php if(mysqli_num_rows($categorii) > 0){
		     			while($row = mysqli_fetch_assoc($categorii)) { ?>
							<option value="<?php echo $row['id']; ?>" <?php if(isset($_POST['categorie']) && $_POST['categorie']==$row['id']){ echo 'selected'; } ?>><?php echo str_replace('_',' ',ucfirst($row['categorie'])); ?></option>
						<?php } } ?>
					</select>
				</div>
				<div class="filtru">
					<select name="tag" class="inputSelect">
						<option value="-1">Alege tag-uri...</option>
						<?php if(mysqli_num_rows($taguri) > 0){
		     			while($row = mysqli_fetch_assoc($taguri)) { ?>
							<option value="<?php echo $row['id']; ?>" <?php if(isset($_POST['tag']) && $_POST['tag']==$row['id']){ echo 'selected'; } ?>><?php echo str_replace('_',' ',ucfirst($row['tag'])); ?></option>
						<?php } } ?>
					</select>
				</div>
				<div class="filtru">
					<select name="status" class="inputSelect">
						<option value="-1">Alege status intrebare...</option>
						<option value="1" <?php if(isset($_POST['status']) && $_POST['status']=='1'){ echo 'selected'; } ?>>Rezolvata</option>
						<option value="0" <?php if(isset($_POST['status']) && $_POST['status']=='0'){ echo 'selected'; } ?>>Nerezolvata</option>
					</select>
				</div>
				<div class="filtru">
					<select name="ordonare" class="inputSelect">
						<option value="0">Descrescator dupa data</option>
						<option value="1" <?php if(isset($_POST['ordonare']) && $_POST['ordonare']=='1'){ echo 'selected'; } ?>>Crescator dupa data</option>
						<option value="2" <?php if(isset($_POST['ordonare']) && $_POST['ordonare']=='2'){ echo 'selected'; } ?>>Crescator dupa nr raspunsuri</option>
						<option value="3" <?php if(isset($_POST['ordonare']) && $_POST['ordonare']=='3'){ echo 'selected'; } ?>>Descrescator dupa nr raspunsuri</option>
					</select>
				</div>
				<div class="filtru">
					<input name="cuvant" type="text" class="inputSelect" value="<?php if(isset($_POST['cuvant'])){ echo $_POST['cuvant']; } ?>" placeholder="Cauta dupa cuvant cheie...">
				</div>
				<div class="filtru">
					<input name="dela" type="date" value="<?php if(isset($_POST['dela'])){ echo $_POST['dela']; } ?>" class="inputSelect">
				</div>
				<div class="filtru">
					<input name="la" type="date" value="<?php if(isset($_POST['la'])){ echo $_POST['la']; } ?>" class="inputSelect">
				</div>
				<div class="filtru tc">
					<input type="submit" class="inputSubmit" name="submitFiltrare" value="Cauta intrebare">
				</div>
			</form>
			<?php if($intrebari!=FALSE && mysqli_num_rows($intrebari) > 0){
		     while($row = mysqli_fetch_assoc($intrebari)) {
		     	$taguri = getTaguri(-1,'',$row['id']); ?>
				<a href="<?php echo $base_url; ?>intrebare/<?php echo $row['id']; ?>" class="intrebare">
					<div class="intrebareTitlu"><?php echo $row['titlu']; ?><span class="blackC"> - postata de: </span> <?php echo $row['nume_complet']; ?></div>
					<div class="intrebareContent">
						<?php echo $row['text']; ?>
					</div>
					<div class="intrebareHashtaguri">
						<?php if(mysqli_num_rows($taguri) > 0){
		     			while($row2 = mysqli_fetch_assoc($taguri)) { ?>
		     				<div class="hashtag">#<?php echo $row2['tag']; ?></div>
		     			<?php } } ?>
					</div>
					<div class="likeDislike">
						<div onclick="window.location.replace('<?php echo $base_url; ?>like/intrebare/<?php echo $row['id']; ?>'); return false;" class="like"><i class="fas fa-thumbs-up"></i> <?php echo $row['nrLike']; ?></div>
						<div onclick="window.location.replace('<?php echo $base_url; ?>like/intrebare/<?php echo $row['id']; ?>/1'); return false;" class="dislike"><i class="fas fa-thumbs-down"></i> <?php echo $row['nrDisLike']; ?></div>
					</div>
				</a>
		<?php } ?>
			<div class="butoanePaginare">
				<a href="" title="Prima Pagina"><i class="fas fa-angle-double-left"></i><i class="fas fa-angle-double-left"></i></a>
				<a href="" title="Pagina Anterioara"><i class="fas fa-angle-double-left"></i></a>
				<select class="inputSelect w40 mr5">
					<option value="1" selected="selected">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
				<a href="" title="Pagina Urmatoare"><i class="fas fa-angle-double-right"></i></a>
				<a href="" title="Ultima Pagina"><i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i></a>
			</div>
		<?php }else{ ?>
			<span class="intrebare">
				<div class="intrebareContent">Nu s-au gasit rezultate pentru filtrarea aplicata.</div>
			</span>
		<?php } ?>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>