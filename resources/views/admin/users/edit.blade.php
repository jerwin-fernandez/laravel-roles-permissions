@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong><i class="fa fa-edit"></i> Edit User : {{ $user->name }}</strong>
            <span class="float-right">Updated: {{ $user->updated_at->diffForHumans() }}</span>
        </div>
        <div class="card-body">

            @if (Session::has('updated_user'))
            <div class="alert alert-success">
                {{ session('updated_user') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!! Form::model($user, [
            'route' => ['users.update', $user->id],
            'method' => 'PUT',
            ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, [
                'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, [
                'class' => 'form-control',
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', [
                'class' => 'form-control',
                'placeholder',
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password:') !!}
                {!! Form::password('password_confirmation', [
                'class' => 'form-control',
                ]) !!}
            </div>

            <form-group>
                {!! Form::submit('Submit', [
                'class' => 'btn btn-primary',
                ]) !!}
            </form-group>

            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            <a href="{{ route('users.index') }}" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>
    </div>
</div>
@endsection
