<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Google\Cloud\Firestore\FirestoreClient;
use App\Http\Controllers\DataModelControllers;
class TestController extends Controller
{
    public function test1($word){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebase_client_secret.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        $db = $firebase->getDatabase();
        $data = $ref->getSnapshot()->getValue(); // to download & convert in array object
        print_r($data); // to print object as HTTP response 
        $ref = $db->getReference('ques_ans/2/hindi')->getSnapshot()->getValue();
        $ref->set(['english'=> 'Do you know who i am ?','hindi'=> 'क्या तुम जानते हो की मैं कौन हूँ ?' ]);
        //$ref = $db->getReference('chaterpeter/users');
        //$db->getReference('ques_ans/3/')->set(['english'=> 'Do you know who i am ?','hindi'=> 'क्या तुम जानते हो की मैं कौन हूँ ?' ]);
        //$s = $db->getReference('ques_ans/3/hindi')->getSnapshot()->getValue();
        if($db->getReference('ques_ans/'.$word)->getSnapshot()->getValue()==null)
        {
            print_r('Username available.');    
        }
        else{
            print_r('Username not available.');
        }
        //print_r($s);
        
    }
    public function wordCount($word){
        try{
            return strlen($word);
        }catch(Exception $e){
            return 0;
        }
    }
    
    function set_document()
    {
        
    }

    function get_all()
    {
        $obj = new Characters();
        print_r($obj->data());
    }

    public function rootUnlogged(){
        return view('root_unlogged');
    }

    public function testpost(Request $request){
        print_r($request->get('username'));
    }

    public function makeNewCharacter(Request $request){
        $db = new DataModelControllers\FirebaseModel();
        $questionid = $request->get('questionid');
        $character = $request->get('character');
        $hindi = $request->get('hindi');
        $eng = $request->get('english');
        $db->getRef('ques_ans/'.$character.'/'.$questionid)->set(['hindi'=>$hindi,'english'=>$eng,'id'=>$questionid]);
        return "<h1>Saved<h1>";
    }    
}
