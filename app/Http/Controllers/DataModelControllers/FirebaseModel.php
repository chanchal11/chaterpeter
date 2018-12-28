<?php

namespace App\Http\Controllers\DataModelControllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseModel 
{
    public function getDatabase(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase_client_secret.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        return $firebase->getDatabase();
    }
    public function getRef($REF_STR){
        return $this->getDatabase()->getReference($REF_STR);
    }
    public function getObject($REF_STR){
        return $this->getRef($REF_STR)->getSnapshot()->getValue();
    }
    public function isObjectNull($REF_STR){
        return $this->getRef($REF_STR)->getSnapshot()->getValue()==null;
    }
    public function getJSON($REF_STR){
        return json_encode($this->getObject($REF_STR));
    }
}
