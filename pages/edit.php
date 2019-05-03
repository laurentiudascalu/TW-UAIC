<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="titluPrimaPagina">
				<span><i class="fas fa-pencil-alt fontRosu"></i>Editeaza pagini statice</span>
			</div>
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
								Link
							</div>
							<div class="input">
								<input type="text" name="link">
							</div>
						</div>
						<div class="linieForm">
							<div class="label">
								Enable
							</div>
							<div class="input">
								<input class="noHoverInput" type="checkbox" name="checkbox" checked>
							</div>
						</div>
						<div class="linieForm">
							<div class="input">
								<textarea class="height400"></textarea> 
							</div>
						</div>
						<div class="linieForm">
							<div class="submit">
						 		<input type="submit" value="Modifica pagina" name="modificapagina">
						 	</div>
						</div>
					</form>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>