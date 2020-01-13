@extends('meridien::layouts.metronic')
@section('title', 'Pessoas')
@section('content')

    @include('meridien::partials.kt_subheader', [
      'breadcrumb' => [
        route('admin.users.index') => 'Lista de Pessoas',
        '#' => 'Editar Pessoa'
      ],
      'buttons' => [
        route('admin.users.index') => [
          'label' => trans('meridien.return'),
          'icon' => 'flaticon2-back'
        ]
      ]
    ])

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'files' => true, 'method' => 'put', 'class' => 'horizontal-form']) !!}
        @include('meridien::users.partials.form')
        {!! Form::close() !!}
    </div>

@endsection

@include('meridien::users.partials.kt_aside')
