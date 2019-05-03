<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="meniuCont">
				<a href="./contultau">Contul tau</a>
				<a href="./profil">Profil</a>
				<a href="./intrebariletale">Intrebarile tale</a>
				<a href="./raspunsuriletale">Raspunsurile tale</a>
				<a href="./statisticiletale">Statisticile tale</a>
				<a href="./insigneletale">Insignele tale</a>
				<a href="./stergecont" class="activ">Sterge cont</a>
				<a href="logout">Log-out</a>
			</div>
			<div class="titluContent">
				<span>Sterge cont</span>
			</div>
			<div class="dflex">
				<div class="box">
					<div class="titluBox">
						<i class="fas fa-trash-alt"></i> Formular stergere cont
					</div>
					<div class="formular">
						<form action="p">
							<div class="linieForm">
								<div class="label">
									Parola
								</div>
								<div class="input">
									<input type="text" name="oras">
								</div>
							</div>
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