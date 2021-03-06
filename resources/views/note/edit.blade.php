@extends('layout.mylayout')
@section('content')
<div class="container">
{!! Form::model($note, ['url' => ['/note', $note->id]]) !!}
    {!! csrf_field() !!}
    <input name="_method" type="hidden" value="PUT">

    <div class="form-group">
      {!! Form::label('title', 'Title') !!}
      {!! Form::text('title', $note->title, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('body', 'Body') !!}
      {!! Form::textarea ('body', $note->body, ['class' => 'form-control', 'id' => 'summary-ckeditor']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('Categories') !!}<br />
      {!! Form::select('category_id[]',
      $categories,
      $note->categories->pluck('id')->toArray(),
      ['class' => 'form-control',
      'multiple' => 'multiple']) !!}
  </div>

  <div class="form-group">
      {!! Form::label('Folders') !!}<br />
      {!! Form::select('folder_id',
      $folders,
      $note->folder_id,
      ['class' => 'form-control']) !!}
</div>
    <button class="btn btn-success" type="submit">Modify the Note!</button>

  {!! Form::close() !!}
</div>
@endsection
