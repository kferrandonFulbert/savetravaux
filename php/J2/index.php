    <?php
    //======================================= http://altert.family.free.fr/ ========
    $BackGroundColor = "#F8F8F8";
    $ActiveCellColor = "yellow";
    //------------------------------------------------------------------------------
    function GetGet($Value,$DefaultValue) {
    //INFO: l'utilisation de HTMLSPECIALCHARS évite les trous de sécurité du type
    // http://localhost/morpion.php?game=100020010&level=2&serverpts=<script>alert("Salut");</script>&playerpts=0
    if (isset($_GET[$Value])) {
    if ($_GET[$Value]=='')
    return $DefaultValue;
    else
    return htmlspecialchars($_GET[$Value]);
    } else
    return $DefaultValue;
    }
    function HasChar($Text,$Char) {
    $HasC = false;
    for ($i=0 ; $i<strlen($Text) ; $i++)
    if ($Text[$i]==$Char) {
    $HasC = true;
    break;
    }
    return $HasC;
    }
    //------------------------------------------------------------------------------
    $DisallowLinks = false;
    $WinningPosition = -1;
    $ServerPoints = GetGet('serverpts',0);
    $PlayerPoints = GetGet('playerpts',0);
    $Grid = GetGet('game','000000000');
    $Level = GetGet('level','1'); //par défaut, le moteur est "Intermédiaire"
    //------------------------------------------------------------------------------
    function Full3($P1,$P2,$P3) {
    //Indique si 3 cases spécifiées sont occupées par le même signe
    global $Grid;
    return ($Grid[$P1]!='0' && $Grid[$P1]==$Grid[$P2] && $Grid[$P2]==$Grid[$P3]);
    }
    function CheckWin() {
    //0-1-2
    //3-4-5
    //6-7-8
    global $Grid;
    return ( Full3(0,3,6) || Full3(1,4,7) || Full3(2,5,8) || //Verticales
    Full3(0,1,2) || Full3(3,4,5) || Full3(6,7,8) || //Horizontales
    Full3(0,4,8) || Full3(2,4,6) ); //Diagonales
    }
    function EchoTab($Index) {
    global $Grid, $DisallowLinks, $Level, $ServerPoints, $PlayerPoints;
    if (!HasChar($Grid,'0')) {
    echo '<a class=link href="morpion.php?level='.$Level.'&serverpts='.$ServerPoints.'&playerpts='.$PlayerPoints.'">';
    if ($Grid[$Index]=='1')
    echo '<img src="croix.gif" alt="Cliquez pour recommencer">';
    else
    echo '<img src="cercle.gif" alt="Cliquez pour recommencer">';
    echo '</a>';
    } else {
    switch ($Grid[$Index]) {
    case '0':
    $CurGrid = $Grid;
    $CurGrid[$Index] = '1';
    if ($DisallowLinks)
    echo '<img src="blank.gif" border="0">';
    else
    echo '<a href="morpion.php?game='.$CurGrid.'&level='.$Level.'&serverpts='.$ServerPoints.'&playerpts='.$PlayerPoints.'"><img src="blank.gif" border="0"></a>';
    break;
    case '1':
    echo '<img src="croix.gif">';
    break;
    case '2':
    echo '<img src="cercle.gif">';
    break;
    }
    }
    }
    function GetCellColor($Cell,$EchoSth) {
    //0-1-2
    //3-4-5
    //6-7-8
    global $BackGroundColor, $ActiveCellColor, $WinningPosition;
    //Recherche de la condition de coloration
    switch ($Cell) {
    case 0: $CellBG = Full3(0,1,2) || Full3(0,3,6) || Full3(0,4,8); break;
    case 1: $CellBG = Full3(0,1,2) || Full3(1,4,7); break;
    case 2: $CellBG = Full3(0,1,2) || Full3(2,5,8) || Full3(2,4,6); break;
    case 3: $CellBG = Full3(3,4,5) || Full3(0,3,6); break;
    case 4: $CellBG = Full3(3,4,5) || Full3(1,4,7) || Full3(0,4,8) || Full3(2,4,6); break;
    case 5: $CellBG = Full3(3,4,5) || Full3(2,5,8); break;
    case 6: $CellBG = Full3(6,7,8) || Full3(0,3,6) || Full3(2,4,6); break;
    case 7: $CellBG = Full3(6,7,8) || Full3(1,4,7); break;
    case 8: $CellBG = Full3(6,7,8) || Full3(2,5,8) || Full3(0,4,8); break;
    }
    //Application de la couleur
    if ($CellBG) {
    $WinningPosition = $Cell;
    if ($EchoSth)
    echo $ActiveCellColor;
    } else
    if ($EchoSth)
    echo $BackGroundColor;
    }
    //------------------------------------------------------------------------------
    /*
    INFORMATIONS GENERALES
    Joueur '0' = personne
    Joueur '1' = internaute
    Joueur '2' = serveur
    */
    function Computing() {
    global $Grid, $Level;
    $Buffer = $Grid;
    $Choix = -1;
    $Symetrical = (($Level>=2) && ($Grid=='100010002' || $Grid=='200010001' || $Grid=='001010200' || $Grid=='002010100'));
    //Recherche d'une position immédiatement gagnante
    for ($i=0 ; $i<9 ; $i++) {
    $Grid = $Buffer;
    if ($Grid[$i]=='0') {
    $Grid[$i] = '2';
    if (CheckWin()) {
    $Choix = $i;
    break;
    }
    }
    }
    //Recherche d'une position qui contre l'adversaire
    if ($Choix==-1)
    for ($i=0 ; $i<9 ; $i++) {
    $Grid = $Buffer;
    if ($Grid[$i]=='0') {
    $Grid[$i] = '1';
    if (CheckWin()) {
    $Choix = $i;
    break;
    }
    }
    }
    //Recherche d'une position qui dispense 2 positions gagnantes
    if ($Choix==-1 && $Level>=1)
    for ($i=0 ; $i<9 ; $i++) {
    $Grid = $Buffer;
    if ($Grid[$i]=='0') {
    $Grid[$i] = '2';
    $Buffer2 = $Grid;
    $WinCount = 0;
    for ($j=0 ; $j<9 ; $j++) {
    $Grid = $Buffer2;
    if ($Grid[$j]=='0') {
    $Grid[$j] = '2';
    if (CheckWin())
    $WinCount++;
    }
    }
    if ($WinCount>=2) {
    $Choix = $i;
    break;
    }
    }
    }
    $Grid = $Buffer;
    //Recherche d'une position adverse qui force 2 positions gagnantes
    if ($Choix==-1 && $Grid!='100020001' && $Grid!='001020100' && !$Symetrical && $Level>=1)
    for ($i=0 ; $i<9 ; $i++) {
    $Grid = $Buffer;
    if ($Grid[$i]=='0') {
    $Grid[$i] = '1';
    $Buffer2 = $Grid;
    $WinCount = 0;
    for ($j=0 ; $j<9 ; $j++) {
    $Grid = $Buffer2;
    if ($Grid[$j]=='0') {
    $Grid[$j] = '1';
    if (CheckWin())
    $WinCount++;
    }
    }
    if ($WinCount>=2) {
    $Choix = $i;
    break;
    }
    }
    }
    $Grid = $Buffer;
    //Petit remède d'invincibilité complémentaire
    if ($Level>=1)
    $NoCorner = ($Grid=='100020001' || $Grid=='001020100');
    else
    $NoCorner = false;
    //Choix de la case centrale si disponible
    if ($Choix==-1 && $Grid[4]=='0')
    if ($Level>=1 || ($Level==0 && rand(0,5)!=4))
    $Choix = 4;
    //En mode de jeu le plus grand, il est interdit pour l'ordinateur de jouer sur les points cardinaux au second tour (sinon il perd à coup sûr)
    //D'après une situation particulière de symétrie, on exploite cette même interdiction mais pour des raisons différentes
    if (($Choix==-1 && $Level>=2 && $Grid=='000010000') || $Symetrical) {
    $_choice = -1;
    while ($_choice==-1)
    switch(rand(1,4)) {
    case 1: if ($Grid[6]=='0') $_choice=6; break;
    case 2: if ($Grid[8]=='0') $_choice=8; break;
    case 3: if ($Grid[0]=='0') $_choice=0; break;
    case 4: if ($Grid[2]=='0') $_choice=2; break;
    }
    $Choix = $_choice;
    }
    //Choix d'une case au pif...
    if ($Choix==-1) {
    $Case = rand(0,8);
    while ($Grid[$Case]!='0') {
    $Case++;
    if ($Case>8)
    $Case = 0;
    }
    //...on ne doit pas jouer pas au pif dans les coins quand c'est stratégiquement suicidaire
    if ($NoCorner) {
    if ($Case==0 || $Case==2 || $Case==6 || $Case==8)
    $Case++;
    if ($Case>8)
    $Case = 1;
    }
    $Choix = $Case;
    }
    //Restauration des données
    $Grid = $Buffer;
    return $Choix;
    }
    if (($Grid!='000000000' || isset($_GET['serverbegins'])) && !CheckWin() && HasChar($Grid,'0')) {
    $Index = Computing();
    if ($Index!= -1)
    $Grid[$Index]='2';
    else {
    echo '<b>Une erreur fatale est survenue.';
    echo '<br/><br/>Cliquez <a href="morpion.php">ici</a> pour faire une nouvelle partie.';
    return 0;
    }
    }
    //Traitement des points: pour pouvoir transmettre efficacement les scores, il est nécessaire
    //d'appeler 9 fois dans le vide la fonction GetCellColor. Cela permet d'initialiser correctement
    //la variable $WinningPosition et donc de rendre les scores transmissibles via la fonction
    //EchoTbl qui est chargée d'afficher les nouveaux scores.
    for ($i=0 ; $i<9 ; $i++)
    GetCellColor($i,false);
    if ($WinningPosition>=0 && $WinningPosition<9)
    switch ($Grid[$WinningPosition]) {
    case '1': $PlayerPoints++; break;
    case '2': $ServerPoints++; break;
    }
    ?>
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Le jeu du morpion</title>
    <style>
    A.link { color: #8080FF; text-decoration: none }
    A.link:hover { color: blue; text-decoration: underline overline }
    TD.gameboard { border: 2px solid maroon }
    IMG { border: 0 }
    </style>
    </head>
    <body bgcolor="<?php echo $BackGroundColor; ?>">
    <table width="35%" cellspacing="0" border="0" align="center">
    <tr>
    <td colspan="2" height="50px" align="center" style="border: 1px solid #996600">
    <?php
    if ($DisallowLinks=CheckWin())
    echo '<b><font face="Verdana" color="#996600">La partie est terminée !</font></b>';
    else
    if (!HasChar($Grid,'0')) {
    echo '<b><font face="Verdana" color="#996600">Match nul !</font></b>';
    $DisallowLinks=true;
    } else
    echo '&nbsp;';
    ?>
    </td>
    </tr>
    <tr>
    <td valign="center" width="35%" style="border-right: 1px solid navy">
    <font size="4" color="green"><b>Actions :</b></font>
    <br/>&nbsp;
    <?php
    if ($Grid=='000000000')
    echo '<br/><a class=link href="morpion.php?game='.$Grid.'&serverbegins&level='.$Level.'&serverpts='.$ServerPoints.'&playerpts='.$PlayerPoints.'">Laisser la main</a>';
    else
    echo '<br/>&nbsp;';
    ?>
    <?php
    if ($ServerPoints!=0 || $PlayerPoints!=0)
    echo '<br/><a class=link href="morpion.php?game=000000000&level='.$Level.'">RAZ</a>';
    else
    echo '<br/>&nbsp;';
    ?>
    <br /><a class=link href="morpion.php?level=<?php echo $Level.'&serverpts='.$ServerPoints.'&playerpts='.$PlayerPoints; ?>">Recommencer</a>
    </td>
    <td rowspan="2">
    <br />&nbsp;
    <table width="156" border="3" cellspacing="3" align="center" style="border: none">
    <tr>
    <td bgcolor="<?php GetCellColor(0,true); ?>" class=gameboard style="border-top:none; border-left:none"><?php EchoTab(0); ?></td>
    <td bgcolor="<?php GetCellColor(1,true); ?>" class=gameboard style="border-top:none"><?php EchoTab(1); ?></td>
    <td bgcolor="<?php GetCellColor(2,true); ?>" class=gameboard style="border-top:none; border-right:none"><?php EchoTab(2); ?></td>
    </tr>
    <tr>
    <td bgcolor="<?php GetCellColor(3,true); ?>" class=gameboard style="border-left:none"><?php EchoTab(3); ?></td>
    <td bgcolor="<?php GetCellColor(4,true); ?>" class=gameboard><?php EchoTab(4); ?></td>
    <td bgcolor="<?php GetCellColor(5,true); ?>" class=gameboard style="border-right:none"><?php EchoTab(5); ?></td>
    </tr>
    <tr>
    <td bgcolor="<?php GetCellColor(6,true); ?>" class=gameboard style="border-bottom:none; border-left:none"><?php EchoTab(6); ?></td>
    <td bgcolor="<?php GetCellColor(7,true); ?>" class=gameboard style="border-bottom:none"><?php EchoTab(7); ?></td>
    <td bgcolor="<?php GetCellColor(8,true); ?>" class=gameboard style="border-bottom:none; border-right:none"><?php EchoTab(8); ?></td>
    </tr>
    </table>
    <br />&nbsp;
    </td>
    </tr>
    <tr>
    <td valign="center" width="35%" style="border-right: 1px solid navy; border-top: 1px solid navy">
    <font size="4" color="green"><b>Options:</b></font>
    <br />&nbsp;
    <?php
    function EchoLevelList($Lvl,$Caption) {
    global $Grid, $Level, $ServerPoints, $PlayerPoints;
    echo '<br/>';
    if ($Level==$Lvl)
    echo '<img src="tic.gif" align="absmiddle">&nbsp;';
    if ($Grid=='000000000')
    echo '<a class=link href="morpion.php?game='.$Grid.'&level='.$Lvl.'&serverpts='.$ServerPoints.'&playerpts='.$PlayerPoints.'">'.$Caption.'</a>';
    else
    echo $Caption;
    }
    EchoLevelList(0,'Faible');
    EchoLevelList(1,'Intermédiaire');
    EchoLevelList(2,'Invincible');
    ?>
    </td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <font size="2" color="navy">Serveur : <?php echo $ServerPoints; ?>&nbsp;&nbsp;&nbsp;<b>..::..</b>&nbsp;&nbsp;&nbsp;Joueur : <?php echo $PlayerPoints; ?></font>
    </td>
    </tr>
    <tr>
    <td colspan="2" align="center" style="border: 2px solid #996600">
    <font size="2" color="maroon">Jeu du morpion <b>©</b> septembre 2005</font>
    </td>
    </tr>
    </table>
    </body>
    </html>