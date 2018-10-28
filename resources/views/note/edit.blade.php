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
      {!! Form::label('category', 'Category') !!}
    <select name="category" id="category" class="form-control">
    <option value=""> -- Select One --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"  @if($category->id==$note->category_id) selected='selected' @endif >{{ $category->name }}</option>
    @endforeach
</select>
  </div>
  <div class="form-group">
    {!! Form::label('folder', 'Folder') !!}
  <select name="folder" id="folder" class="form-control">
  <option value=""> -- Select One --</option>
  @foreach ($folders as $folder)
        <option value="{{ $folder->id }}"  @if($folder->id==$note->folder_id) selected='selected' @endif >{{ $folder->name }}</option>
  @endforeach
</select>
</div>
    <button class="btn btn-success" type="submit">Modify the Note!</button>

  {!! Form::close() !!}
</div>
@endsection
