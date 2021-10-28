@section('title', __('Centros'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fas fa-home"></i> Centros </h4>
                        </div>
                        <div class="col-sm-5">
                            @include('flash-message')
                        </div>
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar Centros">
                        </div>
                        <div class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i> Agregar Centro
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.centros.create')
                    @include('livewire.centros.update')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Nombre</th>
                                    <th>Codigo</th>
                                    <th>Codcent</th>
                                    <th>Direccion</th>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($centros as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->nombre }}</td>
                                    <td>{{ $row->codigo }}</td>
                                    <td>{{ $row->codcent }}</td>
                                    <td>{{ $row->direccion }}</td>
                                    <td width="90">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-toggle="modal" data-target="#updateModal" class="dropdown-item"
                                                    wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar
                                                </a>
                                                <a class="dropdown-item"
                                                    onclick="confirm('Confirm Delete Centro id {{$row->id}}? \nDeleted Centros cannot be recovered!')||event.stopImmediatePropagation()"
                                                    wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i>
                                                    Borrar </a>
                                            </div>
                                        </div>
                                    </td>
                                    @endforeach
                            </tbody>
                        </table>
                        {{ $centros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
