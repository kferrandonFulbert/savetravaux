<?php
 
/***
 * Class de gestion des accès à une base de données mysql
 * @author: Kevin FERRANDON
 */

abstract class BD_abstract{
    protected $connexion;
    protected $erreur=0;

    //abstract protected function BD($login, $mdp, $base, $serveur);
    abstract protected function message($message);
    abstract protected function execRequete($requete);
    abstract protected function objetSuivant($resultat);
    abstract protected function ligneSuivante($resultat);
    abstract protected function enErreur();
    abstract protected function quitter();
}