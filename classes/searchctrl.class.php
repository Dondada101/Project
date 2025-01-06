<?php

class Searchctrl extends Search{
  private $model;
    public function __construct($model)
    {
        $this->model=$model;
    }
    public function search($search){
        
       return $this->model->getSearch($search); 
        
    }
    private function emptysu( ){
        $result=false;
        if(empty($this->search)){
            $result=false;
        }
        else{
            $result= true;
        }
        return $result;
        
    }
}