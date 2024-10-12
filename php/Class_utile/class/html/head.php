<?php

/**
 * Description of head
 *
 * @author kferrandon
 */
class head {
    protected $codeHtml;
    
    public function __construct($defaut=false) {
        $this->codeHtml = '<head>';
        if($defaut){
            $this->titre('Titre document');
            $this->meta('description', 'description par defaut');
            $this->meta('author', 'Kevin FERRANDON');
            //$this->meta('keyword', '');
            $this->meta('keyword', '');
            $this->link('stylesheet', 'text/css', '././css/style.css');
        }
    }
    public function init(){
        $this->codeHtml ='';
    }
    public function titre($titre=''){
        $htitre = new headerTitle($titre);
        $this->codeHtml.=$htitre->affiche();
        return $htitre->affiche();
    }
    public function meta($nom,$contenu){
        $meta = new meta($nom, $contenu);
        $this->codeHtml.=$meta->affiche();
        return $meta->affiche();
    }
    public function link($rel='', $type='', $href=''){
        $lien = new headerLink($rel, $type, $href);
        $this->codeHtml.=$lien->affiche();
        return $lien->affiche();
    }
    public function affiche(){
        return $this->codeHtml.'</head><body>';
    }
    
}

?>
