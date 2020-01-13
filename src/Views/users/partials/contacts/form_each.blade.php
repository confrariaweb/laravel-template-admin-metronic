@php
    $index = isset($index)? $index : 0;
    $nameSelect = 'sync[contacts][' . $index . '][type_id]';
    $nameText = 'sync[contacts][' . $index . '][content]'
@endphp
<div class="row user_contact_field" data-index="{{ $index  }}">
    <div class="col-lg-4 col-xl-4">
        <div class="form-group">
            {{ Form::select($nameSelect, $contact_types, (isset($contact->type) && !isset($empty))? $contact->type_id : NULL, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-lg-6 col-xl-6">
        <div class="form-group">
            {!! Form::text($nameText, (isset($contact) && !isset($empty))? $contact->content : NULL, ['class' => 'form-control', 'placeholder' => 'Valor']) !!}
        </div>
    </div>
    <div class="col-lg-2 col-xl-2">
        <div class="btn-group" role="group" aria-label="">
            <button type="button" class="btn btn-danger btn-sm user_contact_field_remove">
                <i class="flaticon2-trash"></i>
            </button>
        </div>
    </div>
</div>
