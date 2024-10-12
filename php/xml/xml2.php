<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of xml2
 *
 * @author kevin
 */
class xml2 {


/*
 *  This code is in the public domain.  There is no license and it
 *  is free for anyone to use.
 *
 *  nodes variable will contain a node for EACH xml tag within the
 *  document.  Each node is capable of having child nodes.
 *
 *  Data access routines are missing for an easy way to retreive
 *  the data.
 *
 *  The "friendly" option does not currently work.  Friendly would
 *  be an create the tree with tag names as variable names.
 *
 *  data is stored as:
 *
 *  $xml = new XML()
 *  $xml->parse($xmldata);
 *
 *  foreach ($xml->root->children as $child)
 *  {
 *    echo $child->name . ": " . $child->cdata . "\n";
 *  }
 *
 */


  var $parser;
  var $root;
  var $nodes = array();
  var $curnode;
  var $whitespace = 0;
  var $nodecount;
  var $friendly = 0;

  function XML() {
    $this->parser = xml_parser_create();
    $this->nodes[0] = new NODE;
    $this->nodes[0]->parent = "";
    $this->nodes[0]->name = "root";
    $this->nodes[0]->data = "";
    $this->nodes[0]->attributes = "";
    $this->root = &$this->nodes[0];
    $this->curnode = &$this->nodes[0];
    xml_set_object($this->parser, &$this);
    xml_set_element_handler($this->parser, "startTag", "endTag");
    xml_set_character_data_handler($this->parser, "charData");
  }

  function parse($data) {
    xml_parse($this->parser, $data);
  }

  function startTag($parser, $tag, $attrs)
  {
    $nextnode = $this->nodecount++;
    $this->nodes[$nextnode] = new NODE;
    if ($this->friendly)
      $this->curnode->{$this->nodes[$nextnode]->name}[count($this->curnode->{$this->nodes[$nextnode]->name})] = &$this->nodes[$nextnode];
    else
      $this->curnode->children[count($this->curnode->children)] = &$this->nodes[$nextnode];
    $this->nodes[$nextnode]->parent = &$this->curnode;
    $this->curnode = &$this->nodes[$nextnode];
    $this->curnode->attributes = $attrs;
    $this->curnode->name = strtolower($tag);
  }

  function charData($parser, $cdata)
  {
    if ((!$whitespace) && ereg("^[ \n\t]+$", $cdata, $regs))
      return;
    $this->curnode->cdata = $cdata;
  }

  function endTag($parser, $tag)
  {
    $this->curnode = &$this->curnode->parent;
  }
}


class NODE
{
	var $parent;
	var $name;
	var $attributes;
	var $cdata;
	var $children;
}



?>
