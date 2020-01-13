<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="alert alert-solid-info alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                    <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                    <div class="alert-text">Indique abaixo para a base de quem vai este usuário!</div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h3 class="kt-section__title kt-section__title-sm">{{ trans('meridien.base') }}</h3>
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.base.owner') }}</label>
                            {{ Form::select('attach[base]', $employees->prepend('Escolha uma opção', ''), isset($user) ? $user->baseOwner->pluck('id') : null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
