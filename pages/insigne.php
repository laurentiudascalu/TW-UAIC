<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			
			<?php if($insigne!=FALSE && mysqli_num_rows($insigne) > 0){
		     while($row = mysqli_fetch_assoc($insigne)) { ?>
				<div class="insignaExplicit">
					<div class="titluPrimaPagina">
						<i class="fas <?php echo $row['icon']?>"></i>
						<span><?php echo $row['titlu']?></span>
					</div>
					<div class="explicatieInsigna">
						<b><?php echo $row['text']; ?></b><br/><br/>
						<span>Numar intrebari: <?php echo $row['nr_intrebari']?></span><br/>
						<span>Numar raspnsuri: <?php echo $row['nr_raspunsuri']?></span><br/>
						<span>Numar raspnsuri corecte: <?php echo $row['nr_rasp_corecte']?></span><br/>
						<span>Numar puncte: <?php echo $row['nr_puncte']?></span><br/>
					</div>
					<div class="insigna">
						<div class="imagineInsigna"><i class="fas <?php echo $row['icon']?>"></i></div>
						<div class="textInsigna"><?php echo $row['titlu']?></div>
					</div>
				</div>
		<?php } } ?>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>