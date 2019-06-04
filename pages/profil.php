<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<?php include('./pages/meniuCont.php'); ?>
			<div class="titluContent">
				<span>Profil</span>
			</div>
			<div class="dflex">
				<div class="box width100">
					<div class="titluBox">
						<i class="fas fa-user-circle"></i> Completeaza-ti profilul
					</div>
					<div class="formular">
						<form action="<?php echo $base_url; ?>p" method="post">
							<div class="linieForm">
								<div class="label">
									Oras
								</div>
								<div class="input">
									<input type="text" name="oras" value="<?php echo ucfirst(@$user['oras']); ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Judet
								</div>
								<div class="input">
									<input type="text" name="judet" value="<?php echo ucfirst(@$user['judet']); ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Adresa
								</div>
								<div class="input">
									<input type="text" name="adresa" value="<?php echo ucfirst(@$user['adresa']); ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Data nasterii
								</div>
								<div class="input">
									<input type="date" name="datanastere" value="<?php echo @$user['data_nasterii']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Culoare preferata
								</div>
								<div class="input">
									<input type="color" name="culoarepref" value="<?php echo @$user['culoare_preferata']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Mancare preferata
								</div>
								<div class="input">
									<input type="text" name="mancarepref" value="<?php echo @$user['mancare_preferata']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Animal Preferat
								</div>
								<div class="input">
									<input type="text" name="animalpref" value="<?php echo @$user['animal_preferat']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Descriere scurta
								</div>
								<div class="input">
									<textarea name="descriere"><?php echo @$user['descriere']; ?></textarea>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo @$user['id']; ?>">
							<div class="linieForm">
								<div class="label">
								</div>
								<div class="submit">
							 		<input type="submit" value="Completeaza profil" name="complprofil">
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