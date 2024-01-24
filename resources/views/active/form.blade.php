<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('area_id', 'Área') }}
                    {{ Form::select('area_id', $areas, $active->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un área']) }}
                    {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('nombre') }}
                    {{ Form::text('name', $active->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Digita el nombre']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Categoría') }}
                    {{ Form::select('category_id', $categories, $active->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la categoría']) }}
                    {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('descripción') }}
                    {{ Form::textarea('description', $active->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Digita una descripción']) }}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Marca') }}
                    {{ Form::select('marca_id', $brands, $active->marca_id, ['class' => 'form-control' . ($errors->has('marca_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la marca']) }}
                    {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('serial') }}
                    {{ Form::text('serial', $active->serial, ['class' => 'form-control' . ($errors->has('serial') ? ' is-invalid' : ''), 'placeholder' => 'Digita el serial']) }}
                    {!! $errors->first('serial', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('placa interna') }}
                    {{ Form::text('placaInt', $active->placaInt, ['class' => 'form-control' . ($errors->has('placaInt') ? ' is-invalid' : ''), 'placeholder' => 'Digita la placa interna']) }}
                    {!! $errors->first('placaInt', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('ubicación') }}
                    {{ Form::select('ubication_id', $ubications, $active->ubication_id, ['class' => 'form-control' . ($errors->has('ubication_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona la ubicación']) }}
                    {!! $errors->first('ubication_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                
            </div>

            <div class="col-lg-6">

                <div class="form-group">
                    {{ Form::label('Poseedor') }}
                    {{ Form::select('owner_id', $owners, $active->owner_id, ['class' => 'form-control' . ($errors->has('owner_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona a un poseedor']) }}
                    {!! $errors->first('owner_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Acceso') }}
                    {{ Form::select('access_id', $access, $active->access_id, ['class' => 'form-control' . ($errors->has('access_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona el nivel de acceso']) }}
                    {!! $errors->first('access_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Fecha de ingreso') }}
                    {{ Form::date('dateAdmission', $active->dateAdmission, ['class' => 'form-control' . ($errors->has('dateAdmission') ? ' is-invalid' : ''), 'placeholder' => 'Fecha ingreso']) }}
                    {!! $errors->first('dateAdmission', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Fecha de salida') }}
                    {{ Form::date('departureDate', $active->departureDate, ['class' => 'form-control' . ($errors->has('departureDate') ? ' is-invalid' : ''), 'placeholder' => 'Fecha salida']) }}
                    {!! $errors->first('departureDate', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Observaciones') }}
                    {{ Form::text('actualizacion', $active->actualizacion, ['class' => 'form-control' . ($errors->has('actualizacion') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese una actualización']) }}
                    {!! $errors->first('actualizacion', '<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
        </div>
    </div>
</div>
