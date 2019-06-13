	<header>
		<div class="container">
			<div class="sus">
				<div class="logo">
					<a href="<?php echo $base_url; ?>"><img src="<?php echo $base_url; ?>public/pics/logo4.png" alt="logo"></a>
				</div>
				<div class="cauta">
					<form action="<?php echo $base_url; ?>intrebari" class="cautareSus" method="post">
						<input type="hidden" name="submitFiltrare" value="Cauta intrebare">
						<input type="text" placeholder="Search.." name="cuvant">
						<button><i class="fas fa-search"></i></button>
					</form>
				</div>
				<div class="<?php echo (($user['id']>0)?'autentificat':'login'); ?>" >
					<?php if ( $user['id']>0 ){ 
						 $nume = array(); 
						 $nume = explode(' ',$user['nume_complet']);
						 $nume = $nume[0]; ?>
						<span class="numeLogin" title="<?php echo $user['nume_complet']; ?>">Salut, <?php echo $nume; ?> </span>
						<div class="buton"><a href="<?php echo $base_url; ?>contultau">Contul Tau</a></div>
					<?php }else{ ?>
						<div class="buton"><a href="<?php echo $base_url; ?>login">Log-in</a></div>
						<a href="<?php echo $base_url; ?>contnou">Sign up</a>					
					<?php } ?>
				</div>
			</div>
		</div>
	</header>
	<nav>
		<div class="container">
			<div class="meniu">
				<a href="<?php echo $base_url; ?>" <?php if($activ=='home'){ ?> class="activ" <?php } ?> >Acasa</a>
				<a href="<?php echo $base_url; ?>intrebari" <?php if($activ=='intrebari'){ ?> class="activ" <?php } ?> >Intrebari</a>
				<a href="<?php echo $base_url; ?>top" <?php if($activ=='top'){ ?> class="activ" <?php } ?> >Top</a>
				<a href="<?php echo $base_url; ?>statistici" <?php if($activ=='statistici'){ ?> class="activ" <?php } ?> >Statistici</a>
				<a href="<?php echo $base_url; ?>insigne" <?php if($activ=='insigne'){ ?> class="activ" <?php } ?> >Insigne</a>
				<a href="<?php echo $base_url; ?>intrebariacc" <?php if($activ=='intrebariacc' || $activ == 'raspunsuriacc' || $activ== 'editintrebare' || $activ=='editraspuns'){ ?> class="activ" <?php } ?> >Admin</a>
				<a href="<?php echo $base_url; ?>adaugaintrebare" class="adaugaIntrebare <?php if($activ=='adaugaintrebare'){ echo 'activ'; } ?>" >+ <span class="none">Adauga intrebare</span></a>
			</div>
		</div>
	</nav>