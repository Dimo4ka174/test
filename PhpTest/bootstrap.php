<?php
//Подключение файла без его объявления в файле
function spl_autoload_register($class){
    require_once mb_strtolower('classes' . $class . '.php'); 
}

Layout::getInstance();

$obj1 = new Layout();
$obj2 = new Layout();
echo $obj1 === $obj2;
?>