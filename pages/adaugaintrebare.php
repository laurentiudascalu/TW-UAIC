<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="boxPrimaPagina">
				<div class="titluPrimaPagina"><i class="fas fa-plus fontRosu"></i>Adauga intrebare</div>
				<div class="box full">
					<div class="formular">
						<form action="./p" method="post">
							<div class="linieForm">
								<div class="label">
									Titlu
								</div>
								<div class="input">
									<input type="text" name="titlu">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Alege o categorie
								</div>
								<div class="input">
									<select name="categorie">
										<?php if(mysqli_num_rows($categorii) > 0){
											while($row = mysqli_fetch_assoc($categorii)) { ?>
										<option value="<?php echo $row['id']; ?>"><?php echo ucfirst($row['categorie']); ?></option>
									<?php } } ?>
									</select>
							 	</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Selecteaza hashtag-uri
								</div>
								<div class="input">
									<select name="taguri" class="height140" multiple>
										<?php if(mysqli_num_rows($taguri) > 0){
											while($row = mysqli_fetch_assoc($taguri)) { ?>
												<option value="<?php echo $row['id']; ?>"><?php echo '#'.$row['tag']; ?></option>
										<?php } } ?>
									</select>
								</div>
							</div>
							<div class="linieForm">
								<div class="input">
									<textarea name="intrebare" class="height170" placeholder="Scrie intrebarea aici.."></textarea> 
								</div>
							</div>
							<div class="linieForm">
								<div class="submit">
							 		<input type="submit" value="Posteaza intrebarea" name="addintrebare">
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