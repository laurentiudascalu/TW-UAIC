<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="box">
				<div class="titluBox">
					<i class="fas fa-user"></i> Creeaza-ti cont nou
				</div>
				<div class="formular">
					<form action="p">
						<div class="linieForm">
							<div class="label">
								Nume complet
							</div>
							<div class="input">
								<input type="text" name="nume">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
								Mail
							</div>
							<div class="input">
								<input type="email" name="mail">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
								Telefon
							</div>
							<div class="input">
								<input type="tel" name="telefon">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
								Parola
							</div>
							<div class="input">
								<input type="password" name="parola">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
								Repeta Parola
							</div>
							<div class="input">
								<input type="password" name="reparola">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
							</div>
							<div class="submit">
						 		<input type="submit" value="Creeaza cont" name="login">
						 	</div>
						</div>
						<div class="linieForm">
							<a href="./reparola">Recuperare Parola</a>
							<a href="./login">Log-in</a>
						</div>
					</form>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>