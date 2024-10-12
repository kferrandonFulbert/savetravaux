<html>       
  <head>                
    <title>Multiplication     
    </title>           		     
    <link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />    		     
    <link type="text/css" href="./css/standard.css" rel="stylesheet" />     
<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script> 		 
<script type="text/javascript" src="../js/jquery-ui-1.8.16.custom.min.js"></script>      
<script type="text/javascript" src="../js/typewriter.min.js"></script>              
  </head>     
<script>
      $(document).ready(function() {
          //  alert('hello');
          
          $("h1").hover(function(){
              $("h1").addClass("effet");
          });
          $("h1").mouseout(function(){
              $("h1").removeClass("effet");
          });
         $('#accueil').typewriter( 5000 );
          
          creerTable();
      });

          var table = new Array('grey','brown','pink', 'yellow', 'green', 'red', 'blue', 'purple','orange', '#66FFFF', '#09919C');
    var nbcoup;
  function creerTable(){
    var nbTable=document.getElementById('nbTable');
    var content = document.getElementById('contenux');
    var i=0;
     var j=0;
     var tmp=0;
      var html='<table>';
        for(i==0;i<nbTable.value;i++){
        if(tmp!=i || tmp==0){ html+='<th>Table des '+i+'</th>'; tmp=i }
    	html  +='<td><tr><td>';
    	for(j==0;j<11;j++){
               html  +='<span style="color:'+table[i]+'">'+i+'</span> * '+ '<span style="color:'+table[j]+'">'+j+'</span> = <b>'+(i*j)+'</b><br />';
        	  }
    html  +='</td></tr></td>';
    j=0;
          }
    html  +='</tr></table>';
        //document.body.innerHTML = html;
    content.innerHTML = html;
    return true;
  }
function TableX(){
    var nbTable=document.getElementById('nbTable');
    var content = document.getElementById('contenux');
    var i=0;
    var html='<table><th>Table de '+nbTable.value+'</th>';
      for(i==0;i<11;i++){
  	   html  +='<tr><td>';
             html  +='<span style="color:'+table[parseInt(nbTable.value)]+'">'+nbTable.value+'</span> * '+ '<span style="color:'+table[i]+'">'+i+'</span> = <b>'+(parseInt(nbTable.value)*i)+'</b><br />';
        html  +='</td></tr>';
        }
    html  +='</table>';
      //document.body.innerHTML = html;
  content.innerHTML = html;
  return true;
}
function exercice(){
  var nbTable=document.getElementById('nbTable');
  nbcoup=1;
  var hasard=0;
  hasard=nbTable.value;
  var content = document.getElementById('contenux');
  var x=0;
  if(nbTable.value !='' && nbTable.value != 0){x=nbTable.value;}else{x=Math.floor(Math.random()*10); hasard=10;}
   //Math.floor(Math.random()*nbTable.value);
  var y= Math.floor(Math.random()*hasard);
  var html='';
  html  +='<br /><br /><input type="hidden" value="'+(x*y)+'" id="res" /><span style="color:'+table[x]+'">'+x+'</span> * '+ '<span style="color:'+table[y]+'">'+y+'</span> = <input type="text" id="nb" /><br /><br /><input type="button" onclick="verif();" value="Valider" />';
  content.innerHTML = html;
}
function verif(){
  var content = document.getElementById('contenux');
  var erreur = document.getElementById('erreur');
  erreur.innerHTML = '';
  var html = '';
  var nb=document.getElementById('nb');
  var res=document.getElementById('res');
  // html=content.value;
  // alert(res+"-"+nb);
  if(res.value==nb.value){
  content.innerHTML=html+'<br /><br />Bravo vous avez r&eacute;ussi en '+nbcoup+' coup <input type="button" value="Rejouer" onclick="exercice();" /><br /><br />';
  return true;
  }
  else{
  nbcoup++;
  erreur.innerHTML ='Erreur';
  return false;
  }
  //content.innerHTML = html;
}
function survole(txt){
$('#imgBulle').addClass('imgBulle');
  var aide = document.getElementById('txtAide');
  aide.innerHTML=txt;
  $('#txtAide').typewriter( 1000 );
}
function hideAide(){
var aide = document.getElementById('txtAide');
  aide.innerHTML='';
  $('#imgBulle').removeClass('imgBulle');
}
    </script>        
  <body>         
    <div id='conteneur'>             
      <div id='header'>      <h1>Multiplication</h1>             
      </div>             
      <div id='menu'>                     
        <ul>                         
          <li>          
          <a href='#'>Accueil</a>          
          </li>                         
          <li>Tables           
          </li>                         
          <li>Exercice           
          </li>                     
        </ul>             
      </div>      <br />             
      <div id='contenu'> 
      <div id='option'>Nombre          
        <input type="text" id='nbTable' /><br /><br />        
        <input type='button' onClick='creerTable();' value='X tables de multiplications' onMouseOut='hideAide();' onMouseOver='survole("Affiche le nombre de table de multiplication que tu veux")' title='Affiche le nombre de table de multiplication que tu veux'/>        
        <input type='button' onClick='TableX();' value='Affiche la table X de multiplication' onMouseOut='hideAide();' onMouseOver='survole("Affiche la table de multiplication que tu veux.")' title='Affiche la table de multiplication que tu veux.'/>        
        <input type='button' onClick='exercice();' value='exercice' onMouseOut='hideAide();' onMouseOver='survole("Excercice pratique pour avoir de bonne notes.")' title='Excercice pratique.'/>         
      </div>                      
        <p id='accueil'>           Bonjour,<br />           Bienvenue dans l'application multiplication.<br />           Vous allez apprendre a maitriser vos tables de multiplication en un rien de temps.<br />           Vous pourrez vous entrainer sur de nombreux exercices.<br />           Nous esp&eacute;rons que vous vous amuserez tout en apprenant.                     
        </p>   
              
      <div id='contenux'>            
      </div>         
      <span id="erreur">      
      </span>                                          
      </div>
      <div id="imgBulle" ></div> 
      <div id="txtAide"></div>               
      <div id="imgAide"></div>
    </div>       
  </body>
</html>
