<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="box">
				<div class="titluBox">
					<i class="fas fa-user"></i> Intra in cont 
				</div>
				<div class="formular">
					<form action="<?php echo $base_url; ?>p" method="post">
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
								Parola
							</div>
							<div class="input">
								<input type="password" name="parola">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
							</div>
							<div class="submit">
						 		<input type="submit" value="Log-in" name="login">
						 	</div>
						</div>
						<div class="linieForm">
							<a href="<?php echo $base_url; ?>reparola">Recuperare Parola</a>
							<a href="<?php echo $base_url; ?>contnou">Cont nou</a>
						</div>
					</form>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>