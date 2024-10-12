<?php
/**
 * Description of Table_abstract
 *
 * @author kevin
 */
abstract class Table_abstract {
    protected $title;
    protected $contenuHTML;
    protected $class;
    public function __construct() {
      //  $this->contenuHTML = '<div class="table"> ';
    }
    abstract protected function title($titre='');
    abstract protected function addClassDiv($class);
    abstract protected function addClassTable($class);
    abstract protected function addContenuTable($contenu);
    abstract protected function affiche();
    abstract protected function versExcel();
}
?>
