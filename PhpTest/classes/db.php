<?php
/*Создать класс по паттерну синголтон*/
class DB
{
    //1 шаг убераем возможность создать экземпляр
    private function __construct(){
        $this->connect();//connect должен инициировать подключение к БД по PDO.
    }
    private function __clone(){}
    private function __wakeup(){}

    //2 шаг делаем возможность взаимодействия через единсвенно открытый метод
    protected static $_instance;//наш экземпляр класса
    public static function get_instance() : Layout{    
        if(self::$_instance == null)
            self::$_instance = new self();
            
        return self::$_instance;
    }   
    
    //3 Прописываем поля для класса    
    protected $connection; //Соединение с БД
    protected $db_name;

    //4 Соединение БД по PDO, формирования пути (Бережно взято у Артура Шакирова)
    protected function connect()
    {
        $config = new Config();
        $bd_info = $config->get_config("bdConfig.php");
        $this->db_name = $bd_info['db'];

        $connectStr = $this->make_connection_string($bd_info);

        $this->connection = new PDO($connectStr, $bd_info['username'], $bd_info['password']);
    }
    protected function make_connection_string(Array $bdConfig)
    {
        if(array_key_exists('host', $bdConfig) && 
        array_key_exists('db', $bdConfig) && 
        array_key_exists('charset', $bdConfig))
        {
            return "mysql:
                host={$bdConfig['host']};
                dbname={$bdConfig['db']};
                charset={$bdConfig['charset']};";
        }
        else{
            die("Отсутсвует ключ в конфиге для создания DSN");
        }
        
    }

    //5 Создание таблиц в БД
    protected const TYPE_INT = "INT";
    protected const TYPE_VARCHAR = "VARCHAR(255)";
    protected const TYPE_BOOLEAN = "BOOLEAN";
    protected const TYPE_NULL = "NULL";
    protected const TYPE_NOT_NULL = "NOT NULL";
    protected const TYPE_PRIMARY_KEY = "PRIMARY KEY";
    protected const TYPE_AUTO_INCREMENT = "AUTO_INCREMENT";
}
?>