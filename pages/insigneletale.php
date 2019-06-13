<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<?php include('./pages/meniuCont.php'); ?>
			<div class="titluContent">
				<span>Insignele tale</span>
			</div>
			<div class="insigne">
				<?php if($insigne!=FALSE && mysqli_num_rows($insigne) > 0){
				     while($row = mysqli_fetch_assoc($insigne)) { ?>
						<div class="insigna <?php if (!in_array($row['id'], $insigneObt)) { echo 'gri'; } ?>">
						<div class="imagineInsigna"><i class="fas <?php echo $row['icon'];?>"></i></div>
						<div class="textInsigna"><?php echo $row['titlu'];?></div>
				</div>
				<?php } } ?>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>