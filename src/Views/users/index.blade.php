@extends('meridien::layouts.metronic')
@section('title', 'Pessoas')

@section('content')
    @inject('stepInject', 'MeridienClube\Meridien\Services\Injections\StepInjectService')
    @inject('userInject', 'MeridienClube\Meridien\Services\Injections\UserInjectService')
  @include('meridien::partials.kt_subheader', [
    'breadcrumb' => [
      '#' => 'Lista de Pessoas'
    ],
    'buttons' => [
      route('admin.users.create') => [
        'label' => 'Nova Pessoa',
        'icon' => 'fa fa-plus'
      ]
    ]
  ])
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-md-12">
        @include('meridien::users.partials.filter')
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @include('user::partials.list')
      </div>
    </div>
  </div>
@endsection

@include('templatemetronic::users.partials.kt_aside')
