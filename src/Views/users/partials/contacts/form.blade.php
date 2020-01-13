<div class="kt-portlet">
    <div class="kt-portlet__head" id="contacts_form">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ trans('meridien.profile.contacts') }}
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        @if(isset($user) && !isset($formNot))
            @php
                $index = 1;
            @endphp
            @foreach($user->contacts as $contact)
                @include('meridien::users.partials.contacts.form_each', ['index' => $loop->iteration])
                @php
                    $index++;
                @endphp
            @endforeach
        @endif
        @include('meridien::users.partials.contacts.form_each', ['index' => isset($index)? $index : 0, 'empty' => true])
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
    @includeWhen(isset($form_actions) && $form_actions, 'meridien::partials.portlet_footer_form_actions')
</div>

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
