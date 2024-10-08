@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar un Role</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card-body">
        <p class="h5">Nombre</p>
        <p class="form-control">{{ $user->name }}</p>
        <h5 class="h5">Listado de Roles</h5>
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
        @foreach ($roles as $role)
            <div>
                <label>
                    {!! Form::checkbox('roles[]', $role->id, in_array($role->id, $user->roles->pluck('id')->toArray()), ['class' => 'mr-1']) !!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
        {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}
    {!! Form::close() !!}

    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
