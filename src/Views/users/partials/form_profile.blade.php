@if(!isset($user))
    {!! Form::hidden('attach[for_base]', auth()->id()) !!}
@endif
<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">

                <div class="row">
                    <div class="col-12">
                        <h3 class="kt-section__title kt-section__title-sm">{{ trans('meridien.profile.information') }}</h3>
                    </div>

                    <div class="col-9">
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.name') }} <span class="required"> * </span></label>
                            {!! Form::text('name', isset($user->name)? $user->name : NULL, ['class' => 'form-control', 'placeholder' => 'Nome', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.cpf_cnpj') }} </label>
                            {!! Form::text('cpf_cnpj', isset($user->cpf_cnpj)? $user->cpf_cnpj : NULL, ['class' => 'form-control', 'placeholder' => 'CPF/CNPJ']) !!}
                        </div>
                    </div>
@if(!isset($user) ||  $user->id != auth()->id())
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.roles') }} <span class="required"> * </span></label>
                            {{ Form::select('sync[roles][]', $roles, isset($user) ? $user->roles()->pluck('id') : null, ['class' => 'form-control kt-select2', 'required', 'multiple' => true]) }}
                        </div>
                    </div>
@endif
                    <div class="col-6">
                        <div class="form-group">
                            <label class="">{{ trans('meridien.status') }} <span class="required"> * </span></label>
                            {{ Form::select('status_id', $statuses, isset($user) ? $user->status_id : null, ['class' => 'form-control select2 kt-select2', 'required']) }}
                        </div>
                    </div>

                    @if(isset($user))
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">{{ trans('meridien.users.avatar') }}</label>
                                {!! Form::file('avatar', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    @endif

                    @if (isset($user))
                        @foreach ($user->options as $option)
                            @if (isset($option->group->name) && $option->group->name == ('profile'))
                                <div class="col-6">
                                    {!! option_input($user, $option) !!}
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
