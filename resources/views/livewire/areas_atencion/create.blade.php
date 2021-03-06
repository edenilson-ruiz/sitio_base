<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Area de Atención</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nombre"></label>
                        <input wire:model.lazy="nombre" type="text" class="form-control" id="nombre"
                            placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tiempo_atencion_min"></label>
                        <input wire:model.lazy="tiempo_atencion_min" type="text" class="form-control" id="tiempo_atencion_min"
                            placeholder="Tiempo de atencion en minutos">@error('tiempo_atencion_min') <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion"></label>
                        <input wire:model.lazy="descripcion" type="text" class="form-control" id="descripcion"
                            placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message
                            }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="centros">Centros de Atención</label>
                        <select wire:model.lazy="centrosAtencion" name="centrosAtencion[]" id="centrosAtencion"
                            class="form-control selectpicker" data-style="btn-default" multiple
                            title="Seleccione una o varias">
                            @foreach($centros as $centro)
                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                            @endforeach
                        </select>
                        @error('centrosAtencion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
