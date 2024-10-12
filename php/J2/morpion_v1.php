<?php

//======================================= http://altert.family.free.fr/ ========

/*=============================
   INFORMATIONS GENERALES

  Joueur '0' = personne
  Joueur '1' = internaute
  Joueur '2' = serveur

=============================*/

  function GetGet($Value) {
    if (isset($_GET[$Value]))
      return $_GET[$Value];
    else
      return '';
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

  $DisallowLinks = false;
  $Grid = GetGet('game');
  if ($Grid=='')
    $Grid = '000000000';
  $Level = GetGet('level');
  if ($Level=='')
    $Level = '1'; //par défaut, le moteur est Intermédiaire

  function CheckWin() {
  //0-1-2
  //3-4-5
  //6-7-8
    global $Grid;
    return (    //Verticales
             ($Grid[0]!='0' && $Grid[0]==$Grid[3] && $Grid[3]==$Grid[6]) ||
             ($Grid[1]!='0' && $Grid[1]==$Grid[4] && $Grid[4]==$Grid[7]) ||
             ($Grid[2]!='0' && $Grid[2]==$Grid[5] && $Grid[5]==$Grid[8]) ||
                //Horizontales
             ($Grid[0]!='0' && $Grid[0]==$Grid[1] && $Grid[1]==$Grid[2]) ||
             ($Grid[3]!='0' && $Grid[3]==$Grid[4] && $Grid[4]==$Grid[5]) ||
             ($Grid[6]!='0' && $Grid[6]==$Grid[7] && $Grid[7]==$Grid[8]) ||
                //Diagonales
             ($Grid[0]!='0' && $Grid[0]==$Grid[4] && $Grid[4]==$Grid[8]) ||
             ($Grid[2]!='0' && $Grid[2]==$Grid[4] && $Grid[4]==$Grid[6])
           );
  }

  function EchoTab($Index) {
    global $Grid, $DisallowLinks, $Level;
    switch ($Grid[$Index]) {
      case '0':
          $CurGrid = $Grid;
          $CurGrid[$Index] = '1';
          if ($DisallowLinks)
            echo '<img src="blank.gif" border="0">';
          else
            echo '<a href="morpion_v1.php?game='.$CurGrid.'&level='.$Level.'"><img src="blank.gif" border="0"></a>';
        break;
      case '1':
          echo '<img src="croix.gif">';
        break;
      case '2':
          echo '<img src="cercle.gif">';
        break;
    }
  }

//------------------------------------------------------------------------------

  function Computing() {
    global $Grid, $Level;
    $Buffer = $Grid;
    $Choix = -1;

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
      if ($Choix==-1 && $Grid!='100020001' && $Grid!='001020100' && $Level>=1)
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
      if ($Choix==-1 && $Level>=2 && $Grid=='000010000') {
        switch(rand(1,4)) {
          case 1: $Choix=6; break;
          case 2: $Choix=8; break;
          case 3: $Choix=0; break;
          case 4: $Choix=2; break;
        }
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
      echo '<br><br>Cliquez <a href="morpion_v1.php">ici</a> pour faire une nouvelle partie.';
      return 0;
    }
  }
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Le jeu du morpion</title>
  <style>
    A.link		{ color: #8080FF; text-decoration: none }
    A.link:hover	{ color: blue; text-decoration: underline overline }
    TD.gameboard	{ border: 2px solid maroon }
  </style>
</head>
<body bgcolor="#F8F8F8">
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
        <br>&nbsp;
        <?php
          if ($Grid=='000000000')
            echo '<br><a class=link href="morpion_v1.php?game='.$Grid.'&serverbegins&level='.$Level.'">Laisser la main</a>';
          else
            echo '<br>&nbsp;';
        ?>
        <br><a class=link href="morpion_v1.php?level=<?php echo $Level; ?>">Recommencer</a>
      </td>

      <td rowspan="2">
        <br>&nbsp;
        <table width="156" border="3" cellspacing="3" align="center" style="border: none">
          <tr>
            <td class=gameboard style="border-top:none; border-left:none"><?php EchoTab(0); ?></td>
            <td class=gameboard style="border-top:none"><?php EchoTab(1); ?></td>
            <td class=gameboard style="border-top:none; border-right:none"><?php EchoTab(2); ?></td>
          </tr>
          <tr>
            <td class=gameboard style="border-left:none"><?php EchoTab(3); ?></td>
            <td class=gameboard><?php EchoTab(4); ?></td>
            <td class=gameboard style="border-right:none"><?php EchoTab(5); ?></td>
          </tr>
          <tr>
            <td class=gameboard style="border-bottom:none; border-left:none"><?php EchoTab(6); ?></td>
            <td class=gameboard style="border-bottom:none"><?php EchoTab(7); ?></td>
            <td class=gameboard style="border-bottom:none; border-right:none"><?php EchoTab(8); ?></td>
          </tr>
        </table>
        <br>&nbsp;
      </td>
    </tr>

    <tr> 
      <td valign="center" width="35%" style="border-right: 1px solid navy; border-top: 1px solid navy">
        <font size="4" color="green"><b>Options:</b></font>
        <br>&nbsp;
        <?php
          function EchoLevelList($Lvl,$Caption) {
            global $Grid, $Level;
            echo '<br>';
            if ($Level==$Lvl)
              echo '<img src="tic.gif" align="absmiddle">&nbsp;';
            if ($Grid=='000000000')
              echo '<a class=link href="morpion_v1.php?game='.$Grid.'&level='.$Lvl.'">'.$Caption.'</a>';
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
      <td colspan="2" align="center" style="border: 2px solid #996600">
        <font size="2" color="maroon">Jeu du morpion <b>©</b> septembre 2005</font>
      </td>
    </tr>
  </table>
</body>
</html>