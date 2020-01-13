<div class="btn-group btn-group-sm float-right" role="group" aria-label="...">

    <a href="http://intranet.meridienclube.com.br/intranet.php?load=Modulos-intranet-SAC-PesquisaAssociado"
       target="_blank"
       data-placement="bottom" class="btn btn-clean btn-icon btn-label-primary btn-icon-md "
       title="Extrato"
       data-toggle="kt-tooltip">
        <i class="la la-external-link"></i>
    </a>

    @permission('users.show')
    <a href="javascript:void(0);" data-placement="bottom"
       class="btn btn-clean btn-icon btn-label-primary btn-icon-md show"
       title="Visualizar usuário" data-toggle="kt-tooltip">
        <i class="la la-eye"></i>
    </a>
    @endpermission

    @permission('users.edit')
    <a href="javascript:void(0);" data-placement="bottom"
       class="btn btn-clean btn-icon btn-label-success btn-icon-md edit"
       title="Editar usuário" data-toggle="kt-tooltip">
        <i class="la la-edit"></i>
    </a>
    @endpermission

    @permission('users.destroy')
    <a href="javascript:void(0);" data-placement="bottom"
       class="btn btn-clean btn-icon btn-label-danger btn-icon-md destroy"
       title="Deletar usuário" data-toggle="kt-tooltip">
        <i class="la la-remove"></i>
    </a>
    <form action="#" method="POST" id="delete-user-id">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
    </form>
    @endpermission
</div>
