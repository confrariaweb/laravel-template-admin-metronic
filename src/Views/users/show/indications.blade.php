@if($user->indicator->first())
    <div class="alert alert-light alert-elevate fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text">
            Este foi indicado por {{ $user->indicator->first()->name ?? '' }}
        </div>
    </div>
@endif

{!! Form::open(['route' => ['users.indicate.store', $user->id], 'class' => 'horizontal-form']) !!}
{!! Form::hidden('status_id', 1) !!}
<div class="kt-portlet">
    <div class="kt-portlet__head" id="integrations">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{ trans('meridien.users.indications') }}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="table-responsive-md">
            <table class="contacts_table table table-striped">
                <thead>
                <tr>
                    <th>{{ trans('meridien.users.name') }}</th>
                    <th>{{ trans('meridien.users.contacts') }}</th>
                    <th>{{ trans('meridien.users.date') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user->indications as $indicated)
                    <tr>
                        <td>{{ $indicated->name }}</td>
                        <td>
                            @if($indicated->contacts)
                                @foreach($indicated->contacts as $contact)
                                    <p>{{ $contact->type->name }} : {{ $contact->content }}</p>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $indicated->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <h4 class="title">{{ trans('meridien.users.form.indication') }}</h4>
            <div class="row">
                <div class="col-9">
                    <div class="form-group">
                        <label class="form-label">{{ trans('meridien.users.name') }}</label>
                        {!! Form::text('name', NULL, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label class="">{{ trans('meridien.users.cpf_cnpj') }}</label>
                        {!! Form::text('cpf_cnpj', NULL, ['class' => 'form-control', 'placeholder' => trans('meridien.users.cpf_cnpj')]) !!}
                    </div>
                </div>
            </div>
            <div class="row user_contact_field" data-index="0">
                <div class="col-4">
                    <div class="form-group">
                        {{ Form::select('sync[contacts][0][type_id]', $contact_types, NULL, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group">
                        {!! Form::text('sync[contacts][0][content]', NULL, ['class' => 'form-control', 'placeholder' => 'Valor']) !!}
                    </div>
                </div>
                <div class="col-1">
                    <div class="btn-group" role="group" aria-label="">
                        <button type="button" class="btn btn-danger btn-sm user_contact_field_remove">
                            <i class="flaticon2-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div id="user_contact_fields"></div>
            <div class="row">
                <div class="col-lg-10 col-xl-10"></div>
                <div class="col-lg-2 col-xl-2">
                    <div class="btn-group" role="group" aria-label="">
                        <button type="button" class="btn btn-primary btn-sm" id="user_contact_field_add">
                            <i class="flaticon2-add"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('meridien::partials.portlet_footer_form_actions', ['cancel' => route('admin.users.index')])
</div>
{!! Form::close() !!}

@push('scripts')
    <script>
        $(document).on('click', '#user_contact_field_add', function (e) {
            e.preventDefault();
            var user_contact_field = $('.user_contact_field:last');
            var index = user_contact_field.attr('data-index');
            index = parseInt(index) + 1;
            var html = user_contact_field.clone();
            html.attr('data-index', index);
            html.find('select').each(function () {
                this.name = 'sync[contacts][' + index + '][type_id]';
            });
            html.find('input[type=text]').each(function () {
                this.name = 'sync[contacts][' + index + '][content]';
                this.value = '';
            });
            html.appendTo($('#user_contact_fields'));
        });
        $(document).on('click', '.user_contact_field_remove', function (e) {
            $(this).parents('.user_contact_field').remove();
        });
    </script>
@endpush
