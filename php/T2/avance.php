<?php

include 'objet/class.php';

             $circuit = new cadre();
$circuit->creaBord(700, 500, 50, '#00aa00');   
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
        
        /****************************
         * 
         */
        $fond = new objet(250, 540, 'fond', '.png');
//echo $fond->affiche();


$tabFond = array();
for($i=0;$i<11;$i++){
  for($j=0;$j<8;$j++){
      if($i==5&&$j==4){$img = 'tux';$action='parler';
            $toto=  new decore((250+($fond->getLargeur()*($i))), 540-($fond->getHauteur()*($j)), $img, '.png','parler');    
            $tabFond[$j]=  new decore((250+($fond->getLargeur()*($i))), 540-($fond->getHauteur()*($j)), $img, '.png','parler');    
            $bomber->attach($toto);
            echo $toto->affiche();
      }else{$img = 'fond';$action='';
       $tabFond[$j]=  new objet((250+($fond->getLargeur()*($i))), 540-($fond->getHauteur()*($j)), $img, '.png'); 
      }
    echo $tabFond[$j]->affiche();
  }
}

         $param = base64_encode(serialize($bomber));      
        
       // file_put_contents('toto', $param);

        include 'direction.php';

     //   include 'dessin.php';
        
echo '<br /><br /><br /><br /><br /><div style="">'.$circuit->afficheLimit().'</div>';
echo $circuit->afficheBordure();
// echo '<br /><br /><br /><br /><br /><div style="">'.$circuit->afficheLimit().'</div>';


        ?>
