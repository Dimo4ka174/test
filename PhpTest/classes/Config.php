<?php
class Config{
    protected $src = "configs/";
    protected $cahe_settings;
    protected $configs = [];

    public function get_config($name, $key = " "){
        if(empty($this->configs)){
            $this->configs = include_once $this->src.$name;
            $this->cahe_settings = $name;
        }
        if($this->cahe_settings == $name){
            if($key != " "){
                return $this->configs[$key];
            }
            return $this->configs;
        }
        else{
            $this->configs = include_once $this->src.$name;
            $this->cahe_settings = $name;

            if($key != " "){
                return $this->configs[$key];
            }
            return $this->configs;
        }
    }
}
?>