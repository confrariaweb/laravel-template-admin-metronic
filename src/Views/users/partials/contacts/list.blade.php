<div class="kt-portlet">
    <div class="kt-portlet__head" id="user_contacts">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">{{ trans('meridien.users.contacts') }}</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="table-responsive-md">
            <table class="contacts_table table table-striped">
                <thead>
                <tr>
                    <th>{{ trans('meridien.users.contact.type') }}</th>
                    <th>{{ trans('meridien.users.contact.value') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user->contacts as $contact)
                    <tr>
                        <td>{{ $contact->type->name }}</td>
                        <td>{{ $contact->content }}</td>
                        <td>
                            @permission('users.destroy')
                            <a href="javascript:void(0);"
                               onclick="event.preventDefault();
                                   if(!confirm('Tem certeza que deseja deletar este item?')){ return false; }
                                   document.getElementById('delete-user-{{ $contact->id }}').submit();"
                               class="btn btn-clean btn-icon btn-label-danger btn-icon-md"
                               title="Deletar">
                                <i class="la la-remove"></i>
                            </a>
                            <form
                                action="{{ route('admin.users.contact.destroy', ['user_id' => $user->id, 'contact_id' => $contact->id]) }}"
                                method="POST" id="delete-user-{{ $contact->id }}">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                            </form>
                            @endpermission
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


{!! Form::open(['route' => ['users.contact.store', $user->id], 'class' => 'horizontal-form']) !!}
@include('meridien::users.partials.contacts.form', ['form_actions' => $form_actions, 'formNot' => true])
{!! Form::close() !!}

