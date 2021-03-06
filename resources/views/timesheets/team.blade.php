@extends('layouts.app')
@section('header')
<div>
  <h1>
    <i class="fas fa-align-justify"></i> TimeSheet
    <br>
    <a class="btn btn-success float-left" href="{{ route('timesheets.export') }}"><i class="fas fa-plus"></i> Export</a>
    <a class="btn btn-success float-right" href="{{ route('timesheets.create') }}"><i class="fas fa-plus"></i> Create new timesheet</a>
    <br>
  </h1>
</div>
@endsection
@section('content')
    
@if($users->count())
<div >
    <table class="table ">
      @include('shared.error')
        <thead  class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Date</th>
                <th scope="col">Tasks</th>
                <th scope="col">Problem</th>
                <th scope="col">Plan</th>
                <th class="text-right">OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @foreach ($user->timesheets as $timesheet)
                <tr>
                    <th scope="row">{{ $timesheet['id'] }}</th>
                    <td>{{ $timesheet->user->name }}</td>
                    <td>{{ $timesheet->date }}</td>
                    <td>
                        @foreach ($timesheet->tasks()->get() as $task)
                        <a class="btn btn-sm btn-info" href="{{ route('timesheets.tasks.show',[ $timesheet->id, $task->id]) }}">
                        {{ $task->name }}
                        </a>
                        @endforeach
                    </td>
                    <td>{{ $timesheet->problem }}</td>
                    <td>{{ $timesheet->plan }}</td>
                    
                    <td class="text-right">
                        <a class="btn btn-sm btn-primary" href="{{ route('timesheets.show', $timesheet->id) }}">
                        <i class="fas fa-eye"></i> View
                        </a>
                        <a class="btn btn-sm btn-warning" href="{{ route('timesheets.edit', $timesheet->id) }}">
                        <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST" style="display: inline;"
                        onsubmit="return confirm('Delete? Are you sure?');">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                        </form>
                    
                    </td>
                </tr>
                @endforeach
            @endforeach
           
            
        </tbody>
          
    </table>
    @else
    <h3 class="text-center alert alert-info">Empty!</h3>
    @endif
</div>
@endsection