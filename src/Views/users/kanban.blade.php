@extends('meridien::layouts.metronic')
@section('title', 'Kanban de Pessoas')
@section('content')
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
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ trans('meridien.users.kanban') }}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            @can('isManager', auth()->user())
                                {{ Form::select('employees', $employees, auth()->id(), ['class' => 'form-control']) }}
                            @endcan
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div id="kanban"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('meridien::users.partials.kt_aside')

@push('styles')
    <link href="{{ asset('vendor/meridienclube/laravel-meridien/plugins/custom/kanban/kanban.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <style>
        .kanban-container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .kanban-container .kanban-board {
            width: calc((100% /{{ $steps->count() }}) - 4px) !important;
            border-radius: 4px;
            margin: 2px !important;
            background-color: #f7f8fa;
        }

        .kanban-container .kanban-board:first-child {
            margin-left: 0px !important;
        }

        .kanban-container .kanban-board:last-child {
            margin-right: 0px !important;
        }

        .kanban-board header .kanban-title-button {
            padding: 0px !important;
        }

    </style>
@endpush

@push('scripts')
    <script src="{{ asset('vendor/meridienclube/laravel-meridien/plugins/custom/kanban/kanban.bundle.js') }}" type="text/javascript"></script>
    <script>

        $("select[name=employees]").on('change', function () {
            let employee = $(this).val();
            //console.log("Valor Escolhido foi: "+employee);
            $('#kanban').html('');
            showKanban(employee);
        });

        $(document).ready(function () {
            showKanban({{ auth()->id() }});
        });

        function showKanban(user_id) {
            //console.log(user_id)
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.users.json.kanban') }}',
                dataType: 'json',
                data: {'user_id': user_id},
                success: function (data) {
                    //console.log(data);
                    var kanban = new jKanban({
                        element: '#kanban',
                        boards: data,
                        gutter: '15px',
                        widthBoard: '250px',
                        responsivePercentage: false,
                        dragItems: true,
                        dragBoards: true,
                        addItemButton: false,
                        buttonContent: '+',
                        itemHandleOptions: {
                            enabled: false,
                            handleClass: "item_handle",
                            customCssHandler: "drag_handler",
                            customCssIconHandler: "drag_handler_icon",
                            customHandler: "<span class='item_handle'>+</span> %s"
                        },
                        click: function (el) {
                            var user_id = $(el).data('data-userid');
                            window.location.replace("{{ url()->to('users')  }}/" + user_id);
                        },
                        dragEl: function (el, source) {
                        },
                        dragendEl: function (el) {
                        },
                        dropEl: function (el, target, source, sibling) {
                            var user_id = $(el).data('data-userid');
                            var step_id = target.parentElement.getAttribute('data-id');
                            $.post("{{ route('admin.users.update.step') }}",
                                {
                                    user_id: user_id,
                                    step_id: step_id
                                },
                                function (data, status) {
                                    //console.log(data);
                                });
                        },
                        dragBoard: function (el, source) {
                        },
                        dragendBoard: function (el) {
                        },
                        buttonClick: function (el, boardId) {
                            var formItem = document.createElement("form");
                            formItem.setAttribute("class", "itemform ");
                            formItem.setAttribute("style", "height: 120px");
                            formItem.innerHTML = '<div class="form-group" style="padding-bottom: 4px; margin-bottom: 4px">' +
                                '<label>Nome</label>' +
                                '<textarea class="form-control" rows="1" autofocus></textarea>' +
                                '</div>' +
                                '<div class="clear ">' +
                                '<button type="button" id="CancelBtn" class="btn btn-danger btn-sm pull-right">-</button>' +
                                '<button type="submit" class="btn btn-primary btn-sm pull-right">+</button>' +
                                '</div>';
                            //kanban.addForm(boardId, formItem);
                            var board = kanban.element.querySelector(
                                '[data-id="' + boardId + '"] .kanban-drag'
                            );
                            var _attribute = formItem.getAttribute("class");
                            formItem.setAttribute("class", _attribute + " not-draggable");
                            board.prepend(formItem);
                            formItem.addEventListener("submit", function (e) {
                                e.preventDefault();
                                var text = e.target[0].value;

                                $.post("{{ route('admin.users.update.step') }}",
                                    {
                                        user_id: user_id,
                                        step_id: step_id
                                    },
                                    function (data, status) {
                                        //console.log(data);
                                    });

                                kanban.addElement(boardId, {
                                    title: text
                                });
                                formItem.parentNode.removeChild(formItem);
                            });
                            document.getElementById("CancelBtn").onclick = function () {
                                formItem.parentNode.removeChild(formItem);
                            };
                        }
                    });
                },
                error: function (response, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    </script>
@endpush
