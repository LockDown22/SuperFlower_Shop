<?php
    class Load{

        public function __construct()
        {
            
        }
        public function view($fileName, $data=NULL){
            //neu k chay thi thu isset
            if($data==true){
                extract($data);
            }
           include 'app/views/'.$fileName.'.php';
        }
        public function model($fileName){
             include 'app/models/'.$fileName.'.php';
            return new $fileName();
         }
    
    }
    



    ?>