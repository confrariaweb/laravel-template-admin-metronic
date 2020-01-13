<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                {{ trans('meridien.users.list') }}
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <h5 class="kt-font-brand kt-font-bold"></h5>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-section">
            <div class="kt-section__content">
                <table id="datatable_users" class="table table-striped table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>{{ trans('meridien.users.last.contact') }}</th>
                        <th>{{ trans('meridien.users.name') }}</th>
                        <th>{{ trans('meridien.users.roles') }}</th>
                        <th>{{ trans('meridien.users.steps') }}</th>
                        <th>{{ trans('meridien.users.contacts') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>{{ trans('meridien.users.last.contact') }}</th>
                        <th>{{ trans('meridien.users.name') }}</th>
                        <th>{{ trans('meridien.users.roles') }}</th>
                        <th>{{ trans('meridien.users.steps') }}</th>
                        <th>{{ trans('meridien.users.contacts') }}</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div style="display: none" id="btnsUser">
    @include('meridien::users.partials.buttons')
</div>

@push('scripts')
    <script>

        $(document).ready(function () {

            //$.fn.dataTable.ext.errMode = 'throw';

            var table = $('#datatable_users').DataTable({

                "initComplete": function(settings, json) {
                    $('#datatable_users tr td:nth-child(3)').each(function() {
                        var str = $(this).html().toString();
                        var stradmin = str.indexOf("Administrador");
                        var stragreement = str.indexOf("Convênio");
                        var strassociated = str.indexOf("Associado");
                        var strmanager = str.indexOf("Gerente");
                        var strprospect = str.indexOf("Prospect");
                        var strsales = str.indexOf("Agente de Vendas");
                        if(stradmin > -1) {
                            $(this).html(str.replace('Administrador', '<span class="admin">Administrador</span>'))
                        }
                        if(stragreement > -1) {
                            $(this).html(str.replace('Convênio', '<span class="agreement ">Convênio</span>'))
                        }
                        if(strassociated > -1) {
                            $(this).html(str.replace('Associado', '<span class="associated">Associado</span>'))
                        }
                        if(strmanager > -1) {
                            $(this).html(str.replace('Gerente', '<span class="manager">Gerente</span>'))
                        }
                        if(strprospect > -1) {
                            $(this).html(str.replace('Prospect', '<span class="prospect">Prospect</span>'))
                        }
                        if(strsales > -1) {
                            $(this).html(str.replace('Agente de Vendas', '<span class="sales">Agente de Vendas</span>'))
                        }
                    });
                },

                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('api/users/datatable?api_token=' . auth()->user()->api_token) }}",
                "order": [
                    [ 1, "asc" ]
                ],
                "columns": [
                    {"data": "last_task", "name": "last_task"},
                    {"data": "name", "name": "name"},
                    {"data": "roles", "render": "[, ].name", "name": "roles"},
                    {"data": "steps", "render": "[, ].name", "name": "steps"},
                    {"data": "contacts", "render": "[, ].content", "name": "contacts"},
                    { defaultContent: $('#btnsUser').html() }
                ],
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    }
                }
            });

            $('#column1_search').on( 'keyup', function () {
                table.columns(1).search(this.value).draw();
            });
            $('#column2_search').on( 'keyup', function () {
                table.columns(2).search(this.value).draw();
            });
            $('#column3_search').on( 'change', function () {
                table.columns(3).search(this.value).draw();
            });
            $('#column4_search').on( 'change', function () {
                table.columns(4).search(this.value).draw();
            });

            $('#datatable_users tbody').on('click', '.show', function () {
                var row = $(this).closest('tr');
                var userID = table.row(row).data()["id"];
                window.location.href = "/users/" + userID;
            });

            $('#datatable_users tbody').on('click', '.edit', function () {
                var row = $(this).closest('tr');
                var userID = table.row(row).data()["id"];
                window.location.href = "/users/" + userID + '/edit';
            });

            $('#datatable_users tbody').on('click', '.destroy', function (event) {
                event.preventDefault();
                var row = $(this).closest('tr');
                var userID = table.row(row).data()["id"];
                var formDestroy = $('#delete-user-id');
                if(confirm('Tem certeza que deseja deletar este item?')) {
                    formDestroy.attr('action', "/users/" + userID);
                    formDestroy.submit();
                }
            });

        });
    </script>
@endpush
