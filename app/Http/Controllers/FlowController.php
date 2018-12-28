<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataModelControllers;
class FlowController extends Controller
{
    public function home(){
        $obj = new DataModelControllers\Characters();
        $data = $obj->data();
        return view('home')->with('characters',$data);
    }
    public function giveAnswer(Request $request){
        if($request->get('lang')==null || $request->get('character')==null || $request->get('questionid')==null)
        {
            return redirect('/home');
        }
        else
        {
            
            $lang = $request->get('lang');
            $questionid = $request->get('questionid');
            $character = $request->get('character');
            $username = $request->session()->get('username')[0];
            $ques = new DataModelControllers\Question($character, $questionid);
            $ans = new DataModelControllers\Answers($username,$character,$questionid,$lang);
            if($ans->isAnswered())
                return redirect('/showsaved?lang='.$lang.'&character='.$character.'&questionid='.$questionid);    
            else
                return view('giveanswer')->with('question',$ques->dataByLang($request->get('lang')));
        }
    }
    public function showSavedData(Request $request){
        //return view('savedanswer');
        $lang = $request->get('lang');
        $questionid = $request->get('questionid');
        $ans1 = $request->get('ans1');
        $ans2 = $request->get('ans2'); 
        $character = $request->get('character');
        $ques = new DataModelControllers\Question($character,$questionid);
        $username = $request->session()->get('username')[0];
        if($questionid==null && $lang==null && $ans1==null && $ans2==null)
            return redirect('/compose?lang='.$lang.'&character='.$character.'&questionid='.$questionid);
        $ans = new DataModelControllers\Answers($username,$character,$questionid,$lang);
        if($ans->isAnswered())
            {
                return view('savedanswer')->with('quesans',['answers'=>$ans->dataByLang($lang),'question'=> $ques->dataByLang($lang) ]);            
            }
        else {
            return redirect('/compose?lang='.$lang.'&character='.$character.'&questionid='.$questionid);
        }
    }
    public function rootUnlogged(){
        return view('root_unlogged');
    }
    public function showQuestionsList(Request $request){
        $character = $request->get('character');
        if($request->get('lang')==null || $character==null)
        {
            return redirect('/home');
        }
        else{
            $obj = new DataModelControllers\Questions($character);
            return view('questionslist')->with('questions',$obj->data());
        }
    }
    public function saveAnswer(Request $request){
        $lang = $request->get('lang');
        $questionid = $request->get('questionid');
        $ans1 = $request->get('ans1');
        $ans2 = $request->get('ans2'); 
        $character = $request->get('character');
        $username = $request->session()->get('username')[0];
        if($questionid==null && $lang==null && $ans1==null && $ans2==null)
            return redirect('/compose?lang='.$lang.'&character='.$character.'&questionid='.$questionid);
        $ans = new DataModelControllers\Answers($username,$character,$questionid,$lang);
        if($ans->isAnswered())
            return redirect('/showsaved?lang='.$lang.'&character='.$character.'&questionid='.$questionid);
        else {
            $ans->set($ans1,$ans2);
            return redirect('/showsaved?lang='.$lang.'&character='.$character.'&questionid='.$questionid);
        }
    }

   
    public function showConfirmation(Request $request){

        $lang = $request->get('lang');
        $character = $request->get('character');
        $username = $request->session()->get('username')[0];
        if($lang==null && $username==null && $character==null)
            return redirect('/list?lang='.$lang.'&character='.$character);
        $obj = new DataModelControllers\AllAnswers($username,$character,$lang);
        $data = $obj->data();
        $is_all_answered = $obj->isAllAnswered();
        //print_r($data);
        return view('review')->with('data',['ques_ans'=> $data, 'is_all_answered'=> $is_all_answered, 'lang'=> $lang ]);
    }

    public function checkAllAnswered(){
        $num_ans = new DataModelControllers\Numbers($this->username,$this->character,$this->lang,true);
        $num_ques = new DataModelControllers\Numbers($this->username,$this->character,$this->lang,false);
        if($num_ans->count()==$num_ques->count())
            return true;
        else {
            return false;
        }
    }
}
