@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong><i class="fa fa-plus"></i> Create User</strong>
        </div>
        <div class="card-body">

            @if (Session::has('created_user'))
            <div class="alert alert-success">
                {{ session('created_user') }}
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

            {!! Form::open([
            'route' => 'users.store',
            'method' => 'POST',
            ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, [
                'class' => 'form-control',
                'required' => true
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, [
                'class' => 'form-control',
                'required' => true,
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', [
                'class' => 'form-control',
                'required' => true,
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password:') !!}
                {!! Form::password('password_confirmation', [
                'class' => 'form-control',
                'required' => true,
                ]) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role', 'Select Role') !!}

                <div id="permissions_box"></div>
            </div>

            <form-group>
                {!! Form::submit('Create User', [
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
