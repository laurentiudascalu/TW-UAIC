<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="boxPrimaPagina">
				<div class="titluPrimaPagina"><i class="fas fa-plus fontRosu"></i>Adauga intrebare</div>
				<div class="box full">
					<div class="formular">
						<form action="p">
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
									<select>
										<option value="Informatica">Informatica</option>
										<option value="Matematica">Matematica</option>
										<option value="Istorie">Istorie</option>
										<option value="Geografie">Geografie</option>
										<option value="Limbi straine">Limbi straine</option>
										<option value="Antreprenoriat">Antreprenoriat</option>
										<option value="Sport">Sport</option>
										<option value="Turism">Turism</option>
										<option value="Muzica">Muzica</option>
										<option value="Literatura">Literatura</option>
									</select>
							 	</div>
							</div>
							<div class="linieForm">
								<div class="label">
									Selecteaza hashtag-uri
								</div>
								<div class="input">
									<select class="height140" multiple>
										<option value="#Design">#Design</option>
										<option value="#Web">#Web</option>
									    <option value="#Integrale">#Integrale</option>
									    <option value="#Windows">#Windows</option>
									    <option value="#Gramatica">#Gramatica</option>
									    <option value="#Maraton">#Maraton</option>
									    <option value="#Engleza">#Engleza</option>
									    <option value="#Germana">#Germana</option>
									    <option value="#Afaceri">#Afaceri</option>
									    <option value="#Fotbal">#Fotbal</option>
									</select>
								</div>
							</div>
							<div class="linieForm">
								<div class="input">
									<textarea class="height170" placeholder="Scrie intrebarea aici.."></textarea> 
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