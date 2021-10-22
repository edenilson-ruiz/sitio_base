@extends('layouts.app')

@section('title', __('Administración de Usuarios'))

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <div class="float-left">
                                            <h4><i class="fas fa-users"></i> Administración de Usuarios </h4>
                                        </div>
                                        <div class="col-sm-5">
                                        </div>
                                        @if (session()->has('message'))
                                            <div wire:poll.4s class="btn btn-sm btn-success"
                                                style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }}
                                            </div>
                                        @endif
                                        <div>
                                            <input wire:model='keyWord' type="text" class="form-control" name="search"
                                                id="search" placeholder="Buscar Area de Atención">
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-success" href="{{ route('users.create') }}">
                                                <i class="fa fa-plus"></i> Crear Nuevo Usuario
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                            <thead class="thead">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Roles</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $user)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @if (!empty($user->getRoleNames()))
                                                                @foreach ($user->getRoleNames() as $v)
                                                                    <label
                                                                        class="badge badge-success">{{ $v }}</label>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @can('user-list')
                                                            <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                                            @endcan
                                                            @can('user-edit')
                                                            <a class="btn btn-primary"
                                                                href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                            @endcan
                                                            @can('user-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                            @endcan
                                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $data->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
