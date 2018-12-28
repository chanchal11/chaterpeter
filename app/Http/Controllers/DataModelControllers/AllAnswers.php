<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
class AllAnswers extends FirebaseModel
{
    private $data,$username,$character,$lang;
    public function __construct($username,$character,$lang){
        $this->username = $username;
        $this->character = $character;
        $this->lang = $lang;
        $this->data = parent::getObject('answers/'.$username.'/'.$character ); 
    }
    public function data(){
        return $this->data;
    }
    
   public function get($username,$character){
        return parent::getObject('answers/'.$username.'/'.$character);
   }

   public function isAllAnswered(){
        $num_ans = new Numbers($this->username,$this->character,$this->lang,true);
        $num_ques = new Numbers($this->username,$this->character,$this->lang,false);
        if($num_ans->count()==$num_ques->count())
            return true;
        else {
            return false;
        }
    }
}
