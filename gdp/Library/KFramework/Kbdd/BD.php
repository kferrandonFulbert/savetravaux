<?php
/***
 * Class de gestion des accès à une base de données mysql
 * @author: Kevin FERRANDON
 * @description : Gestion de la base de données
 */
include('BD_abstract.php');

class BD extends BD_abstract{
    protected $connexion, $erreur=0;

    function BD($login, $mdp, $base, $serveur){
        // Connexion au serveur
        
        $this->connexion = @mysql_connect($serveur, $login, $mdp);
        if(!$this->connexion) $this->message("Connexion au serveur $serveur impossible \n");

        // connexion a la base
        if(!@mysql_select_db($base, $this->connexion)){
            $this->message('Désolé accès a la base impossible.\n');
            $this->message('<b>Erreur Mysql : </b>'.mysql_error($this->connexion));
            $this->erreur=1;
        }
    }
    function message($message){
        echo $message;
    }
    function execRequete($requete){
        $resultat = mysql_query($requete, $this->connexion);
        if(!$resultat){
            $this->message("Problème d' execution de la requete $requete");
            $this->message('<b>Erreur Mysql : </b>'.mysql_error($this->connexion));
            $this->erreur = 1;
        }
        return $resultat;
    }
    function objetSuivant($resultat){ return mysql_fetch_object($resultat); }
    function ligneSuivante($resultat){ return $resultat; }
    function enErreur(){ return $this->erreur; }
    function quitter(){ @mysql_close($this->connexion); }
}

?>
