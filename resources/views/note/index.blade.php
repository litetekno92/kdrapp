@extends('layout.mylayout')
@section('content')
<div class="container">
<div class="col d-flex justify-content-center">
@if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
<h2 class="text-primary"><a href="{{ action('NotesController@create') }}">Create a note</a></h2>
</div>
            
<div class="row">
<div class="card-columns">
   @foreach ($notes as $note)
    <div class="card">
        <img class="card-img-top img-fluid" src="https://fillmurray.com/{{ 400+$note->user_id}}/300">
      <div class="card-block">
        @if(Auth::id() == $note->user_id)
        <h4 class="card-title"><a href="{{ action('NotesController@edit',['id'=>$note->id]) }}"  class="list-group-item-action">{{$note->title}}</a></h4>
        @else
        <h4 class="card-title">{{$note->title}}</h4>
        @endif
        @if($note->category_id==10)
        <span class="badge badge-primary">Social</span>
        @else
        <span class="badge badge-warning">Health</span>
        @endif
        <p class="card-text">{!! str_limit($note->body , $limit = 60, $end = '...') !!}</p>
      </div>
      <div class="card-footer">
         <span>
           {{ $note->user->name }}
        @if(Auth::id() == $note->user_id)
         <a href="{{ route('note.destroy', ['id'=>$note->id]) }}" class="card-link text-danger text-right" >X</a>
        @endif
         </span>
       </div>
    </div>
   @endforeach
</div>
<br>
<div class="row">
{{ $notes->links() }}
</div>
</div>

    

@endsection
