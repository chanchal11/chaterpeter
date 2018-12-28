@extends('layouts.app')
@section('title')
  Give Answers | chaterpeter  
@endsection
@section('body')
<div class="container">

        <div class="header clearfix">
                <nav>
                  <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Compose</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/logout">Log out</a>
                    </li>
                  </ul>
                </nav>
                <h3 class="text-muted">Chaterpeter</h3>
              </div>

        <div class="row">
          <div class="col-md-2"></div>
         
          <div class="col-md-8"> <!--Main Section-->
            <form class="form-horizontal" action="/saveanswer" method="GET">
                    <fieldset>
                    <input type="hidden" name="character" value="{{Request::get('character')}}">
                    <input type="hidden" name="lang" value="{{Request::get('lang')}}">
                    <input type="hidden" name="questionid" value="{{Request::get('questionid')}}">
                    <!-- Form Name -->
                    <legend></legend>
                    
                    <!-- Text input-->
                    <div class="form-group">  
                      <div>
                      <h4>Q. {{$question}}</h4>
                      
                      </div>
                    </div>
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label class=" control-label" for="textarea">Answer 1</label>
                      <div class="">                     
                        <input type="text" class="form-control" id="textarea" name="ans1"/>
                      </div>
                    </div>
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label class=" control-label" for="textarea">Answer 2</label>
                      <div class="">                     
                        <input type="text" class="form-control" id="textarea" name="ans2"/>
                      </div>
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                        <label class=" control-label" for="submit_btn"></label>
                        <div>
                        <button id="submit_btn" name="submit_btn" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    
                    </fieldset>
                    </form>
          </div>
          
           <div class="col-md-2"></div>
         
        </div>
      </div>
@endsection