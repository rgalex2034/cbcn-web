<?php

namespace PauSabe\CBCN\utils;

class Config{

    private static $loaded_configs;

    private $file;
    private $conf;
    private $has_sections;

    public function __construct($filename){
        $this->file = $filename;
    }

    public static function getDefaultConfig(){
        return self::getConfig(CBCN_CORE_ROOT."/config.ini");
    }

    /**
     * Return a config for a file.
     * If was previously loaded, return the same instance.
     * @param string $filename - Path file to load as config.
     * @return Config - Config object loaded from the file.
     */
    public static function getConfig($filename){
        //Initate loaded configs as array if does not exists.
        if(!isset(self::$loaded_configs)) self::$loaded_configs = array();
        //Return loaded config if was previously saved on the array.
        if(isset(self::$loaded_configs[$filename])) return self::$loaded_configs[$filename];
        //Load config, save and return config.
        $config = new Config($filename);
        $config->load();
        self::$loaded_configs[$filename] = $config;
        return $config;
    }

    /**
     * Load config file.
     * @param boolean $parse_sections - Default true
     */
    public function load($parse_sections = true){
        //If no filename, throw exception
        if(empty($this->file) || !is_file($this->file)) throw new \Exception("Error: Config file does not exists: {$this->file}");
        $data = parse_ini_file($this->file, $parse_sections);
        //Throw exception if error on reading file
        if($data === false){
            $error = error_get_last();
            throw new \Exception("Error: Unable to load config file - ".$error["message"]);
        }
        //Save config
        $this->conf = $data;
        $this->has_sections = $parse_sections;
    }

    /**
     * Get the value of a config file
     * @param string $param - Config value to grab
     * @param string $section - Section where the value is
     * @return mixed - Any value stored in the config file
     */
    public function getValue($param, $section = null){
        //Throw exception if no section specified when it has loaded sections.
        if($this->has_sections && $section === null) throw new \Exception("Error: No config section determined");
        //Return value, null if does not exists.
        if($this->has_sections){
            return isset($this->conf[$section][$param]) ? $this->conf[$section][$param] : null;
        }else{
            return isset($this->conf[$param]) ? $this->conf[$param] : null;
        }
    }

}
