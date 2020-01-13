<div class="btn-group btn-group-sm float-right" role="group" aria-label="...">
    @permission('users.show')
    <a href="{{ route('admin.users.show', $id) }}" data-placement="bottom"
       class="btn btn-clean btn-icon btn-label-primary btn-icon-md "
       title="Visualizar usuário" data-toggle="kt-tooltip">
        <i class="la la-eye"></i>
    </a>
    @endpermission
    @permission('users.edit')
    <a href="{{ route('admin.users.edit', $id) }}" data-placement="bottom"
       class="btn btn-clean btn-icon btn-label-success btn-icon-md "
       title="Editar usuário" data-toggle="kt-tooltip">
        <i class="la la-edit"></i>
    </a>
    @endpermission
    @permission('users.destroy')
    <a href="javascript:void(0);" data-placement="bottom"
       onclick="event.preventDefault();
           if(!confirm('Tem certeza que deseja deletar este item?')){ return false; }
           document.getElementById('delete-user-{{ $id }}').submit();"
       class="btn btn-clean btn-icon btn-label-danger btn-icon-md "
       title="Deletar usuário" data-toggle="kt-tooltip">
        <i class="la la-remove"></i>
    </a>
    <form
        action="{{ route('admin.users.destroy', $id) }}"
        method="POST" id="delete-user-{{ $id }}">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
    </form>
    @endpermission
</div>
