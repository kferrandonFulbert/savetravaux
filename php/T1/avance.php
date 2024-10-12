<?php

include 'objet/class.php';

             $circuit = new cadre();
$circuit->creaBord(800, 600, 50, '#00aa00');   
if ((isset($_POST['hero'])) && (!empty($_POST['hero'])))
	{
            
            $param = $_POST['hero'];
            $direction=$_POST['direction'];
           $bomber = unserialize(base64_decode($param));
	}
        else{
           $_POST['hero'] = $bomber;
        }
        
        switch ($direction) {
            case 'gauche':
                $bomber->gauche();
           /*     if(collisionBordure($bomber, $circuit)){
                   $voiture->droite(); 
                }*/
                break;
            case 'droite':
                $bomber->droite();
              /*  if(collisionBordure($bomber, $circuit)){
                   $voiture->gauche(); 
                }*/
                break;
            case 'haut':
                 $bomber->haut();
              /*  if(collisionBordure($bomber, $circuit)){
                   $voiture->bas(); 
                }*/
                break;
            case 'bas':
                 $bomber->bas();
               /* if(collisionBordure($bomber, $circuit)){
                   $voiture->haut(); 
                }*/
                break;
            default:
               $voiture->gauche();
        }
        

        
        echo '<div title="X('.$bomber->getXMin().','.$bomber->getXMax().'), Y('.$bomber->getYMin().','.$bomber->getYMax().')">'.$bomber->affiche().'</div>';
        
     //   $param = serialize($voiture);     
        $bomber->attach($circuit);
      //  echo $bomber->affiche();
      //  file_put_contents('toto', $param);
         $param = base64_encode(serialize($bomber));      
        
       // file_put_contents('toto', $param);

        include 'direction.php';

     //   include 'dessin.php';
        
echo '<br /><br /><br /><br /><br /><div style="">'.$circuit->afficheLimit().'</div>';
echo $circuit->afficheBordure();
// echo '<br /><br /><br /><br /><br /><div style="">'.$circuit->afficheLimit().'</div>';
        ?>
