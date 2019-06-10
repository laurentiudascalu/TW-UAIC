<?php include('./pages/header.php'); ?>
<?php include('./pages/sus.php'); ?>
	<div class="content">
		<div class="container">
			<div class="titluPrimaPagina">
				<span>Raspunsuri neacceptate</span>
			</div>
			<?php if($raspunsuri!=FALSE && mysqli_num_rows($raspunsuri) > 0){
		     while($row = mysqli_fetch_assoc($raspunsuri)) { ?>
				<div class="intrebare nohover <?php echo (($row['acceptat'])?'raspunsCorect':''); ?> <?php echo (($user['admin']>0)?'pb50':''); ?>">
					<div class="titluRaspuns areLike">La <?php echo $row['data']; ?> - <span class="redC"><?php echo $row['nume_complet']; ?> </span> a scris:</div>
					<br/>
					<div class="intrebareContent">
							<?php echo $row['text']; ?>
					</div>
					<?php if($user['id'] > 0){ ?>
						<div class="likeDislike">
							<a href="<?php echo $base_url.'like/raspuns/'.$row['id']; ?>" class="like"><i class="fas fa-thumbs-up"></i> <?php echo $row['nrLike']; ?></a>
							<a href="<?php echo $base_url.'like/raspuns/'.$row['id'].'/1'; ?>" class="dislike"><i class="fas fa-thumbs-down"></i> <?php echo $row['nrDisLike']; ?></a>
						</div>
					<?php } ?>
					<?php if($user['admin'] > 0){ ?>
						<div class="intrebareAdmin">
							<?php if($row['acc'] == 0){ ?>
								<div onclick="if(confirm('Esti sigur ca vrei sa accepti raspunsul?')){ window.location.replace('<?php echo $base_url."accRaspuns/".$row['id']; ?>'); } return false;" class="accepta"><i class="fas fa-check"></i> Accepta</div>
									<?php } ?>
							<div onclick="if(confirm('Esti sigur ca vrei sa stergi raspunsul?')){ window.location.replace('<?php echo $base_url."stergeraspuns/".$row['id']; ?>'); } return false;" class="refuza"><i class="fas fa-times"></i> Sterge</div>
							<div onclick="window.location.replace('<?php echo $base_url.'editraspuns/'.$row['id']; ?>'); return false;" class="veziInfo"><i class="far fa-eye"></i> Edit</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
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
		<?php }else{ ?>
			<span class="intrebare">
				<div class="intrebareContent">Nu s-au gasit rezultate pentru filtrarea aplicata.</div>
			</span>
		<?php } ?>
		</div>
 	</div>
<?php include('./pages/jos.php'); ?>
<?php include('./pages/footer.php'); ?>