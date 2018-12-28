<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
class Questions extends FirebaseModel
{
   private $data;  
   public function __construct($character)
   {
      $this->data = parent::getObject('ques_ans/'.$character);     
   }
   
   /*
   To get data object
   */
   public function data(){
        return $this->data;
   }

}
