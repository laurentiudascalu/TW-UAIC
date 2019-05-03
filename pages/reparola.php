<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="box">
				<div class="titluBox">
					<i class="fas fa-user"></i> Recupereaza Parola
				</div>
				<div class="formular">
					<form action="p">
						<div class="linieForm">
							<div class="label">
								Mail/Telefon
							</div>
							<div class="input">
								<input type="email" name="mail">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
							</div>
							<div class="submit">
						 		<input type="submit" value="Recupereaza parola" name="reparola">
						 	</div>
						</div>
						<div class="linieForm">
							<a href="./login">Log-in</a>
							<a href="./contnou">Cont nou</a>
						</div>
					</form>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>