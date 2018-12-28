<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
class Characters extends FirebaseModel
{
   private $data;  
   public function __construct(){
        $this->data = parent::getObject('characters');     
   }
   
   /*
   To get data object
   */
   public function data(){
        return $this->data;
   }
   /*
   returns number of elements in array 'data'
   */
   public function count(){
        return count($this->data);
   }
}
