@extends('layouts.app')
@section('title')
  Questions List | chaterpeter  
@endsection
@section('body')
    
<div class="container">

        <div class="header clearfix">
                <nav>
                  <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">List</a>
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

    @php
    $character = Request::get('character');
    $lang = Request::get('lang');
    if($lang!='hindi' && $lang!='english')
        $lang = 'english'; 
    @endphp

        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          @if($questions==null)
             <h2>No Questions Available</h2>
          @else     
            @foreach($questions as $question)    
            <a href="/compose?lang={{$lang}}&character={{$character}}&questionid={{$question['id']}}"><p><h4>Q. {{$question["$lang"]}}</h4></p></a>
            @endforeach  
          @endif
          </div>
           <div class="col-md-4">
          </div>
        </div>
      </div>
@endsection
