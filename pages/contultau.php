<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<?php include('./pages/meniuCont.php'); ?>
			<div class="titluContent">
				<span>Contul tau</span>
			</div>
			<div class="dflex">
				<div class="box mr30">
					<div class="titluBox">
						<i class="fas fa-user-edit"></i> Editeaza datele
					</div>
					<div class="formular">
						<form action="<?php echo $base_url; ?>p" method="post">
							<div class="linieForm">
								<div class="label">
									Nume complet
								</div>
								<div class="input">
									<input type="text" name="nume" value="<?php echo @$user['nume_complet']; ?>" >
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Mail
								</div>
								<div class="input">
									<input type="email" name="mail" value="<?php echo @$user['mail']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Telefon
								</div>
								<div class="input">
									<input type="tel" name="telefon" value="<?php echo @$user['tel']; ?>">
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo @$user['id']; ?>">
							<div class="linieForm">
								<div class="label">
								</div>
								<div class="submit">
							 		<input type="submit" value="Editeaza datele" name="editeazadate">
							 	</div>
							</div>
							
						</form>
					</div>
				</div>
				<div class="box">
					<div class="titluBox">
						<i class="fas fa-key"></i> Schimba Parola
					</div>
					<div class="formular">
						<form action="<?php echo $base_url; ?>p" method="post">
							<div class="linieForm">
								<div class="label">
									Parola veche
								</div>
								<div class="input">
									<input type="password" name="parolaveche">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Parola noua
								</div>
								<div class="input">
									<input type="password" name="parolanoua">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Repeta parola
								</div>
								<div class="input">
									<input type="password" name="reparolanoua">
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo @$user['id']; ?>">
							<div class="linieForm">
								<div class="label">
								</div>
								<div class="submit">
							 		<input type="submit" value="Schimba parola" name="schimbaparola">
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