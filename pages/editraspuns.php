<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="titluPrimaPagina">
				<span><i class="fas fa-pencil-alt fontRosu"></i>Editeaza raspuns</span>
			</div>
			<div class="box full">
				<div class="formular">
					<form action="p">
						<div class="textSus">
							Data : 19-03-2019 22:30 <br/>
							Utilizator : Dulceanu Marina <br/>
							Intrebare : <a href="<?php echo $base_url; ?>intrebareAdmin">Un site pentru paleta de culori?</a><br/>
						</div>
						<div class="linieForm">
							<div class="input">
								<textarea class="height170">Salut!
Sunt o multime de site-uri bune care te pot ajuta.
Unul pe care il folosesc eu, si il recomand este coolors.co</textarea> 
							</div>
						</div>
						<div class="linieForm">
							<div class="submit">
						 		<input type="submit" value="Modifica raspuns" name="modificaraspuns">
						 	</div>
						</div>
					</form>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>