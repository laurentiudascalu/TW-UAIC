<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="titluPrimaPagina">
				<span>Intrebari</span>
			</div>
			<form action="p" class="filtre">
				<div class="filtru">
					<select class="inputSelect">
						<option value="">Alege categorie...</option>
						<option value="Informatica">Informatica</option>
						<option value="Matematica">Matematica</option>
						<option value="Istorie">Istorie</option>
						<option value="Geografie">Geografie</option>
						<option value="Limbi straine">Limbi straine</option>
						<option value="Antreprenoriat">Antreprenoriat</option>
						<option value="Sport">Sport</option>
						<option value="Turism">Turism</option>
						<option value="Muzica">Muzica</option>
						<option value="Literatura">Literatura</option>
					</select>
				</div>
				<div class="filtru">
					<select class="inputSelect">
						<option value="">Alege tag-uri...</option>
						<option value="#Design">#Design</option>
						<option value="#Web">#Web</option>
					    <option value="#Integrale">#Integrale</option>
					    <option value="#Windows">#Windows</option>
					    <option value="#Gramatica">#Gramatica</option>
					    <option value="#Maraton">#Maraton</option>
					    <option value="#Engleza">#Engleza</option>
					    <option value="#Germana">#Germana</option>
					    <option value="#Afaceri">#Afaceri</option>
					    <option value="#Fotbal">#Fotbal</option>
					</select>
				</div>
				<div class="filtru">
					<select class="inputSelect">
						<option value="">Alege status intrebare...</option>
						<option value="Rezolvata">Rezolvata</option>
						<option value="Nerezolvata">Nerezolvata</option>
					</select>
				</div>
				<div class="filtru">
					<select class="inputSelect">
						<option value="">Alege ordonarea...</option>
						<option value="CrescatorData">Crescator dupa data</option>
						<option value="DescrescatorData">Descrescator dupa data</option>
						<option value="CrescatorRaspunsuri">Crescator dupa nr raspunsuri</option>
						<option value="DescrescatorRaspunsuri">Descrescator dupa nr raspunsuri</option>
						<option value="CrescatorRelevanta">Crescator dupa relevanta</option>
						<option value="DescrescatorRelevanta">Descrescator dupa relevanta</option>
					</select>
				</div>
				<div class="filtru">
					<input type="text" class="inputSelect" placeholder="Cauta dupa cuvant cheie...">
				</div>
				<div class="filtru">
					<input type="date" class="inputSelect">
				</div>
				<div class="filtru">
					<input type="date" class="inputSelect">
				</div>
				<div class="filtru tc">
					<input type="submit" class="inputSubmit" name="submitFiltrare" value="Cauta intrebare">
				</div>
			</form>
			<?php if(mysqli_num_rows($intrebari) > 0){
		     while($row = mysqli_fetch_assoc($intrebari)) { ?>
				<a href="<?php echo $base_url; ?>intrebare/<?php echo $row['id']; ?>" class="intrebare">
					<div class="intrebareTitlu"><?php echo $row['titlu']; ?><span class="blackC"> - postata de: </span> <?php echo $row['nume_complet']; ?></div>
					<div class="intrebareContent">
						<?php echo $row['text']; ?>
					</div>
					<div class="intrebareHashtaguri">
						<div class="hashtag">#test</div>
						<div class="hashtag">#deTest</div>
						<div class="hashtag">#PHP</div>
						<div class="hashtag">#HTML</div>
						<div class="hashtag">#CSS</div>
						<div class="hashtag">#JS</div>
						<div class="hashtag">#MySQL</div>
					</div>
					<div class="likeDislike">
						<div class="like"><i class="fas fa-thumbs-up"></i> 590</div>
						<div class="dislike"><i class="fas fa-thumbs-down"></i> 30</div>
					</div>
				</a>
		<?php } } ?>
			<div class="butoanePaginare">
				<a href="" title="Prima Pagina"><i class="fas fa-angle-double-left"></i><i class="fas fa-angle-double-left"></i></a>
				<a href="" title="Pagina Anterioara"><i class="fas fa-angle-double-left"></i></a>
				<select class="inputSelect w40 mr5">
					<option value="1" selected="selected">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
				<a href="" title="Pagina Urmatoare"><i class="fas fa-angle-double-right"></i></a>
				<a href="" title="Ultima Pagina"><i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i></a>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>