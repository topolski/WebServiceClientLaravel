@extends('master')

@section('header')
<div class="col-sm-12">
@if($greska)
   <h2>{{$naslov}}</h2>
@else
<h2> @if(!$d) Administracija kategorija sefova @else Detalji za kategoriju - {{$kategorije['naziv']}} @endif</h2>
@if(!$d)<a href="kategorije/create" class="btn btn-primary">Dodaj novu kategoriju</a>@endif
</div>
@stop
@section('content')
<div class="col-xs-12">
	<div class="table-responsive">
  		<table class="table">
   			<tr>
   				<th>Naziv kategorije</th>
               @if(!$d)
   				<th>Detalji</th>
               @else
               <th>Kreirana</th>
               <th>Poslednji put izmenjena</th>
               @endif
   				<th>Edit</th>
   				<th>Delete</th>
   			</tr>
            @if(!$d)
   			@foreach($kategorije as $kategorija)
   			<tr>
   				<td>
   					{{$kategorija['naziv']}}
   				</td>
   				<td>
   					<a href="kategorije/details/{{$kategorija['id']}}" class="btn btn-info" role="button"><span class="glyphicon glyphicon-search"></span></a>
   				</td>
   				<td>
   					<a href="kategorije/edit/{{$kategorija['id']}}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-edit"></span></a>
   				</td>
   				<td>
   					<a href="kategorije/delete/{{$kategorija['id']}}" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span></a>
   				</td>
   			</tr> 
   			@endforeach
            @else
            <tr>
               <td>
                  {{$kategorije['naziv']}}
               </td>
               <td>
                  {{$kategorije['created_at']}}
               </td>
               <td>
                  {{$kategorije['updated_at']}}
               </td>
               <td>
                  <a href="/kategorije/edit/{{$kategorije['id']}}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-edit"></span></a>
               </td>
               <td>
                  <a href="/kategorije/delete/{{$kategorije['id']}}" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span></a>
               </td>
            </tr> 
            @endif
  		</table>
	</div>
   @endif
</div>
@stop