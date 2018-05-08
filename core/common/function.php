<?php

function p($var)
{
    if (is_bool($var)){
        var_dump($var);
    }else if (is_null($var)) {
        var_dump(NULL);
    }else{
        echo print_r($var,true)."\n";
    }
}

function post($name, $default=false, $fitt=false)
{
    if(isset($_POST[$name])){
        if($fitt){
            switch ($fitt) {
                case 'int':
                    if(is_numeric($_POST[$name])){
                        return $_POST[$name];
                    }else{
                        return $default;
                    }                    
                break;                
                default: ;
            }
        }else{
            return $_POST[$name];
        }
    }else{
        return $default;
    }

}

function get($name, $default=false, $fitt=false)
{
    if(isset($_GET[$name])){
        if($fitt){
            switch ($fitt) {
                case 'int':
                    if(is_numeric($_GET[$name])){
                        return $_GET[$name];
                    }else{
                        return $default;
                    }                    
                break;                
                default: ;
            }
        }else{
            return $_GET[$name];
        }
    }else{
        return $default;
    }

}


function jump($url)
{
    header('Location:'.$url);
    exit();

}