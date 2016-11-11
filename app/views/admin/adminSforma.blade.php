@extends('master')

@section('header')
<div class="col-sm-12">
@if(isset($greska))
  <h2> {{$greska}}</h2>
@else
  <h2> {{{isset($naslov) ? $naslov : 'Dodavanje novog sefa'}}}</h2>
@endif
</div>
@stop
@section('content')
<div class="col-sm-12">
@if(isset($greska))
@else
{{Form::open(array('class' => 'col-xs-6 col-xs-offset-3 form-horizontal', 'role' => 'form', 'files' => true))}}
        <script type="text/javascript" src="../../libs/underscore.js"></script>
        <script type="text/javascript" src="../../libs/jsonform.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
              var formObject = {
                "schema": {{$schema}},
                "form": {{$form}},
                "onSubmit": function (errors, values) {
                  if(errors)
                  {
                    alert("Greska!");
                  }
                  $('form').submit();
                }
              };
              $('form').jsonForm(formObject);
            });
        </script>
  <div class="form-group has-warning">
    {{Form::label('slika', 'Slika sefa:', array('class' => 'control-label'))}} 
    {{Form::file('slika', '', array('class' => 'form-control', 'placeholder' => 'Slika'))}}
    <p class="help-block">Slika za sef je obavezna.</p>
  </div>
  {{Form::submit('Save', array("class"=>"btn btn-primary btn-block"))}}
{{Form::close()}}
@endif
</div>
@stop