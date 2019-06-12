<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="titluPrimaPagina">
				<span>Top 20 utilizatori</span>
			</div>
			<div class="contentTop">
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
		     			if($i<21){ ?>
							<tr>
								<td class="tc"><?php echo $i; ?></td>
								<td><i class="fas fa-user-circle"></i> <?php echo $row['nume_complet']; ?></td>
								<td class="tc"><?php echo $row['puncte']; ?></td>
							</tr>
						<?php } } } ?>
					</tbody>
				</table>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>