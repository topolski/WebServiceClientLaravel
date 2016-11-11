@extends('master')

@section('header')
<div class="col-sm-12">
@if($greska)
	<h2>Kategorija nije pronađena!</h2>
@else
	<h2> 
		{{{isset($naslov) ? 'Izmena katagorije' : 'Dodavanje nove kategorije'}}}
	</h2>
</div>
@stop

@section('content')
	<div class="col-sm-12">
		{{Form::open(array('class' => 'col-xs-6 col-xs-offset-3 form-horizontal', 'role' => 'form'))}}
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
	  		{{Form::submit("Save", array("class"=>"btn btn-primary btn-block"))}}
		{{Form::close()}}
	@endif
	</div>
@stop