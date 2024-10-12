<?php


/**
 * Description of doctype
 *
 * @author kferrandon
 */
class doctype {
   public static $doctypeXHTML401Strict = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">';
   public static $doctypeXHTML401Transitional = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
   public static $doctypeXHTML401Frameset = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">';
   public static $doctypeXHTML10Strict = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
   public static $doctypeXHTML10Transitional = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
   public static $doctypeXHTML10Frameset = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">' ;
   public static $doctypeXHTML11DTD = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
   public static $doctypeXHTMLBasic11 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">';
   public static $doctypeHTML5 = '<!DOCTYPE HTML>';
   protected $doctype;
   
   public function __construct($doctype='') {
   if ($doctype==self::$doctypeHTML5 || $doctype==self::$doctypeXHTML10Frameset || 
           $doctype==self::$doctypeXHTML10Strict || $doctype==self::$doctypeXHTML10Transitional || $doctype==self::$doctypeXHTML11DTD
           || $doctype==self::$doctypeXHTML401Frameset || $doctype==self::$doctypeXHTML401Strict || $doctype==self::$doctypeXHTML401Transitional
           || $doctype==self::$doctypeXHTMLBasic11
       ){ $this->doctype = $doctype; }
       else{ $this->doctype = self::$doctypeHTML5; }
   }
   public function affiche(){
       return $this->doctype;
   }
}

?>
