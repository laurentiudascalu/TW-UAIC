<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<?php include('./pages/meniuCont.php'); ?>
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
								<td class="tc"><?php echo $intrebari; ?></td>
							</tr>
							<tr>
								<td class="tc">2</td>
								<td><i class="far fa-comments w20"></i> Total Raspunsuri</td>
								<td class="tc"><?php echo $raspunsuri; ?></td>
							</tr>
							<tr>
								<td class="tc">3</td>
								<td><i class="far fa-comments w20"></i> Total Raspunsuri Castigatoare</td>
								<td class="tc"><?php echo $raspunsuriC; ?></td>
							</tr>
						</tbody>
					</table>
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
 	</div>
 	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
 	<script>
 		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: 'line',

		    // The data for our dataset
		    data: {
		        labels: [ <?php for ($i=6; $i>=0; $i--) {
		        	echo "'".date('Y-m-d',strtotime ( '-'.$i.' day' , strtotime (date('Y-m-d'))))."', ";
		        } ?>],
		        datasets: [{
		            label: 'Intrebari',
		            backgroundColor: 'rgb(25, 100, 126)',
		            borderColor: 'rgb(25, 100, 126)',
		            data: [ <?php foreach ($intr as $row) {
		            	echo $row.', ';
		            }?> ],
		        	fill:false
		        },
		        {
		            label: 'Raspunsuri',
		            backgroundColor: 'rgb(153, 29, 33)',
		            borderColor: 'rgb(153, 29, 33)',
		            data: [ <?php foreach ($rasp as $row) {
		            	echo $row.', ';
		            }?> ],
		        	fill:false
		        }]
		    },


		    // Configuration options go here
		    options: {

		    }
		});
 	</script>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>