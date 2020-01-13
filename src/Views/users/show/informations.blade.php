<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ trans('meridien.general.information') }}
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget12">
            <div class="kt-widget12__content">
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Status</span>
                        <span class="kt-widget12__value">{{ $user->status->name ?? ''}}</span>
                    </div>

                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Nome</span>
                        <span class="kt-widget12__value">{{ $user->name ?? ''}}</span>
                    </div>
                </div>
                <div class="kt-widget12__item">
                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Etapa</span>
                        <span
                            class="kt-widget12__value">{{ $user->steps->implode('name', ', ') ?? ''}}</span>
                    </div>

                    <div class="kt-widget12__info">
                        <span class="kt-widget12__desc">Email</span>
                        <span class="kt-widget12__value">{{ $user->email ?? ''}}</span>
                    </div>
                </div>
                <div class="kt-widget12__item">
                    @if ($user->options)
                        @foreach($user->optionsValues as $userOption)
                            <div class="kt-widget12__info">
                                <span class="kt-widget12__desc">{{ $userOption->label }}</span>
                                <span class="kt-widget12__value">{{ $userOption->pivot->content ?? ''}}</span>
                            </div>
                            @if($loop->iteration % 2 == 0)
                </div>
                <div class="kt-widget12__item">
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
