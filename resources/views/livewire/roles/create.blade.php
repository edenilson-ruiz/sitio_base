<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name"></label>
                        <input wire:model.lazy="name" type="text" class="form-control"
                            placeholder="Nombre">@error('name') <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <strong>Permisos disponibles:</strong>
                        <br>
                        <table>
                            @foreach ($permissions->chunk(4) as $permission)
                            <tr>
                                @foreach($permission as $value)
                                <td>
                                    <div class="form-check">
                                        <input wire:model.lazy="userPermissions" name="userPermissions[]"
                                            type="checkbox" class="form-check-input" id="{{ $value->name }}{{ $value->id }}" value="{{ $value->id }}">
                                        <label class="form-check-label" for="{{ $value->name }}{{ $value->id }}">{{ $value->name }}</label>
                                        @error('userPermissions') <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
