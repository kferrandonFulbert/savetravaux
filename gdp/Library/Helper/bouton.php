<?php
/**
 * Description of elementHTML
 *
 * @author Kevin FERRANDON
 */
require_once 'bouton_abstract.php';
class Bouton extends Bouton_abstract{
 /*   protected $type;
    protected $classCss;
    protected $libelle;
*/
    protected $tabAction = array();
    /**
     * @author Kevin FERRANDON
     * @param string $argType
     * @param string $argClassCss
     * @param string $argLibelle
     */
    public function __construct($argType, $argClassCss=null, $argLibelle=null){
        parent::__construct($argType, $argClassCss, $argLibelle);
       
    }
    /**
     *
     * @return string 
     */
    public function Affiche(){
        $action="";
        if(isset($this->tabAction)){
            foreach($this->tabAction as $clef => $valeur){
             $action .= $clef."='$valeur'";
            }
        }
        $retour = "<button ".$action." type='$this->type' class='$this->classCss'><span><span><span>$this->libelle</span></span></span></button>";
        return $retour;
    }
    /**
     *
     * @param mixed $action
     * @param mixed $valeur
     */
    public function AjoutAction($action, $valeur){
        $this->tabAction[$action] = $valeur;  
        //array($action=>$valeur);
    }
}

?>