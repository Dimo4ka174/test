<?php
/*Создать класс по паттерну синголтон*/
class Layout
{
    //1 шаг убераем возможность создать экземпляр
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
    //2 шаг делаем возможность взаимодействия через единсвенно открытый метод
    public static function getInstance() : Layout{    
        if(self::$_instance == null)
            self::$_instance = new self();
            
        return self::$_instance;
    }
    protected static $_instance;//наш экземпляр класса
    //3 шаг делаем логику, метод должен принимать путь к файлу относительно папки
    private $mappingJsCss = [
        'js' => [],
        'css' => []
    ]
    function include_static($path){
        $file_info = new SplFileInfo($path);//закидываем путь в SplFileInfo
        if($file_info->getExtension() == "js") //проверяем расширение
            $this->static["js"][] = $path;
        else if($file_info->getExtension() == "js")
            $this->static["css"][] = $path;
    }
    //подключаем
    include '..\static\css\'' . '';
    private $path;
    public function getPath(){
        return $this->path;
    }
    public function setPath($path){
        $this->path = $path;
    }
}
?>