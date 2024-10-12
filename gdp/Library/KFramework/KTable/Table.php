<?php
/**
 * Description of Table
 *
 * @author kevin
 */
class Table {
    protected $title;
    protected $contenuHTML;
    protected $classDIV;
    protected $classTable;
    private $contenuTable;
    private $contenuTitle;
        public function __construct() {
        $this->title = '';
        $this->contenuHTML = '';
        $this->classDIV = '';
        $this->classHTML = '';
        $this->contenuTable = '';
    }
    function title($titre=''){
        if(!empty($titre)){$this->title = $titre;$this->contenuTitle="<caption>$this->title</caption>";}
        else{return $this->title;}
    }
    function addClassDiv($class){
        $this->classDIV .= "$class ";
    }
    function addClassTable($class){
        $this->classHTML .= "$class ";
    }
    function addContenuTable($contenu){
      $this->contenuTable .= $contenu;
    }
    function versExcel($filename){
    header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Pragma: public");
    }
    
    function affiche(){
        $this->contenuHTML .= "<div class='$this->classDIV' >";
        $this->contenuHTML .= "<table class='$this->classTable'>";
        if(!empty($this->title)){$this->contenuHTML .= $this->contenuTitle;} 
        $this->contenuHTML .= $this->contenuTable;
        $this->contenuHTML .= "</table></div>";
        echo $this->contenuHTML;
    }
    
}
?>
