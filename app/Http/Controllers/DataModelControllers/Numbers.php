<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
class Numbers extends FirebaseModel
{
   private $username,$character,$lang,$count,$type;  
   public function __construct($username,$character,$lang,$type)
   {
       $this->username = $username;
       $this->character = $character;
       $this->lang = $lang;
       if($type==true){
        $this->type = "answers";
       }
       else{
        $this->type = "ques_ans";   
       }
       $obj = parent::getObject("numbers/$this->type/$this->username/$this->character/$this->lang");
       if($obj==null){
         $this->count = 0;
       }
       else{
        $this->count = $obj['count']; 
       }
   }
   
   public function count(){
        return $this->count;
   }

   public function getType(){
        return $this->type;
   }

   public function addByOne(){
        $this->count = $this->count + 1;
        parent::getRef("numbers/$this->type/$this->username/$this->character/$this->lang")->set(['count'=>$this->count]);
   }

}
