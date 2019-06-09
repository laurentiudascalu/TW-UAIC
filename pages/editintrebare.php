<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="boxPrimaPagina">
				<div class="titluPrimaPagina"><i class="fas fa-plus fontRosu"></i>Editeaza intrebare</div>
				<div class="box full">
					<div class="formular">
						<form action="<?php echo $base_url; ?>p" method="post">
							<div class="linieForm">
								<div class="label">
									Postat de: 
								</div>
								<div class="input">
									<?php echo $intrebare['nume_complet'];?>
 								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Data: 
								</div>
								<div class="input">
									<?php echo $intrebare['data']; ?>
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Titlu: 
								</div>
								<div class="input">
									<input type="text" name="titlu" value="<?php echo $intrebare['titlu']; ?>" placeholder="titlu">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Categorie: 
								</div>
								<div class="input">
									<select name="categorie">
										<?php if(mysqli_num_rows($categorii) > 0){
											while($row = mysqli_fetch_assoc($categorii)) { ?>
										<option value="<?php echo $row['id']; ?>" <?php if($intrebare['id_categorie']==$row['id']){
											echo "selected"; } ?> ><?php echo str_replace('_',' ',ucfirst($row['categorie'])); ?> 
										 </option>
										}
									<?php } } ?>
									</select>
							 	</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Tag-uri: 
								</div>
								<div class="input">
									<select name="taguri[]" class="height140" multiple>
										<?php if(mysqli_num_rows($taguri) > 0){
		     								while($row = mysqli_fetch_assoc($taguri)) { ?>
										<option value="<?php echo $row['id']; ?>" <?php if(in_array($row['id'],$taguriSelectate)) echo 'selected';  ?>><?php echo str_replace('_',' ',ucfirst($row['tag'])); ?></option>
										<?php } } ?>
									</select>
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Intrebare: 
								</div>
								<div class="input">
									<textarea name="intrebare" class="height170" placeholder="Intrebare"><?php echo $intrebare['text']; ?></textarea> 
								</div>
							</div>
							<div class="linieForm">
								<div class="submit">
									 <input type="hidden" name="id_intrebare" value="<?php echo $intrebare['id'] ?>">
							 		<input type="submit" value="Editeaza intrebarea" name="editintrebare">
							 	</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>