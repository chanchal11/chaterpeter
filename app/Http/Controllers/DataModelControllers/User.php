<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
class User extends FirebaseModel
{
   private $data,$username/*$fullname,$password,*/;  
   public function __construct($username){
        $this->username = $username;
        $this->data = parent::getObject('users/'.$username);     
   }
   
   /*
   To get data object
   */
   public function data(){
        return $this->data;
   }
   /*
   To create a new user's data on firebase database => boolean
   */
   public function create($fullname,$password){
       if($this->data==null){
           if(is_string($fullname) && is_string($password))
            {}
            else 
                return false;  
           parent::getRef('users/'.$this->username)->set(['fullname'=>$fullname,'password'=>$password]);
           $this->data = parent::getObject('users/'.$this->username);
           return true;
       }
       else{
           return false;
       }
   }
   /*
   to check if username is available for registration => boolean
   */
   public function isUsernameAvailable()
   {
       if($this->data==null)
            return true;
        else
            return false;
   }

   /*
   to check if username is valid => boolean
   */
  public function isUsernameValid()
  {
      if($this->data==null)
           return false;
       else
           return true;
  }
  // validation of password => boolean
   public function isPasswordValid($password){
       if($this->data==null){
            return false;
       }
       else{
            if(strcmp($password,$this->data['password'])==0){
                return true;
            }
            else
                return false;
       }
   }

}
