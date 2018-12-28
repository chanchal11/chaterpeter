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
            <div class="alert alert-success">
                    <!--<strong>Successfully </strong>-->Your saved response. 
                  </div></br>
                <h4>Question. {{$quesans['question']}}</h4>
            @php
                $i=1;
            @endphp
            @foreach ( $quesans['answers']['A'] as $ans)
                <p>Answer {{$i}}. {{$ans}}</p>    
              @php $i=$i+1; @endphp
            @endforeach
          <!--  <h4>Q. What do you do for living ?</h4>
            <p>Ans. I do 'marna', 'dhulna' and 'kutna'.</p> -->
          
          <center> <a href="/review?lang={{Request::get('lang')}}&character={{Request::get('character')}}" class="btn btn-lg btn-primary">Review</a> </center>
          </div>
          
           <div class="col-md-2"></div>
        </div>
      </div>
@endsection