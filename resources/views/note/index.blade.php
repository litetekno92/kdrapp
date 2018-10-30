@extends('layout.mylayout')
@section('content')
<div class="container">
  @include('flash::message')
<div class="col d-flex justify-content-center">

<h2 class="text-primary"><a href="{{ action('NotesController@create') }}">Create a note</a></h2>
</div>
            
<div class="row">
<div class="card-columns">
   @foreach ($notes as $note)
    <div class="card">
        <img class="card-img-top img-fluid" src="https://fillmurray.com/{{ 400+$note->user_id}}/300">
      <div class="card-block">
        @if(Auth::id() == $note->user_id)
        <h4 class="card-title"><a href="{{ action('NotesController@edit',['id'=>$note->id]) }}" class="btn btn-info"  class="list-group-item list-group-item-action">{{$note->title}}</a></h4>
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
          <a href="{{ route('notedel', ['id'=>$note->id]) }}" class="card-link text-danger text-right" ><webicon icon="typicons:trash" style="position: relative; display: inline-block; 	height: 2rem;	width: 2rem;	top: 5px;	margin-right: .25rem;"/></a>
        @endif
        <br>Category :
        @foreach ($note->categories as $category)
        <p class="card-text">
          {{ $category->name }}
        </p>

        @endforeach
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
