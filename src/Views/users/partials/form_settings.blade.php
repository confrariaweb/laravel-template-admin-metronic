<div class="kt-form kt-form--label-right">
    <div class="kt-form__body">
        <div class="kt-section kt-section--first">
            <div class="kt-section__body">
                <div class="row">
                    <div class="col-12">
                        <h1 class="kt-section__title">{{ trans('meridien.settings') }}</h1>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <h6>Configurações de notificações</h6>
                            <div class="kt-checkbox-list">
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                    {{ Form::checkbox('settings[notifications][]', 'database', isset($user->settings['notifications'])? in_array('database', ($user->settings['notifications'])) : false) }}
                                    {{ trans('meridien.Receber notificações no sistema') }}
                                    <span></span>
                                </label>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                    {{ Form::checkbox('settings[notifications][]', 'mail', isset($user->settings['notifications'])? in_array('mail', ($user->settings['notifications'])) : false) }}
                                    {{ trans('meridien.Receber notificações por email') }}
                                    <span></span>
                                </label>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                    {{ Form::checkbox('settings[notifications][]', 'nexmo', isset($user->settings['notifications'])? in_array('nexmo', ($user->settings['notifications'])) : false, ['disabled']) }}
                                    {{ trans('meridien.Receber notificações por sms') }}
                                    <span></span>
                                </label>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                    {{ Form::checkbox('settings[notifications][]', 'slack', isset($user->settings['notifications'])? in_array('slack', ($user->settings['notifications'])) : false, ['disabled']) }}
                                    {{ trans('meridien.Receber notificações por slack') }}
                                    <span></span>
                                </label>

                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                    {{ Form::checkbox('settings[notifications][]', 'telegram', isset($user->settings['notifications'])? in_array('telegram', ($user->settings['notifications'])) : false, ['disabled']) }}
                                    {{ trans('meridien.Receber notificações pelo telegram') }}
                                    <span></span>
                                    <br>
                                    <small>* Para esta opção é necessário enviar uma mensagem via Telegram informando seu email para @MeridienBot</small>
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <h6>Configurações de perfil e permissões</h6>
                            <div class="kt-checkbox-list">
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                    {{ Form::checkbox('settings[is_manager]', true, isset($user->settings['is_manager'])? true : false) }}
                                    {{ trans('meridien.É um gestor') }}
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
