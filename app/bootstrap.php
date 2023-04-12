<?php

  require_once 'config/config.php';
  
  require_once 'helpers/addClassHelper.php';
  require_once 'helpers/urlHelper.php';

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });

?>