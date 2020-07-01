<?php
    require_once('core/core.php');

    $class = isset($_REQUEST['class'])? $_REQUEST['class']: 'Products';
    $view = isset($_REQUEST['view'])? $_REQUEST['view']: 'index';

    $class= $class.'Controller';

    require_once('controllers/'.$class.'.php');

    $object = new $class();
    $object->$view();
?>