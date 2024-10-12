<?php
//session_start();
include 'objet/class.php';
//include 'objet/vehicule.php';
//include 'objet/voiture.php';
//$toto = new voiture();
             $circuit = new circuit();
$circuit->creaBord(800, 600, 50, '#00aa00');   
if ((isset($_POST['voiture'])) && (!empty($_POST['voiture'])))
	{
            
            $param = $_POST['voiture'];
            $direction=$_POST['direction'];
          // var_dump($param);die;
        //     $s = file_get_contents('store');
        //     $voiture = unserialize($s);
           $voiture = unserialize(base64_decode($param));
	}
        else{
           $_POST['voiture'] = $voiture;
        }
        
  //     $s = file_get_contents('toto');
       //var_dump($s);
  //           $voiture = unserialize($s);
      // echo  $voiture->affiche();
      //var_dump($voiture);die;
     //   echo $voiture->getNom();
     //   echo $voiture->getMarque();
    //    echo $direction;
        switch ($direction) {
            case 'gauche':
                $voiture->gauche();
                if(collisionBordure($voiture, $circuit)){
                   $voiture->droite(); 
                }
                break;
            case 'droite':
                $voiture->droite();
                if(collisionBordure($voiture, $circuit)){
                   $voiture->gauche(); 
                }
                break;
            case 'haut':
                 $voiture->haut();
                if(collisionBordure($voiture, $circuit)){
                   $voiture->bas(); 
                }
                break;
            case 'bas':
                 $voiture->bas();
                if(collisionBordure($voiture, $circuit)){
                   $voiture->haut(); 
                }
                break;
            default:
               $voiture->gauche();
        }
        

        
        echo '<div title="X('.$voiture->getXMin().','.$voiture->getXMax().'), Y('.$voiture->getYMin().','.$voiture->getYMax().')">'.$voiture->affiche().'</div>';
        
     //   $param = serialize($voiture);      
        
      //  file_put_contents('toto', $param);
         $param = base64_encode(serialize($voiture));      
        
        file_put_contents('toto', $param);

        include 'direction.php';

     //   include 'dessin.php';
        

echo $circuit->afficheBordure();
// echo '<br /><br /><br /><br /><br /><div style="">'.$circuit->afficheLimit().'</div>';
        ?>
