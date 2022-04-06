<?php
//Подключение файла без его объявления в файле
function spl_autoload_register($class){
    require_once 'classes' . $class . '.php'; 
}

$obj1 = new Layout();
$obj2 = new Layout();
echo $obj1 === $obj2;
?>