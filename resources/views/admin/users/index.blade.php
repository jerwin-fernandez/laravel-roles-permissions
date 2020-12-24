@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong><i class="fa fa-users"></i> Users</strong>
            <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Create User</a>
        </div>
        <div class="card-body">

            @if (Session::has('deleted_user'))
            <div class="alert alert-success">
                {{ session('deleted_user') }}
            </div>
            @endif

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
                                <a href="{{ route('users.show', $user->id) }}" title="show user"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('users.edit', $user->id) }}" title="edit user"><i class="fa fa-edit"></i></a>
                                @if (Auth::user()->id != $user->id)
                                <a href="#" data-toggle="modal" data-target="#deleteModal" data-user_id="{{ $user->id }}"
                                    title="delete user"><i class="fa fa-trash-alt"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete User" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Delete User">Are you sure you want to delete this?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open([
                'url' => '',
                'method' => 'DELETE',
                'style' => 'display:inline;',
                'id' => 'delete_form'
                ]) !!}

                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
