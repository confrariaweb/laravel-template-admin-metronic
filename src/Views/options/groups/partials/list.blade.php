<table class="table table-striped" id="options_datatable">
    <thead>
    <tr>
        <th>{{ __('option::groups.name') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>
                @if (Route::current()->getName() != 'options.trashed')
                    @include('vendor::partials.buttons_datatable', ['obj' => $group, 'nameRoute' => 'admin.options.groups'])
                @else
                    Deletado em @datetime($group->deleted_at)
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


@push('scripts')
    <script>
        $(document).ready(function () {
            $('#options_datatable').DataTable();
        });
    </script>
@endpush
