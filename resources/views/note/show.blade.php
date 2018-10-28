@extends('layout.mylayout')
@section('content')
<div class="container">

  <div class="col d-flex justify-content-center">
     <div class="card" style="width: 18rem;" >
       <div class="card-body" class="col-xs-12 col-md-4 col-md-offset-2">
         <h5 class="card-title">{{ $note->title }}</h5>
         <span class="card-text">{!! $note->body !!}</span>
       </div>
       <div class="card-footer">
         <h6 class="card-subtitle mb-2 text-muted">Category : {{ $category_name}}</h6>
         <h6 class="card-subtitle mb-2 text-muted">Folder : {{ $folder_name}}</h6>
         <a href="{{ route('note.index') }}" class="card-link" >Go Back</a>
       </div>
    </div>
  </div>

</div>
@endsection
