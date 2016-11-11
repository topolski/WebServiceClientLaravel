@extends('master')

@section('header')
<div class="col-sm-12">
<h2> Ulogujte se: </h2>
</div>
@stop
@section('content')
<div class="col-sm-12">
{{Form::open(array('class' => 'col-xs-6 col-xs-offset-3 form-horizontal', 'role' => 'form'))}}
  <div class="form-group">
    {{Form::label('email', 'Email', array('class' => 'sr-only'))}} {{Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email'))}}
  </div>
  <div class="form-group">
    {{Form::label('password', 'Password', array('class' => 'sr-only'))}} {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
  </div>
  {{Form::submit("Log in", array("class"=>"btn btn-primary btn-block"))}}
{{Form::close()}}
</div>
@stop