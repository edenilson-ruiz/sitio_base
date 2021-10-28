<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="nombre">Nombre</label>
                            <input wire:model.lazy="nombre" type="text" class="form-control form-control-sm" id="nombre"
                                placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message
                                }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="apellido">Apellido</label>
                            <input wire:model.lazy="apellido" type="text" class="form-control form-control-sm" id="apellido"
                                placeholder="Apellido">@error('apellido') <span class="error text-danger">{{ $message
                                }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="correo">Correo</label>
                            <input wire:model.lazy="correo" type="text" class="form-control form-control-sm" id="correo"
                                placeholder="Correo">@error('correo') <span class="error text-danger">{{ $message
                                }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="telefono">Telefono</label>
                            <input type="text" wire:model.lazy="telefono" class="form-control form-control-sm" id="telefono" placeholder="Telefono"/>
                            @error('telefono')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="fecha_contratacion">Fecha Contratación</label>
                            <input type="text" wire:model.lazy="fecha_contratacion" class="form-control form-control-sm" id="fecha_contratacion" placeholder="Fecha Contratación"/>
                            @error('fecha_contratacion')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="foto">Seleccione foto para perfil</label>
                            <input type="file" class="form-control form-control-sm-file" id="foto">
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="direccion">Dirección</label>
                            <input type="text" wire:model.lazy="direccion" class="form-control form-control-sm" id="direccion" placeholder="Dirección"/>
                            @error('direccion')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="profesion">Profesion</label>
                            <select wire:model.lazy="profesion" name="profesion" id="profesion"
                                class="form-control form-control-sm selectpicker" data-style="btn-default"
                                title="Seleccione una o varias">
                                <option value="">Seleccione una profesion</option>
                                @foreach($profesiones as $row)
                                <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                @error('centrosAtencion') <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="cargo">Cargo</label>
                            <select wire:model.lazy="cargo" name="cargo" id="cargo"
                                class="form-control form-control-sm selectpicker" data-style="btn-default"
                                title="Seleccione una o varias">
                                <option value="">Seleccione un cargo</option>
                                @foreach($cargos as $row)
                                <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                @error('centrosAtencion') <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col">
                            <label for="centroAtencion">Centro de Atención</label>
                            <select wire:model.lazy="centroAtencion" name="centroAtencion" id="centroAtencion"
                                class="form-control form-control-sm selectpicker" data-style="btn-default"
                                title="Seleccione una o varias">
                                <option value="">Seleccione Centro</option>
                                @foreach($centros as $centro)
                                <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endforeach
                                @error('centrosAtencion') <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="areasAtencion">Areas de Atención</label>
                            <select wire:model.lazy="areasAtencion" name="areasAtencion[]" id="areasAtencion"
                                class="form-control form-control-sm selectpicker" data-style="btn-default" multiple
                                title="Seleccione una o varias">
                                @if(!is_null($areas))
                                    @foreach($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('areaAtencion') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>
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
