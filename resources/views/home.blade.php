@extends('layouts.app')
@section('title')
  Home | chaterpeter  
@endsection
@section('body')
    
<div class="container">

        <div class="header clearfix">
                <nav>
                  <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/logout">Log out<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="http://www.talkoye.com/">About</a>
                    </li>
                  </ul>
                </nav>
                <h3 class="text-muted">Chaterpeter</h3>
              </div>
@php $i=0;$count=count($characters);$keys=array_keys($characters);@endphp              
@while($i<$count)
        <div class="row">
          @for($j=$i;$j<=$i+2 && $j<$count;$j++)
          <div class="col-md-4">
            <div class="card" style="width:18rem;margin:1.5rem 0 1rem 0">
        <img class="card-img-top crop-img" src="{{$characters[$keys[$j]]['pic_url']}}" alt="image" style="width:100%">
        <div class="card-body">
        <h4 class="card-title">{{$characters[$keys[$j]]['name']}}</h4>
          <p class="card-text">{{$characters[$keys[$j]]['dialogue']}}</p>
          <a onclick="onClickHandler('{{$keys[$j]}}')" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Select</a>
        </div>
      </div>
          </div>
        @endfor
                  
      </div> <!--div.row-->
@php $i=$i+3; @endphp               
@endwhile
      </div>


        <!-- The Modal Start-->
  <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Settings</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              
    <form class="form-horizontal" id="form" action="/list" method="GET" >
    <fieldset>
    <!-- Form Name -->
    <legend></legend>
    <!-- Multiple Radios -->
    <div class="form-group">
      <label class=" control-label" for="radios">Select Language</label>
      <div class="">
      <div class="radio">
        <label for="radios-0">
          <input type="radio" name="lang" id="radios-0" value="hindi" checked="checked" onclick="radioHandler('hindi')">
          Hindi
        </label>
        </div>
      <div class="radio">
        <label for="radios-1">
          <input type="radio" name="lang" id="radios-1" value="english" onclick="radioHandler('english')">
          English
        </label>
        </div>
      </div>
    </div>
    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="proceed_btn"></label>
      <div class="col-md-4">
        <input type="hidden" name="character" id="character" value="">
      <button id="proceed_btn" class="btn btn-primary" onclick="onSubmit()" >Proceed</button>
      </div>
    </div>
    
    </fieldset>
    </form>
    
            </div>
            
                 
          </div>
        </div>
      </div>
      <!-- The Modal End-->
@endsection

@section('javascripts')
    <script>
      var character="",lang="english";
        function onClickHandler(selectedOption){
            character = selectedOption;
            $('#character').attr('value',character);
        }
        function radioHandler(selectedOption){
          lang =selectedOption;
          //$('#form').attr('action','/list');
          //$('#form').attr('method','GET'); 
          

        }
        function onSubmit(){
          if(character!=''){
          }
            //window.location.replace('/list?lang='+lang+'&character='+character);
            else
              alert('No character selected');    
        }
    </script>
@endsection