@extends('layouts.app')
@section('name')
Chaterpeter | create your own chatbot    
@endsection
@section('body')
  <div class="container">
    <div class="header clearfix">
      <nav>
        <ul class="nav nav-pills float-right">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
        </ul>
      </nav>
      <h3 class="text-muted">Chaterpter</h3>
    </div>

    <div class="jumbotron">
      <h1 class="display-3">Create your own Chaterpeter</h1>
      <p class="lead">Welcome to Chaterpeter. Make your own chat-bot of any famous character.&nbsp;</p>
      <p><a class="btn btn-lg btn-success" href="/register" role="button">Sign up today</a></p>
    </div>

    <div class="row marketing">
    </div>

    <footer class="footer">
      <p>© Talkoye 2018</p>
    </footer>

  </div> <!-- /container -->
@endsection