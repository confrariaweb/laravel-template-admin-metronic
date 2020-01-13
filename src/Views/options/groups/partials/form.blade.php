<div class="form-group">
    <label class="control-label">
        {{ __('option::groups.name') }}
        <span class="required"> * </span>
    </label>
    {!! Form::text('name', isset($group)? $group->name : null, ['class' => 'form-control', 'placeholder' => __('option::groups.name'), 'required']) !!}
</div>

@includeIf('vendor::partials.buttons_form', ['nameRoute' => 'options.groups'])
