@extends('master')

@section('header')
<div class="col-sm-12">
@if($greska)
   <h2>{{$naslov}}</h2>
@else
<h2> @if(!$d) Administracija sefova @else {{$naslov}} @endif</h2>
@if(!$d)<a href="sefovi/create" class="btn btn-primary">Dodaj novi sef</a>
@else
   <a href="/sefovi/edit/{{$sef['id']}}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-edit"></span></a> 
   <a href="/sefovi/delete/{{$sef['id']}}" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span></a>
@endif
</div>
@stop
@section('content')
<div class="col-xs-12">
	 @if(!$d)
   <div class="table-responsive">
  		<table class="table table-hover">
   			<tr>
   				<th>Naziv sefa</th>
               <th>Kategorija</th>
               <th>Cena</th>
   				<th>Detalji</th>
   				<th>Edit</th>
   				<th>Delete</th>
   			</tr>
           
   			@foreach($sefovi as $sef)
   			<tr>
   				<td>
   					{{$sef['naziv']}}
   				</td>
               <td>
                  {{$sef['kategorija']['naziv']}}
               </td>
               <td>
                  {{$sef['cena']}} € [(din protivvrednost) + pdv]
               </td>
   				<td>
   					<a href="sefovi/details/{{$sef['id']}}" class="btn btn-info" role="button"><span class="glyphicon glyphicon-search"></span></a>
   				</td>
   				<td>
   					<a href="sefovi/edit/{{$sef['id']}}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-edit"></span></a>
   				</td>
   				<td>
   					<a href="sefovi/delete/{{$sef['id']}}" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span></a>
   				</td>
   			</tr> 
            @endforeach
         </table>
   </div>
   @else
      <p>Naziv: <b>{{$sef['naziv']}}</b></p>
      <p>Kategorija: <b>{{$sef['kategorija']['naziv']}}</b></p>
      <p>Opis: <b>{{$sef['opis']}}</b></p>
      <p>Slika: <b><img src='data:{{$sef['mimeType']}};base64,{{$sef['slika']}}' /></b></p>
      <p>Cena: <b>{{$sef['cena']}} € [(din protivvrednost) + pdv]</b></p>
      <p>Boja: <b>{{$sef['boja']}}</b></p>
      <p>Brava: <b>{{$sef['brava']}}</b></p>
      <p>Unutrašnja brava: <b>{{$sef['ubrava']}}</b></p>
      <p>Zabravljivanje: <b>{{$sef['zabravljivanje']}}</b></p>
      <p>Tip: <b>{{$sef['tip']}}</b></p>
      <p>Spoljašnja visina: <b>{{$sef['sv']}} mm</b></p>
      <p>Spoljašnja širina: <b>{{$sef['ss']}} mm</b></p>
      <p>Spoljašnja dubina: <b>{{$sef['sd']}} mm</b></p>
      <p>Unutrašnja visina: <b>{{$sef['uv']}} mm</b></p>
      <p>Unutrašnja širina: <b>{{$sef['us']}} mm</b></p>
      <p>Unutrašnja dubina: <b>{{$sef['ud']}} mm</b></p>
      <p>Police: <b>{{$sef['police']}}</b></p>
      <p>Težina: <b>{{$sef['tezina']}} kg</b></p>
      <p>Zapremina: <b>{{$sef['zapremina']}} mm3</b></p>
      <p>Kreiran: <b>{{$sef['created_at']}}</b></p>
      <p>Izmenjen: <b>{{$sef['updated_at']}}</b></p>
   @endif
@endif
</div>
@stop