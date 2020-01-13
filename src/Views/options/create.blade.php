@extends(config('cw_option.layout'))
@section('title', __('option::options.create'))
@section('content')

    @include('meridien::partials.kt_subheader', [
    'breadcrumb' => [
      '#' => __('option::options.list')
    ],
    'buttons' => [
      route('admin.options.create') => [
        'label' => __('option::options.create'),
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
                                {{ __($title ?? 'option::options.create') }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            <span class="kt-section__info">
                                {{ __('Utilize o formulário abaixo para criar uma nova opção') }}
                            </span>
                            <div class="kt-section__content">
                                {!! Form::open(['route' => 'admin.options.store', 'class' => 'horizontal-form']) !!}
                                @include('option::options.partials.form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
