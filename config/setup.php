<?php

require('smarty/libs/Smarty.class.php');

class objeto_smarty extends Smarty {

   function __construct(){

        parent::__construct();

        $this->setTemplateDir('smarty/templates/');
        $this->setCompileDir('smarty/templates_c/');
        $this->setConfigDir('smarty/configs/');
        $this->setCacheDir('smarty/cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
   }

}

?>
