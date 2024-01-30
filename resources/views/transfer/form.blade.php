<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6">

                <div class="form-group">
                    {{ Form::label('Cuentadante Actual') }}
                    {{ Form::select('owner_id', $owners, $transfer->owner_id, ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona a un cuentadante']) }}
                    {!! $errors->first('owner_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
            </div>

            <div class="col-lg-6">

                <div class="form-group">
                    {{ Form::label('Nuevo Cuentadante') }}
                    {{ Form::select('new_owner_id', $owners, $transfer->owner_id, ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona a un cuentadante']) }}
                    {!! $errors->first('new_owner_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
            </div>

            <div class="col-lg-12">
                <h3>Elementos a trasladar</h3>    
                <div class="col-lg-12">
                    <div class="form-group">
                        <select multiple="multiple" size="20" name="actives_duallistbox[]" title="duallistbox_demo1[]">
                            @foreach($actives as $active)
                                <option value="{{$active->id}}">{{$active->placaInt}} - {{$active->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- using https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox -->

    <script>
        var demo1 = $('select[name="actives_duallistbox[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'Activos Disponibles',
            selectedListLabel: 'Activos Seleccionados',
            preserveSelectionOnMove: 'moved',
            moveAllLabel: 'Mover todo',
            removeAllLabel: 'Remover todo'
        });
        $("#demoform").submit(function() {
            alert($('[name="duallistbox_demo1[]"]').val());
            return false;
        });
    </script>
</div>