<?php 
/*
   if( ! $xml = simplexml_load_file('test.xml') ) 
    { 
        echo 'unable to load XML file'; 
    } 
    else 
    { 
        foreach( $xml as $user ) 
        { 
            echo 'Firstname: '.$user->firstname.'<br />'; 
            echo 'Surname: '.$user->surname.'<br />'; 
            echo 'Address: '.$user->address.'<br />'; 
            echo 'City: '.$user->city.'<br />'; 
            echo 'Country: '.$user->country.'<br />'; 
            echo 'Email: '.$user->contact->phone.'<br />'; 
            echo 'Email: '.$user->contact->url.'<br />'; 
            echo 'Email: '.$user->contact->email.'<br />'; 
        } 
    } 

*/

  if( ! $xml = simplexml_load_file('test.xml') ) 
    { 
        echo 'unable to load XML file'; 
    } 
    else 
    { 
        $children = $xml->children(); 
        $bfils =false;
        foreach($children as $child){
         $child2 = $child->children();
             
              foreach($child2 as $child3){
               
                   $child4 = $child3->children();
                   $bfils =false;
                 
                  foreach($child4 as $child5){
                   $bfils =true;
                   echo $child5->asXML().'<br />';
                  }
                if(!$bfils){echo $child3->asXML().'<br />';}
             }
            
            
        }

    } 
?> 
