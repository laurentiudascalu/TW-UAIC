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
						<form action="p" id="profilForm">
							<div class="linieForm">
								<div class="label">
									Oras
								</div>
								<div class="input">
									<input type="text" name="oras" value="Iasi">
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
									<input type="text" name="adresa" value="str. Voievozilor nr.44">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Data nasterii
								</div>
								<div class="input">
									<input type="date" name="datanastere" value="1995-02-14">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Culoare preferata
								</div>
								<div class="input">
									<input type="color" name="culoarepref" value="#e91e63">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Mancare preferata
								</div>
								<div class="input">
									<input type="text" name="mancarepref" value="Burger">
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Animal Preferat
								</div>
								<div class="input">
									<select class="height140" multiple form="profilForm">
										<option value="Cainele" selected="selected">Cainele</option>
										<option value="Pisica">Pisica</option>
									    <option value="Sarpele">Sarpele</option>
									    <option value="Hamsterul" selected="selected">Hamsterul</option>
									    <option value="Leul">Leul</option>
									    <option value="Tigrul">Tigrul</option>
									    <option value="Vaca">Vaca</option>
									    <option value="Porcul">Porcul</option>
									    <option value="Gaina">Gaina</option>
									    <option value="Rata">Rata</option>
									</select>
								</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Descriere scurta
								</div>
								<div class="input">
									<textarea>Sunt o persoana sociabila, imi place sa imi fac prieteni. Am participat in organizatii de voluntariat si sunt pasionata de informatica.</textarea>
								</div>
							</div>
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