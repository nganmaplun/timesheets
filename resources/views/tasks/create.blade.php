@extends('layouts.app')

@section('header')
<div class="page-header">
  <h1><i class="fas fa-plus"></i> Task / Create </h1>
</div>
@endsection

@section('content')
<div class="container">
<div class="row">
  <div class="col-md-12">

    <form action="{{ route('tasks.store') }}" method="POST">
      @csrf
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      @endif

      <div class="form-group">
        <label for="name-field">Name</label>
        <input class="form-control" type="text" name="name" id="name-field"/>
      </div>
      <div class="form-group">
        <label for="problem-field">Descrition</label>
        <input class="form-control" type="text" name="desc" id="desc-field"/>
      </div>
      <div class="form-group">
        <label for="use_time-field">Use time (H:i)</label>
        <input type="time" name="use_time" id="use_time-field" class="form-control" />
      </div>
      <div class="well well-sm">
        <button type="submit" class="btn btn-primary">Create</button>
        <a class="btn btn-link pull-right" href="{{ route('timesheets.index') }}"><i class="fas fa-backward"></i> Back</a>
      </div>
    </form>

  </div>
</div>
</div>
@endsection