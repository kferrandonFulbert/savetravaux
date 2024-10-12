<?php
// Fonctions de service
function chgCoordX( $x) {
    global $hom;
    return $hom *( 1 + $x);
}

function chgCoordY( $y) {
    global $hom;
    return $hom *( 1 - $y);
}

// Dimension du graphique
$diagramWidth = $diagramHeight = 200;
$hom = $diagramWidth/2;

// Tableaux des coordonnées
for( $j=0; $j<5; $j++) {
    $A[$j] = cos( 2*$j*PI() / 5);
    $B[$j] = sin( 2*$j*PI() / 5);
}

// On croise les points (on les prende 2 en 2 modulo 5
$X[0] = chgCoordX( $A[0]); $Y[0] = chgCoordY( $B[0]);
$X[1] = chgCoordX( $A[2]); $Y[1] = chgCoordY( $B[2]);
$X[2] = chgCoordX( $A[4]); $Y[2] = chgCoordY( $B[4]);
$X[3] = chgCoordX( $A[1]); $Y[3] = chgCoordY( $B[1]);
$X[4] = chgCoordX( $A[3]); $Y[4] = chgCoordY( $B[3]);

// On construit l'image
$hImg = imageCreate( $diagramWidth, $diagramHeight);

// Allocation de la couleur de l'étoile
$colorBackgr = imageColorAllocate( $hImg, 255, 255, 255);
$c = imageColorAllocate( $hImg, 255, 0, 0);

// Tracé de l'étoile
$x1 = $X[0]; $y1 = $Y[0];
for( $i=1; $i<6; $i++) {
    $j=( $i%5);
    $x2 = $X[$j]; $y2 = $Y[$j];
    imageLine( $hImg, $x1, $y1, $x2, $y2, $c);
    $x1 = $x2; $y1 = $y2;
}

if ( imagetypes() & IMG_GIF) {
    header("Content-type: image/gif");
    imageGif($hImg);
} elseif (imagetypes() & IMG_PNG) {
    header("Content-type: image/png");
    imagePng( $hImg); //
} else {
    die("Pas de support graphique avec PHP sur ce serveur");
}
?>