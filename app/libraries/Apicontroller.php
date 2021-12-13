<?php

  Class ApiController{    
   public function __construct(){
    header('access-Control-Allow-Origin: *');

    header("access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-   Allow-Headers, Authorization, X-Requested-With");
      } 

      public function model($model)
      {
        
          require_once '../app/models/'.$model.'.php';

        
          return new $model();
      }

      public function view($view, $data=[])
      {
        
          if(file_exists('../app/views/'.$view.'.php')){
              require_once '../app/views/'.$view.'.php';
          }else{
              die('view does not exist');
          }
      }


      public  function renderFullError($message, $errorStatusCode = null){
      
      if (is_numeric($errorStatusCode)) {
      http_response_code($errorStatusCode);return $message;
      return json_encode(['error' => ['code' => $errorStatusCode, 'message' => $message]]);}
      }


      public function success($message, $errorStatusCode = 200){
      
      if (is_numeric($errorStatusCode)) {
      http_response_code($errorStatusCode);
     
      }
      return json_encode(['success' => ['code' => $errorStatusCode, 'message' => $message]]);
      
     }
}
     