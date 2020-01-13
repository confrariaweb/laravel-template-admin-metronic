<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">

                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <h3 class="kt-section__title kt-section__title-sm">{{ trans('meridien.password') }}</h3>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.email') }}</label>
                            {!! Form::email('email', isset($user->email)? $user->email : NULL, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.password.current') }}</label>
                            {!! Form::password('password_current', ['class' => 'form-control', 'placeholder' => '********']) !!}
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.password') }}</label>
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********']) !!}
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label class="form-label">{{ trans('meridien.users.password.confirmation') }}</label>
                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '********']) !!}
                        </div>
                    </div>

                </div>

                <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                    <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                    <div class="alert-text">Alteração de senha deve conter a senha atual e tambem sua confirmação!</div>
                </div>

            </div>
        </div>
    </div>
</div>
