<?php 
include 'objet/ChargeObjet.php'; 

?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf8" />
        <title>POO - a fond</title>
        
    </head>
    <body>
        <h1>2012 la fin du monde...</h1>
        <span class="intro">
        Les astèques l'avaient prédit, les scenariste en avaient fait des films et tous cela est arrivé.<br />
        Tout le monde à peur et se réfugis dans des villes fortifiées on se croirait retourné au moyenne age.<br />
        Enfin c'est la vie...<br />
        Alors Comme ca tu veux t'engager pour lutter contre ces ordes de sauvage qui pie le peu qui reste sur cette terre<br />
        Si tu veux mon conseil tu devrais filler d'ici car si tu rencontre une de ces bande il te lapiderons sans hésiter. <br />
        Choisi bien ton camps...<br />
        </span>
        <br /><br />
        <form action="histoire/creerperso.php" method="post" >
            Camp: <select name="camp" >
                <optgroup label="les defenseurs / justiciers">les defenseurs / justiciers</optgroup>
                <option alt="La ligue est un regroupement d'individus combattant la misère comme ils le peuvent" value="Ligue">La ligue</option>
                <option title="Les chevaliers pronnent a l'ancien code et a la justice ">Les Chevaliers</option>
                <option title="La police est présente dans certaine ville est dépende non plus de l'état mais des maires des cités">Police</option>
                <optgroup label="les pirates et autres briguants">les pirates et autres briguants</optgroup>
                <option title="La horde est une bande de biker sanguinaire" value="Horde">La horde</option>
                <option title="Anéantisse le peu qu'il reste de l'humanité et prossède à des sacrifice">Les Astèques</option>
                <option title="Groupe Anarchiste ne souhaitant plus l'oppression de gouvernemant">La chutte</option>
                
            </select><br />
            Nom <input type="text" name="Nom" /><br />
            <input type="text" name="Age" /><br />
            Age <input type="submit" value="OK" /><br />
        </form>
            
        <?php
        $hero = new Personnage();
        $hero->init(12,24, 12, 10, "Kevin", 100, "elfe");
         echo 'Bonjour '.$hero->getNom().' tu as '.$hero->getAge(). ' ans <br />';
        ?>
        
    </body>
</html>