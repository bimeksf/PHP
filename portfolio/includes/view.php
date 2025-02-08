<?php 

declare(strict_types=1);

function renderview($template, $data=[]){

  include TEMPLATE_DIR . '/header.php' ;
  include TEMPLATE_DIR . $template . '.php' ;

  

  }