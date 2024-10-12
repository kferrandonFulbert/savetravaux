<div style="background-color: grey;width:150px;height:100px;position:absolute;top:0px;left:0px;" >
<form method="post" action="avance.php" name="avance" style="position:absolute;top:30px;left:0px;">
    <input type="hidden" value="<?php echo $param;?>" name="voiture"/>
    <input type="hidden" value="gauche" name="direction"/>
<input type="submit" value="<"  />
</form>
<form method="post" action="avance.php" name="avance2" style="position:absolute;top:30px;left:120px;">
    <input type="hidden" value="<?php echo $param;?>" name="voiture"/>
    <input type="hidden" value="droite" name="direction"/>
<input type="submit" value=">"  />
</form>
<form method="post" action="avance.php" name="avance3" style="position:absolute;top:0px;left:50px;">
    <input type="hidden" value="<?php echo $param;?>" name="voiture"/>
    <input type="hidden" value="haut" name="direction"/>
<input type="submit" value="Haut"  />
</form>
<form method="post" action="avance.php" name="avance4" style="position:absolute;top:60px;left:50px;">
    <input type="hidden" value="<?php echo $param;?>" name="voiture"/>
    <input type="hidden" value="bas" name="direction"/>
<input type="submit" value="Bas"  />
</form>
</div>