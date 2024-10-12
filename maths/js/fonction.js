
   var i=0;
function compteurClick(src,dest){$(src).click(function(){var i=$(dest).text();i++;$(dest).text(i);$(src).focus();})}
function afficher_alternatif(eltAff, eltHide){
if(i==2 || i==0){i=1;$(eltAff).hide('slow');$(eltHide).show('slow');return;}
if(i==1){i=2;$(eltHide).hide('slow');$(eltAff).show('slow');return;}
}

function erreur(dial, msg){
$(dial).text(msg);
$(dial).dialog('open');
}
 var init=0;
 var eltcur=0;
function diapo(eltdeb,eltfin){
 var nomelt
 if(eltcur==eltfin){eltcur=0;}else{eltcur++;}
 nomelt =  eltdeb+eltcur;
          alert(nomelt);
  nomelt += '.png';
//  $('#diapo_img').hide('slow');
  $('#diapo_img').empty();
 $('#diapo_img').append("<img src=\'"+nomelt+"\'");
 $('#diapo_img').show();
// $(nomelt).hide('slow');
 
//  nomelt =  eltdeb+eltcur;
// $(nomelt).show('slow');
 
}