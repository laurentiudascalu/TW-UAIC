<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="boxPrimaPagina">
								<div class="titluPrimaPagina">Fii printre primii</div>
				<div class="contentPrimaPagina">
					<table class="top">
						<thead>
						<tr>
							<th class="coloana1 tc">#Nr</th>
							<th class="coloana2 tl">User</th>
							<th class="coloana3 tc">Puncte</th>
						</tr>
						</thead>
						<tbody>
							<?php if(!empty($top)){ $i=0;
		     			foreach ($top as $row) { $i++; 
		     			if($i<6){ ?>
							<tr>
								<td class="tc"><?php echo $i; ?></td>
								<td><i class="fas fa-user-circle"></i> <?php echo $row['nume_complet']; ?></td>
								<td class="tc"><?php echo $row['puncte']; ?></td>
							</tr>
						<?php } } } ?>
						</tbody>
					</table>
				</div>
				<div class="titluPrimaPagina">Cele mai recente intrebari</div>
				<div class="contentPrimaPagina">
					<?php $i=0; ?>
					<?php if($intrebari!=FALSE && mysqli_num_rows($intrebari) > 0){
		     			while($row = mysqli_fetch_assoc($intrebari)) {
			     			$i++;
			     			if ($i<=5){ 
				     			$taguri = getTaguri(-1,'',$row['id']); ?>
								<a href="<?php echo $base_url; ?>intrebare/<?php echo $row['id']; ?>" class="intrebare">
								<div class="intrebareTitlu"><?php echo $row['titlu']; ?><span class="blackC"> - postata de: </span> <?php echo $row['nume_complet']; ?></div>
								<div class="intrebareContent">
									<?php echo $row['text']; ?>
								</div>
								<div class="intrebareHashtaguri">
									<?php if(mysqli_num_rows($taguri) > 0){
				     					while($row2 = mysqli_fetch_assoc($taguri)) { ?>
				     						<div class="hashtag">#<?php echo $row2['tag']; ?></div>
				     				<?php } } ?>
								</div>
								</a>
							<?php }else { break; } ?>
					<?php } } ?>
				</div>
				<div class="titluPrimaPagina">Obtine Insigne</div>
				<div class="contentPrimaPagina">
					<div class="insigne">
						<?php if($insigne!=FALSE && mysqli_num_rows($insigne) > 0){
						     while($row = mysqli_fetch_assoc($insigne)) { ?>
								<div class="insigna">
									<div class="imagineInsigna"><i class="fas <?php echo $row['icon']?>"></i></div>
									<div class="textInsigna"><?php echo $row['titlu']?></div>
								</div>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
 	</div>

<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>