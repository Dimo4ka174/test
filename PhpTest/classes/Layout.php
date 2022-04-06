<?php
/*Создать класс по паттерну синголтон*/
class Layout
{
    //1 шаг убераем возможность создать экземпляр
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
    //2 шаг делаем возможность взаимодействия через static
    public static function getObjClass(){    
        if(self::$object == null)
            self::$object = new self();
            
        return self::$object;
    }
    private static $object;
    //3 шаг делаем логику, метод должен принимать путь к файлу относительно папки
    private $path;
    public function getPath(){
        return $this->path;
    }
    public function setPath($path){
        $this->path = $path;
    }
}
?>