<?php
/*Создать класс по паттерну синголтон*/
class Layout
{
    //1 шаг убераем возможность создать экземпляр
    private function __construct(){
        //При создании задается шрифт
        $this->link_font();
        $this->include_static("css/bootstrap.css"); 
    }
    private function __clone(){}
    private function __wakeup(){}

    //2 шаг делаем возможность взаимодействия через единсвенно открытый метод
    public static function get_instance() : Layout{    
        if(self::$_instance == null)
            self::$_instance = new self();
            
        return self::$_instance;
    }
    protected static $_instance;//наш экземпляр класса

    //3 шаг делаем логику, метод должен принимать путь к файлу относительно папки
    private $mappingStatic = [
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

    public function link_styles(){
        $this->static["style"] = array_unique($this->static["style"]);
        //перед подключением проверим существует ли
        foreach($this->static["style"] as $style){
            if(file_exists("static/{$style}")){
                echo "<link rel='stylesheet' href='static/{$style}'>";
            }
        }
    }
    public function link_scripts(){
        $this->static["script"] = array_unique($this->static["script"]);
        //перед подключением проверим существует ли
        foreach($this->static["script"] as $script){
            if(file_exists("static/{$script}")){
                echo "<script src='static/{$script}'></script>";
            }
        }
    }

    //4 Подключаем шрифт
    protected function link_font(){
        $config = new Config();
        $font_name = $config->get_config("layout.php", "font");        
        $full_name_font = str_replace(" ", "+", $font_name);

        $font_link = "<link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family={$full_name_font}:wght@100;300&display=swap' rel='stylesheet'>
        <style>:root{font-family: '{$font_name}', sans-serif;}</style>";
        
        echo $font_link;

    }
}
?>
