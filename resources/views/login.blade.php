@extends('layouts.app')
@section('title')
Login | Signup | Chaterpeter    
@endsection
@section('body')
  <div class="container">
    <div class="header clearfix">
      <nav>
        <ul class="nav nav-pills float-right">
          <li class="nav-item">
            <a class="nav-link active" href="#">Login </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Sign Up <span class="sr-only">(current)</span></a>
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
                <form class="form-horizontal" action="/login/verify" method="POST"> <!--/home -->
                  {{ csrf_field() }}
                    <fieldset>
                    <!-- Form Name -->
                    <legend><center>Welcome back !!</center></legend>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">Username</label>  
                      <div >
                      <input id="textinput" name="username" type="text" placeholder=" " class="form-control input-md" required="">
                      <span class="help-block">Enter your username.</span>  
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput">Password</label>  
                      <div>
                      <input id="textinput" name="password" type="password" placeholder="************" class="form-control input-md" required="">
                      <span class="help-block">Enter password.</span>  
                      </div>
                    </div>
                    
                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="submit_button"></label>
                      <div class="col-md-4">
                        <button id="submit_button" name="submit_button" class="btn btn-success">Login</button>
                      </div>
                    </div>
                    
                    </fieldset>
                    </form>
                    
            </div>
            <div class="col-md-4"></div>
    </div>
    <div class="row marketing">
    </div>

    <footer class="footer">
      <p>© Talkoye 2018</p>
    </footer>

  </div> <!-- /container -->
@endsection