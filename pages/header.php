<!DOCTYPE html>
<html lang="ro">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style2.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<title>Adwise</title>
</head>
<body>
<?php if(isset($_SESSION["mesaj"]) && $_SESSION["mesaj"]!=''){ ?>
	<div class="mesaj">
		<span class="mesajClose" onclick="$('.mesaj').hide('slow');"><i class="fas fa-times"></i></span>
		<span class="mesajText"><?php echo $_SESSION["mesaj"]; ?></span>
	</div>

<?php unset($_SESSION["mesaj"]); }?>