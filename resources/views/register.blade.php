@extends('layouts.app')
@section('title')
    Register | Chaterpeter
@endsection
@section('body')
<div class="container">

        <div class="header clearfix">
                <nav>
                  <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Register </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="http://www.talkoye.com/">About</a>
                    </li>
                  </ul>
                </nav>
                <h3 class="text-muted">Chaterpter</h3>
        </div>
          
        <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="form-horizontal" action="/register-user" method="POST">
                      {{ csrf_field() }}  
                      <fieldset> 
                        <!-- Form Name -->
                        <legend><center>Register Now</center></legend>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="username">Username</label>  
                          <div >
                          <input name="username" id="username" type="text" placeholder=" " class="form-control input-md" required="" onchange="getUsername()">
                          <span class="help-block" id="username_help">Choose your username.</span>  
                          </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="fullname">Fullname</label>  
                            <div >
                            <input name="fullname" id="fullname" type="text" placeholder=" " class="form-control input-md" required="" onchange="getUsername()">
                            <span class="help-block" >Enter your fullname.</span>  
                            </div>
                          </div>
                        
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="textinput">Password</label>  
                          <div>
                          <input  name="password" type="password" placeholder="************" class="form-control input-md" required="">
                          <span class="help-block">Choose password.</span>  
                          </div>
                        </div>
                        
                        <!-- Button -->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="submit_button"></label>
                          <div class="col-md-4">
                            <button id="submit_button" name="submit_button" class="btn btn-success">Register</button>
                          </div>
                        </div>
                        
                        </fieldset>
                        </form>
                        
                </div>
                <div class="col-md-4"></div>
        </div>
</div>        
@endsection

@section('javascripts')
  <script type="text/javascript">
    function getUsername(){
    _('username_help').innerHTML = "Checking for availablity...";
     $.get('/getusername?q='+_('username').value,function(data){
      _('username_help').innerHTML = data;  
     });
    }
    function _(id){
      return document.getElementById(id);
    }
  </script> 
@endsection