<?php

function creerCadre(){
  // Ce qui suit est le code d'une image PNG
  header("Content-type: image/png");
  // L'image fait 200x100
  $largeur = 800;
  $hauteur = 50;
  $imgB = imageCreate($largeur, $hauteur);
  $imgG = imageCreate($hauteur,$largeur);


  // La première couleur de la palette
  // qui constitue la couleur de fond
  // sera le rouge
  $vert = imageColorAllocate($imgB, 0, 200, 0);
  $vert = imageColorAllocate($imgG, 0, 200, 0);

  // Que l'on peut rendre transparent
  //imagecolortransparent($im,$rouge);

  // Envoyons le code de l'image 
  imagePNG($imgB);
  imagePNG($imgG);

  // Et liberons les ressources
  imageDestroy($imgB); 
  imageDestroy($imgG); 
}
?>
