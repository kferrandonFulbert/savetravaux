   var nbElement=0;
   var txtomb=""; 
 function majAll(){
          $(".rendu").html($(".texte").val());
          $(".rendu").css("color",$(".couleur").val());
          $(".rendu").css("color",$(".couleur").val());
          $(".rendu").css("font-size",$(".taille").val());
          $(".rendu").css("-webkit-transform","rotate("+$(".rotation").val()+"deg)");
         $(".rendu").css("-moz-transform","rotate("+$(".rotation").val()+"deg)");
         $(".rendu").css("-ms-transform","rotate("+$(".rotation").val()+"deg)");
          $(".rendu").css("-o-transform","rotate("+$(".rotation").val()+"deg)");
          $(".rendu").css("transform","rotate("+$(".rotation").val()+"deg)");
         $(".rendu").css("filter","progid:DXImageTransform.Microsoft.BasicImage(rotation=3)"); 
         $(".rendu").css("opacity",$(".opacite").val());
         $(".rendu").css("font-style",$("select.style option:selected").val());
          $(".rendu").css("text-transform",$("select.transform option:selected").val());
       txtomb="";
        if(nbElement != 0){
        
        txtomb = $(".depH1").val()+"px ";
        txtomb += $(".depY1").val()+"px ";
        txtomb += $(".flou1").val()+"px ";
        txtomb += $(".ombcolor1").val();
        
          for(var i=2;i<=nbElement;i++){
            txtomb += ", "+$(".depH"+i).val()+"px ";
            txtomb += $(".depY"+i).val()+"px ";
            txtomb += $(".flou"+i).val()+"px ";
            txtomb += $(".ombcolor"+i).val();
            
          }
          //alert(tmp);
        //  tmp+=";";
          $(".rendu").css("text-shadow",txtomb);
        }
         affCode();
      }
      
      
      function affCode(){
      $(".code").html('');
        var tmp;
        tmp = "<code>&lt;p class='kftxt'&gt"+$(".texte").val()+"&lt;/p&gt;<br /><br />";
        tmp += "&lt;style&gt;<br />p.kftxt{<br />";
        if($(".couleur").val() != ""){
          tmp += "color:"+$(".couleur").val()+";<br />";
        }
        if($.isNumeric($(".taille").val())){
           tmp+=  "font-size:"+$(".taille").val()+"px;<br />";
        }
        if($.isNumeric($(".rotation").val())){
           tmp+=  "/* Chrome */ -webkit-transform: rotate("+$(".rotation").val()+"deg);<br />";
           tmp+=  "/* Firefox */ -moz-transform: rotate("+$(".rotation").val()+"deg);<br />";
           tmp+=  "/* IE */ -ms-transform: rotate("+$(".rotation").val()+"deg);<br />";
            tmp+=  "/* Opera */ -o-transform: rotate("+$(".rotation").val()+"deg);<br />";
           tmp+=  "/* Quand tout sera finalis&eacute; */ transform: rotate("+$(".rotation").val()+"deg);<br />"; 
        }
        if($.isNumeric($(".opacite").val())){
           tmp+=  "opacity:"+$(".opacite").val()+";<br />";
        }
        if($("select.style option:selected")){
          tmp += "font-style:"+$("select.style option:selected").val()+";<br />";
        }
        if($("select.transform option:selected")){
          tmp += "text-transform:"+$("select.transform option:selected").val()+";<br />";
        }
        if(txtomb!=''){
        tmp += "text-shadow:"+txtomb+";";
        }
        tmp+="}";
        tmp += "&lt;/style&gt;"
         $(".code").html(tmp);
         
        tmp+="}</code>" 
      }
     
      function addOmbre(){
        nbElement++; 
        var element = "X : <input type='number' placeholder='Nombre' size='3' class='depH"+nbElement+"' /> ";
        element += "Y: <input type='number' placeholder='Nombre' size='3' class='depY"+nbElement+"' />";
        element += "flou: <input type='number' placeholder='Nombre' size='3' class='flou"+nbElement+"' />";
        element += "couleur: <input type='text' placeholder='Hexad&eacute;cimal' onChange='majAll();' onBlur='majAll();' size='7' class='ombcolor"+nbElement+"' /><br /> "; 
        $(".ombre").append(element);
      }
