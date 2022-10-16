<?php

function autocargar($classname){
	include 'controlador/' . $classname . '.php';
}

spl_autoload_register('autocargar');

?>