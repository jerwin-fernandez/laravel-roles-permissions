@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <strong><i class="fa fa-eye"></i> View User : {{ $user->name }}</strong>
        <span class="float-right">Created: {{ $user->created_at->toDayDateTimeString() }}</span>
      </div>
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">Name: {{ $user->name }}</li>
          <li class="list-group-item">Email: {{ $user->email }}</li>
          <li class="list-group-item">Updated: {{ $user->updated_at->diffForHumans() }}</li>
          <li class="list-group-item">Roles: </li>
          <li class="list-group-item">Permissions: </li>
        </ul>
      </div>
      <div class="card-footer">
        <a href="{{ route('users.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Go Back</a>
      </div>
    </div>
  </div>
@endsection
