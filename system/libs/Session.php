<?php
class Session{

    public function init(){
        session_start();
    }

    public static function set($key,$val){
        $_SESSION[$key] = $val;

    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }

    }
    public static function checkSession(){
        self::init();
        if(self::get('login')==false){
            self::destroy();
            header("Location:".BASE_URL."login");
        }else{
           
        }
    }

    public function destroy(){
        session_destroy();
    }
    
    public function unset($key){
        session_unset($key);
    }
}
?>