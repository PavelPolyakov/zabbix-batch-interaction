<?php

class Config {

    const CONFIG_BASENAME = '.config';
    
    public static function set($key, $value) {
        if(file_exists(self::CONFIG_BASENAME)) {
            $config = json_decode(file_get_contents(self::CONFIG_BASENAME), true);
        } else {
            $config = [];
        }
        
        $config[$key] = $value;
        
        file_put_contents('.config', json_encode($config, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        
        return true;
    }
    
    public static function get($key) {
        $config = json_decode(file_get_contents(self::CONFIG_BASENAME), true);
        
        if(isset($config[$key])) {
            return $config[$key];
        } else {
            return null;
        }
    }
    
    public static function getAll() {
        if(is_file(self::CONFIG_BASENAME)) {
            $config = json_decode(file_get_contents(self::CONFIG_BASENAME), true);
            
            return $config;
        } else {
            return [];
        }
    }
    
    public static function setMap($map) {
        foreach($map as $key => $value) {
            self::set($key, $value);
        }
        
        return true;
    }

}
