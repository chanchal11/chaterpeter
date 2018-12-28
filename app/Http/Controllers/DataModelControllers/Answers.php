<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
class Answers extends FirebaseModel
{
    private $data,$username,$questionid,$character,$lang;
    public function __construct($username,$character,$questionid,$lang){
        $this->username = $username;
        $this->questionid = $questionid;
        $this->lang = $lang;
        $this->character = $character;
    $this->data = parent::getObject('answers/'.$username.'/'.$character .'/'. $questionid/*.'/'.$lang*/); 
    }
    public function data(){
        return $this->data;
    }
    public function dataByLang($lang){
        return $this->data[$lang];
    }
   public function get($username,$character,$questionid,$lang){
        return parent::getObject('answers/'.$username.'/'.$character .'/'. $questionid.'/'.$lang);
   }

   public function set($ans1,$ans2){
        $obj = new Question($this->character,$this->questionid);
        $num_ans = new Numbers($this->username,$this->character,$this->lang,true);
        $num_ans->addByOne();       
        return parent::getRef('answers/'.$this->username.'/'.$this->character .'/'. $this->questionid/*.'/'.$this->lang*/)->set(["$this->lang"=>[ 'Q'=> $obj->dataByLang($this->lang)  ,'A' => [$ans1,$ans2] ] ]);
    }

  public function isAnswered(){
      return !($this->data == null);
  }
}
