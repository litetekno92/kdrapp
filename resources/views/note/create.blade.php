@extends('layout.mylayout')
@section('content')
<div class="container">
{!! Form::model($note, ['action' => 'NotesController@store']) !!}

    <div class="form-group">
      {!! Form::label('title', 'Title') !!}
      {!! Form::text('title', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('body', 'Body') !!}
      {!! Form::textarea ('body', '', ['class' => 'form-control', 'id' => 'summary-ckeditor']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('category', 'Category') !!}
    <select name="category" id="category" class="form-control">
    <option value=""> -- Select One --</option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}"  {{ (isset($category->id) || old('id'))? "selected":"" }}>{{ $category->name }}</option>
    @endforeach
</select>
  </div>
  <div class="form-group">
    {!! Form::label('folder', 'folder') !!}
  <select name="folder" id="folder" class="form-control">
  <option value=""> -- Select One --</option>
  @foreach ($folders as $folder)
      <option value="{{ $folder->id }}"  {{ (isset($folder->id) || old('id'))? "selected":"" }}>{{ $folder->name }}</option>
  @endforeach
</select>
</div>
    <button class="btn btn-success" type="submit">Add the Note!</button>

  {!! Form::close() !!}
</div>
@endsection
