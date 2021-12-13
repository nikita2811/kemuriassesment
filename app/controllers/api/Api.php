<?php




Class User extends Controller {
  public function __construct() {
        $this->view('header');
        
  }	

  public function index() {
    $data =[ 'title' => "MVC framewaork"];
    $this->view('index',$data);

  }
