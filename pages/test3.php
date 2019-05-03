<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Flexbox 0 — starting code</title>
  </head>
  <body>
    <?php $dirname = "./public/pics";
     $images = glob($dirname."/*.png");
     foreach($images as $image) { 
     echo '<img src="'.$image.'" /><br />'; 
     }  ?>
  </body>
</html>