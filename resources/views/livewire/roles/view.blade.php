@section('title', __('Roles'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-user-tag"></i> Roles </h4>
						</div>
						<div class="col-sm-5">
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model.debounce.1s='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Rol">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Agregar Rol
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.roles.create')
						@include('livewire.roles.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nombre</th>
								<td>Acciones</td>
							</tr>
						</thead>
						<tbody>
							@foreach($roles as $row)
							<tr>
								<td>{{ $row->id }}</td>
								<td>{{ $row->name }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
									<a class="dropdown-item" onclick="confirm('Confirma que desear borrar el rol {{$row->id}}? \nAl borrarlo no se puedrá recuperar!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> &nbsp;Borrar </a>
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					{{ $roles->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
