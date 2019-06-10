<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="titluPrimaPagina">
				<span><i class="fas fa-pencil-alt fontRosu"></i>Editeaza raspuns</span>
			</div>
			<div class="box full">
				<div class="formular">
					<form action="<?php echo $base_url; ?>p" method="post">
						<div class="textSus">
							<span>Data: <b><?php echo $raspuns['data']; ?></b></span>
							<span>Postat de: <b><?php echo $raspuns['nume_complet'];?></b></span>
							<span>Intrebare:  <a href="<?php echo $base_url.'intrebare/'.$raspuns['id_intrebare']; ?>"><b>Link</b></a></span>
						</div>							
						<div class="linieForm">
							<div class="input">
								<textarea name="raspuns" class="height170" placeholder="Raspuns"><?php echo $raspuns['text']; ?></textarea> 
							</div>
						</div>
						<div class="linieForm">
							<div class="submit">
								<input type="hidden" name="id_raspuns" value="<?php echo $raspuns['id'] ?>">
								<input type="hidden" name="id_intrebare" value="<?php echo $raspuns['id_intrebare'] ?>">
						 		<input type="submit" value="Editeaza raspuns" name="editraspuns">
						 	</div>
						</div>
					</form>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>