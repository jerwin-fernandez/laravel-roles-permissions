@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-header">
        <strong><i class="fa fa-users"></i> Users</strong>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>role</th>
                <th>permissions</th>
                <th>actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>role</td>
                  <td>permissions</td>
                  <td>
                    <a href="{{ route('users.show', $user->id) }}" title="show"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('users.edit', $user->id) }}" title="edit"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection