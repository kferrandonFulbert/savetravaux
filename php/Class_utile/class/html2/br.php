<?php

/**
 * Description of br
 *
 * @author kferrandon
 */
class br extends baliseHTML{

    public function __construct() {
        parent::__construct('', 'br');
        $this->codeHTML = '<'.$this->balise.' />';
    }

}

?>
