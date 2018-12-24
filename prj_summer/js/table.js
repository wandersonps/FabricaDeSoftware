

$(document).ready(function () {

    $(".os-table-todas").DataTable({
        "order": [[0, "desc"]],
        "lengthMenu": [5,10,15,20,25,30,40, 60, 80, 100],
        "pageLength": 5,
        "paging": true,
        "columnDefs": [
            {"searchable": true, "targets": 0},
            {"searchable": true, "targets": 1},
            {"searchable": true, "targets": 2},


        ],
        "language": {
            "sEmptyTable": "Nenhuma OS encontrada",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ OS",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 OS",
            "sInfoFiltered": "(Filtrados de _MAX_ OS)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ OS por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
             "searchPlaceholder": "Id,Nome Cliente ou Data ",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }

    });

    $(".os-table-finalizadas").DataTable({
        "order": [[0, "desc"]],
        "lengthMenu": [5,10,15,20,25,30,40, 60, 80, 100],
        "pageLength": 5,
        "paging": true,
        "columnDefs": [
            {"searchable": true, "targets": 0},
            {"searchable": true, "targets": 1},
            {"searchable": true, "targets": 2},


        ],
        "language": {
            "sEmptyTable": "Nenhuma OS encontrada",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ OS",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 OS",
            "sInfoFiltered": "(Filtrados de _MAX_ OS)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ OS por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
             "searchPlaceholder": "Id,Nome Cliente ou Data ",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }

    });
    
    $(".os-table-andamento").DataTable({
        "order": [[0, "desc"]],
        "lengthMenu": [5,10,15,20,25,30,40, 60, 80, 100],
        "pageLength": 5,
        "paging": true,
        "columnDefs": [
            {"searchable": true, "targets": 0},
            {"searchable": true, "targets": 1},
            {"searchable": true, "targets": 2},


        ],
        "language": {
            "sEmptyTable": "Nenhuma OS encontrada",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ OS",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 OS",
            "sInfoFiltered": "(Filtrados de _MAX_ OS)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ OS por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
             "searchPlaceholder": "Id,Nome Cliente ou Data ",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }

    });

    $(".os-table-pendentes").DataTable({
        "order": [[0, "desc"]],
        "lengthMenu": [5,10,15,20,25,30,40, 60, 80, 100],
        "pageLength": 5,
        "paging": true,
        "columnDefs": [
            {"searchable": true, "targets": 0},
            {"searchable": true, "targets": 1},
            {"searchable": true, "targets": 2},


        ],
        "language": {
            "sEmptyTable": "Nenhuma OS encontrada",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ OS",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 OS",
            "sInfoFiltered": "(Filtrados de _MAX_ OS)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ OS por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
             "searchPlaceholder": "Id,Nome Cliente ou Data ",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }

    });
    
    
    $(".os-user-table").DataTable({
        "order": [[0, "asc"]],
        "paging": true,
        "lengthMenu": [5,10,15,20,25,30,40, 60, 80, 100],
        "pageLength": 5,
        "columnDefs": [
            {"searchable": true, "targets": 0},
            {"searchable": true, "targets": 1},
            {"searchable": true, "targets": 2}


        ],
        "language": {
            "sEmptyTable": "Nenhum usuário encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ usários",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 Usuários",
            "sInfoFiltered": "(Filtrados de _MAX_ OS)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Usuários por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
            "searchPlaceholder": "Nome,Login ou Perfil ",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }

    });

     $(".os-cliente-table").DataTable({
        "order": [[0, "asc"]],
        "paging": true,
        "lengthMenu": [5,10,15,20,25,30,40, 60, 80, 100],
        "pageLength": 5,
        "columnDefs": [
            {"searchable": true, "targets": 0},
            {"searchable": true, "targets": 1},
            {"searchable": true, "targets": 2}


        ],
        "language": {
            "sEmptyTable": "Nenhum cliente encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ cliente",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 Clientes",
            "sInfoFiltered": "(Filtrados de _MAX_ OS)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Cliente por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
            "searchPlaceholder": "Nome ou CPF",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }

    });
});


