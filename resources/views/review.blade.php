@extends('layouts.app')
@section('title')
  Saved Answers | chaterpeter  
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
                      <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
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
            <div class="alert alert-danger">
                    @if(!$data['is_all_answered'])
                      All questions must be answered.
                    @else
                    <strong>Click to confirm </strong>your saved response. 
                     
                  </div></br>
            @foreach ($data['ques_ans'] as $item)
                      
                <h4>Question. {{$item[ $data['lang'] ]['Q']  }}</h4>
            @php
                $i=1;
            @endphp
            @foreach ( $item[ $data['lang'] ]['A'] as $ans)
                <p>Answer {{$i}}. {{$ans}}</p>    
              @php $i=$i+1; @endphp
            @endforeach
          @endforeach
          @endif  
          <!--  <h4>Q. What do you do for living ?</h4>
            <p>Ans. I do 'marna', 'dhulna' and 'kutna'.</p> -->
          </div>
          
           <div class="col-md-2"></div>
         
        </div>
      </div>
@endsection