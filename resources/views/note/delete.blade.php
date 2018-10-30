@extends('layout.mylayout')
@section('content')
<div class="container">

  <div class="col d-flex justify-content-center">
     <div class="card" style="width: 18rem;" >
       <div class="card-body" class="col-xs-12 col-md-4 col-md-offset-2">
          <h4>Confirm Delete Record <a href="{{route('note.index')}}" class="btn btn-info btn-xs"> Back </a></h4>
        </div>
       <div class="card-footer">
         <h6 class="card-subtitle mb-2 text-muted">Are you sure you want to delete <strong>{{$note->name}}</strong></h6>
         <div class='row'>
         {!! Form::model($note,  ['url' => ['/note', $note->id]]) !!}
         {!! csrf_field() !!}
         <input name="_method" type="hidden" value="DELETE">
         <button class="btn btn-danger" type="submit">Yes I'm sure. Delete</button>
         {!! Form::close() !!}
       </div>
       </div>
    </div>
  </div>

</div>
@endsection
