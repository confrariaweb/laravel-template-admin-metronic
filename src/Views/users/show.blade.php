@extends('meridien::layouts.metronic')
@section('title', trans('meridien.users'))

@section('content')

    @include('meridien::partials.kt_subheader', ['breadcrumb' => $breadcrumb, 'buttons' => $buttons])
    @includeIf('meridien::partials.modal_new_plan', ['user' => $user])

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>
            @include('meridien::users.partials.profile_aside')
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-12">
                        @includeIf($page)
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@include('meridien::users.partials.kt_aside')
