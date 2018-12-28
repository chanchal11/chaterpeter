<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
class Question extends FirebaseModel
{
   private $data;  
   public function __construct($character,$questionid)
   {
      $this->data = parent::getObject('ques_ans/'.$character .'/'.$questionid);     
   }
   
   /*
   To get data object
   */
   public function data(){
        return $this->data;
   }


   public function dataByLang($lang){
        return $this->data[$lang];
    }

}
