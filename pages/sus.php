	<header>
		<div class="container">
			<div class="sus">
				<div class="logo">
					<a href="./home"><img src="./public/pics/logo4.png" alt="logo"></a>
				</div>
				<div class="cauta">
					<form action="/p" class="cautareSus">
						<input type="text" placeholder="Search.." name="search">
						<button><i class="fas fa-search"></i></button>
					</form>
				</div>
				<div class="login">
					<div class="buton"><a href="./login">Log-in</a></div>
					<a href="./contnou">Sign up</a>
				</div>
			</div>
		</div>
	</header>
	<nav>
		<div class="container">
			<div class="meniu">
				<a href="./home" <?php if($activ=='home'){ ?> class="activ" <?php } ?> >Home</a>
				<a href="./intrebari" <?php if($activ=='intrebari'){ ?> class="activ" <?php } ?> >Intrebari</a>
				<a href="./top" <?php if($activ=='top'){ ?> class="activ" <?php } ?> >Top</a>
				<a href="./statistici" <?php if($activ=='statistici'){ ?> class="activ" <?php } ?> >Statistici</a>
				<a href="./insigne" <?php if($activ=='insigne'){ ?> class="activ" <?php } ?> >Insigne</a>
				<a href="./intrebareAdmin" <?php if($activ=='intrebareAdmin'){ ?> class="activ" <?php } ?> >Admin</a>
				<a href="./adaugaintrebare" class="adaugaIntrebare <?php if($activ=='adaugaintrebare'){ echo 'activ'; } ?>" >+ <span class="none">Adauga intrebare</span></a>
			</div>
		</div>
	</nav>