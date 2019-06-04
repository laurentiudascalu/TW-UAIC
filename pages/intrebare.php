<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="container">
		<div class="content">
			<div class="boxPrimaPagina">
				<div class="likeDislike">
					<div class="like"><i class="fas fa-thumbs-up"></i> 590</div>
					<div class="dislike"><i class="fas fa-thumbs-down"></i> 30</div>
				</div>
				<div class="titluPrimaPagina intrebareTitluPagina areLike"><?php echo $intrebare['titlu']; ?><span class="blackC"> - postata de: </span> <?php echo $intrebare['nume_complet']; ?></div>
				<div class="intrebarePaginaContent mb20">
					<?php echo $intrebare['text']; ?>
				</div>
				<div class="intrebareHashtaguri mb20">
					<div class="hashtag">#test</div>
					<div class="hashtag">#deTest</div>
					<div class="hashtag">#PHP</div>
					<div class="hashtag">#HTML</div>
					<div class="hashtag">#CSS</div>
					<div class="hashtag">#JS</div>
					<div class="hashtag">#MySQL</div>
				</div>
				<div class="box full">
					<div class="titluBox pl40">
						<i class="fas fa-plus"></i>Adauga un raspuns
					</div>
					<div class="formular">
						<form action="<?php echo $base_url; ?>p" method="post">
							<input type="hidden" name="id_intrebare" value="<?php echo $intrebare['id']; ?>">
							<div class="linieForm <?php echo (($user['id']==0)?'':'pt0'); ?>">
								<div class="label">
									<?php if($user['id']==0){ echo 'Mail'; }?>
								</div>
								<div class="input">
									<input type="<?php echo (($user['id']==0)?'mail':'hidden'); ?>" name="mail" value="<?php echo (($user['id']==0)?'':$user['mail']); ?>">
								</div>
							</div>
							<div class="linieForm">
								<div class="input">
									<textarea name="raspuns" class="height170" placeholder="Adauga un raspuns.."></textarea> 
								</div>
							</div>
							<div class="linieForm">
								<div class="submit">
							 		<input type="submit" value="Adauga raspuns" name="adaugaraspuns">
							 	</div>
							</div>
						</form>
					</div>
				</div>
				<div class="contentPrimaPagina pt30">
					<div class="intrebare nohover raspunsCorect">
						<div class="titluRaspuns areLike">La 19-03-2019 22:30 - <span class="redC">Dulceanu Marina </span> a scris:</div>
						<div class="intrebareContent">
							Salut!<br/>
							Sunt o multime de site-uri bune care te pot ajuta.<br/>
							Unul pe care il folosesc eu, si il recomand este <a href="https://coolors.co/" target="_blank">coolors.co</a>
						</div>
						<div class="likeDislike">
							<div class="like"><i class="fas fa-thumbs-up"></i> 10</div>
							<div class="dislike"><i class="fas fa-thumbs-down"></i> 1</div>
						</div>
					</div>
					<div class="intrebare nohover">
						<div class="titluRaspuns">La 19-03-2019 22:30 - <span class="redC">Dulceanu Marina </span> a scris:</div>
						<div class="intrebareContent">
							Salut!<br/>
							Sunt o multime de site-uri bune care te pot ajuta.<br/>
							Unul pe care il folosesc eu, si il recomand este <a href="https://coolors.co/" target="_blank">coolors.co</a>
						</div>
						<div class="likeDislike">
							<div class="like"><i class="fas fa-thumbs-up"></i> 10</div>
							<div class="dislike"><i class="fas fa-thumbs-down"></i> 1</div>
						</div>
					</div>
					<div class="intrebare nohover">
						<div class="titluRaspuns">La 19-03-2019 22:30 - <span class="redC">Dulceanu Marina </span> a scris:</div>
						<div class="intrebareContent">
							Salut!<br/>
							Sunt o multime de site-uri bune care te pot ajuta.<br/>
							Unul pe care il folosesc eu, si il recomand este <a href="https://coolors.co/" target="_blank">coolors.co</a>
						</div>
						<div class="likeDislike">
							<div class="like"><i class="fas fa-thumbs-up"></i> 10</div>
							<div class="dislike"><i class="fas fa-thumbs-down"></i> 1</div>
						</div>
					</div>
					<div class="intrebare nohover">
						<div class="titluRaspuns">La 19-03-2019 22:30 - <span class="redC">Dulceanu Marina </span> a scris:</div>
						<div class="intrebareContent">
							Salut!<br/>
							Sunt o multime de site-uri bune care te pot ajuta.<br/>
							Unul pe care il folosesc eu, si il recomand este <a href="https://coolors.co/" target="_blank">coolors.co</a>
						</div>
						<div class="likeDislike">
							<div class="like"><i class="fas fa-thumbs-up"></i> 10</div>
							<div class="dislike"><i class="fas fa-thumbs-down"></i> 1</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>