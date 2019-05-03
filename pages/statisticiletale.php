<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="meniuCont">
				<a href="./contultau">Contul tau</a>
				<a href="./profil">Profil</a>
				<a href="./intrebariletale">Intrebarile tale</a>
				<a href="./raspunsuriletale">Raspunsurile tale</a>
				<a href="./statisticiletale" class="activ">Statisticile tale</a>
				<a href="./insigneletale">Insignele tale</a>
				<a href="./stergecont">Sterge cont</a>
				<a href="logout">Log-out</a>
			</div>
			<div class="boxPrimaPagina">
				<div class="titluPrimaPagina">Statisticile tale</div>
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
								<td><i class="fas fa-question w20"></i> Total Intrebari</td>
								<td class="tc">120</td>
							</tr>
							<tr>
								<td class="tc">2</td>
								<td><i class="far fa-comments w20"></i> Total Raspunsuri</td>
								<td class="tc">341</td>
							</tr>
						</tbody>
					</table>
					<img src="./public/pics/statistici.png" alt="statistici" class="imagineFull">
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>