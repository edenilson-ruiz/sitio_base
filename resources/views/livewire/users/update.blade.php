<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model.lazy="name" type="text" class="form-control" id="name" placeholder="Nombre">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email"></label>
                        <input wire:model.lazy="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"></label>
                        <input wire:model.lazy="password" type="password" class="form-control" id="password" placeholder="Password">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword"></label>
                        <input wire:model.lazy="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Confirmar Password">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rolesUsuario">Roles</label>
                        <select  wire:model.lazy="rolesUsuario" name="rolesUsuario[]" id="rolesUsuario" class="form-control selectpicker"  data-style="btn-default" multiple title="Seleccione una o varias">
                            @foreach($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                        @error('rolesUsuario') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
            </div>
       </div>
    </div>
</div>
