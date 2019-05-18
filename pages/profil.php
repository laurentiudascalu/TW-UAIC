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
						<form action="./p" method="post">
							<div class="linieForm">
								<div class="label">
									Oras
								</div>
								<div class="input">
									<input type="text" name="oras" value="<?php echo @$useri['oras']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Judet
								</div>
								<div class="input">
									<select>
										<option value="Alba">Alba</option>
										<option value="Arad">Arad</option>
										<option value="Arges">Bacau</option>
										<option value="Bihor">Bihor</option>
										<option value="Botosani">Botosani</option>
										<option value="Brasov">Brasov</option>
										<option value="Braila">Braila</option>
										<option value="Buzau">Buzau</option>
										<option value="Calarasi">Calarasi</option>
										<option value="Cluj">Cluj</option>
										<option value="Constanta">Constanta</option>
										<option value="Dolj">Dolj</option>
										<option value="Galati">Galati</option>
										<option value="Hunedoara">Hunedoara</option>
										<option value="Iasi" selected="selected">Iasi</option>
										<option value="Mures">Mures</option>
										<option value="Olt">Olt</option>
										<option value="Suceava">Suceava</option>
										<option value="Timis">Timis</option>
									</select>
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Adresa
								</div>
								<div class="input">
									<input type="text" name="adresa" value="<?php echo @$useri['adresa']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Data nasterii
								</div>
								<div class="input">
									<input type="date" name="datanastere" value="<?php echo @$useri['data_nasterii']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Culoare preferata
								</div>
								<div class="input">
									<input type="color" name="culoarepref" value="<?php echo @$useri['culoare_preferata']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Mancare preferata
								</div>
								<div class="input">
									<input type="text" name="mancarepref" value="<?php echo @$useri['mancare_preferata']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Animal Preferat
								</div>
								<div class="input">
									<input type="text" name="animalpref" value="<?php echo @$useri['animal_preferat']; ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Descriere scurta
								</div>
								<div class="input">
									<textarea name="descriere"><?php echo @$useri['descriere']; ?></textarea>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo @$useri['id']; ?>">
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