@extends(config('cw_option.layout'))
@section('title', __('option::groups.groups'))
@section('content')

    @include('meridien::partials.kt_subheader', [
    'breadcrumb' => [
      '#' => __('option::groups.list')
    ],
    'buttons' => [
      route('admin.options.groups.create') => [
        'label' => __('option::groups.create'),
        'icon' => 'fa fa-plus'
      ],
      route('admin.options.groups.create') => [
        'label' => __('option::groups.create'),
        'icon' => 'fa fa-plus'
      ]
    ]
  ])
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ __($title ?? 'option::groups.list') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
					<span class="kt-section__info">
						{{ __('Listagem com todos os grupos de opções disponiveis para o sistema') }}
					</span>
                            <div class="kt-section__content">
                                @include('option::options.groups.partials.list')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
