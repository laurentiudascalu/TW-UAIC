<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<?php include('./pages/meniuCont.php'); ?>
			<div class="titluContent">
				<span>Sterge cont</span>
			</div>
			<div class="dflex">
				<div class="box">
					<div class="titluBox">
						<i class="fas fa-trash-alt"></i> Formular stergere cont
					</div>
					<div class="formular">
						<form action="<?php echo $base_url; ?>p" method="post">
							<div class="linieForm">
								<div class="label">
									Parola
								</div>
								<div class="input">
									<input type="password" name="parola">
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo @$user['id']; ?>">
							<div class="linieForm">
								<div class="label">
								</div>
								<div class="submit">
							 		<input type="submit" value="Sterge cont" name="stergecont">
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