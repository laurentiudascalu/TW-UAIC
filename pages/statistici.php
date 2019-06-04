<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="boxPrimaPagina">
				<div class="titluPrimaPagina">Statistici</div>
				<div class="continutPaginaStatica">
					<table class="top mb50">
						<thead>
						<tr>
							<th class="coloana1 tc">#Nr</th>
							<th class="coloana2 tl">Valoare</th>
							<th class="coloana3 tc">Totaluri</th>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td class="tc">1</td>
								<td><i class="fas fa-users w20"></i> Total Utilizatori</td>
								<td class="tc">15.320</td>
							</tr>
							<tr>
								<td class="tc">2</td>
								<td><i class="fas fa-question w20"></i> Total Intrebari</td>
								<td class="tc">53.210</td>
							</tr>
							<tr>
								<td class="tc">3</td>
								<td><i class="far fa-comments w20"></i> Total Raspunsuri</td>
								<td class="tc">150.000</td>
							</tr>
							<tr>
								<td class="tc">4</td>
								<td><i class="fas fa-walking w20"></i> Total Vizitatori</td>
								<td class="tc">122.889</td>
							</tr>
						</tbody>
					</table>
					<img src="<?php echo $base_url; ?>public/pics/statistici.png" alt="statistici" class="imagineFull">
					<img src="<?php echo $base_url; ?>public/pics/statistici2.png" alt="statistici2" class="imagineFull">
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>