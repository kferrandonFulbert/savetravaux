<?php
        $domaine = "192.168.200.";
     if($_POST['ipdebut']&& !$_POST['ipfin']){
     echo (" Ping :<br />");
     $ip=$domaine.$_POST['ipdebut']; /* l'adresse que l'on veut pinguer*/
     $port=""; /* le port que l'on veut tester (ou rien si vous voulez juste pinguer..)*/

     /*test ping*/
        pingIp($ip)   ;
     
     }
     if($_POST['ipdebut']&& $_POST['ipfin']){
       $debut = $_POST['ipdebut'];
       $fin = $_POST['ipfin'];
              echo (" Ping :<br>");
      for($i=$debut;$i<$fin;$i++){
       $ip=$domaine.$i; /* l'adresse que l'on veut pinguer*/
       $port=""; /* le port que l'on veut tester (ou rien si vous voulez juste pinguer..)*/
  
       /*test ping*/
       pingIp($ip)   ;
  
       /*Test port, inutile, si on ne met pas de port dans la variable $port*/
       if ($port && $ping_check==0)
       {
       echo (" Testing port...<br>");
       $portcheck=exec('/usr/bin/nmap -p '.$port.' --host_timeout=2500 '.$ip.'| grep '.$port.'/tcp | cut -f1 -d"/"');
       if ($portcheck!="")
       echo ( "le port $port est ouvert sur $ip");
       else
       echo ( "le port $port est fermé sur $ip");
       }
     }
     
     
     }
    // else{echo 'pas d\' IP envoyé';}
     ?>
       <?php
     function pingIp($ip){
      $resultPing= exec ('ping -w 100 -n 1 '.$ip);
      //exec ('/bin/ping -c2 -q -w2 '.$ip.' | grep transmitted | cut -f3 -d"," | cut -f1 -d"," | cut -f1 -d"%"');
      $resultPing = str_replace('“','ô',$resultPing);
      $resultPing = str_replace('ÿ','',$resultPing);
     // $resultPing = str_replace(',','é',$resultPing);
      $resultPing = str_replace('‚e','ée',$resultPing);
      $resultPing = str_replace('ˆ','è',$resultPing);
      $resultPing = str_replace('‡','ç',$resultPing);
       
       if(preg_match("(perte 100%)", $resultPing, $sortie)) {
          echo (" Machine $ip   hors services $resultPing <img src=\"img\\rouge.gif\" /><br />");
       }
       else{
       $nomMachine = gethostbyaddr($ip);
          echo ("Machine $ip nom : <b>$nomMachine</b> ETAT Allumé: $resultPing <img src=\"img\\vert.gif\" /><br />");  
       }
    /*  if(strpos("(perte 100%)", $resultPing) === false)  {
             echo (" Machine $ip hors services $resultPing <img src=\"img\\rouge.gif\" /><br><br>");
      }
      else{  
       echo ("Machine $ip Allumé: $resultPing <img src=\"img\\vert.gif\" /><br />");   
     
      
        }    */
      }
      
  /*  if ($resultPing==0)
     echo ("Machine $ip Allumé: $resultPing <img src=\"img\\vert.gif\" /><br />");
     if ($resultPing==1)
     echo (" Machine $ip hors services <img src=\"img\\rouge.gif\" /><br><br>");
     }          */
     
     ?>