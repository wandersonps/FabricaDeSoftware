
$(document).ready(function () {

//Ajax login
    $('#form-login').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "controllers/logar.php",
            data: dados,
            success: function (result) {
                if (result == 1) {

                    location.href = '/prj_summer/views/home.php';
                } else if (result == 3) {
                    $("#msgerro").fadeIn(1500, function () {
                        window.setTimeout(function () {
                            $('#msgerro').fadeOut();
                        }, 10000);
                    });
                } else if (result == 2) {
                    $("#msgerrostatus").fadeIn(1500, function () {
                        window.setTimeout(function () {
                            $('#msgerrostatus').fadeOut();
                        }, 10000);
                    });
                }
            }
        });
        return false;
    });


//Ajax Cadastro de Usuario

    $('#cadastro-usuario').submit(function () {
        var dados = jQuery(this).serialize();
        if ($('#senha').val() === $('#senha2').val()) {
            $.ajax({
                type: "POST",
                url: "/prj_summer/controllers/usuarioDAO.php",
                data: dados,
                success: function (result) {

                    if (result == -1) {
                        $("#msgerro-same-login").fadeIn(2000, function () {
                            window.setTimeout(function () {
                                $('#msgerro-same-login').fadeOut();
                            }, 2500);

                        });
                    } else {
                        $("#load").html("<img src='/prj_summer/images/load.gif'>");
                        $("#load").fadeIn(100, function () {
                            window.setTimeout(function () {
                                $('#cadastro-usuario').find('input:text').val('');
                                $('#cadastro-usuario').find('input:password').val('');
                                $('#load').fadeOut();
                            }, 1400);
                        });
                        $("#msgsucessouser").fadeIn(1500, function () {
                            $("#msgsucessouser").focus();
                            window.setTimeout(function () {
                                $('#msgsucessouser').fadeOut();
                                location.reload();

                            }, 2500);
                           
                        });
                    }
                }
            });
        } else {

            var field = document.getElementById('senha2');
            $('#senha2').focus();
            $('#msgerrosenha').fadeIn();

        }
        
        return false;

    });
    
 
//Ajax renderiza a pagina que edita usuario

    $(document).on('click', '.edit-user', function () {
        var idUsuarios = $(this).closest('td').find('.idUsuarios').text();
        $('#page-edita').fadeOut(0, function () {
            $('#page-edita').load('/prj_summer/views/update-user.php?id=' + idUsuarios, function () {
                $('#page-edita').fadeIn(0);
                $('#update-user').focus();
            });
        });
    });


// ajax update do usuario

    $(document).on('submit', '#update-user', function () {
        var update = jQuery(this).serialize();

        if ($('#senha-edit').val() === $('#senha-edit-2').val()) {
            $.ajax({
                type: "POST",
                url: "/prj_summer/controllers/usuario-update.php",
                data: update,
                success: function (data) {
                    $('#update-user').hide();
                    $("#msgsucesso-user-update").fadeIn(150, function () {
                        window.setTimeout(function () {
                            $('#msgsucesso-user-update').fadeOut();
                        }, 3999);
                    });

                }
            });
        } else {
            var field = document.getElementById('senha-edit-2');
            field.value = field.defaultValue;
            $('#senha-edit-2').focus();
            $('#msgerro-update-senha').fadeIn();

        }
        return false;
    });


    //Ajax desabilitar o usuario

    $(document).on('click', '.desabilitar-usuario', function () {
        var idUsuarios = $(this).closest('td').find('.idUsuarios').text();
        var $this = $(this);
        $.ajax({
            url: '/prj_summer/controllers/desabilita-usuario.php', //This is the current doc
            type: "POST",
            data: ({idUsuarios: idUsuarios}),
            success: function (result) {

                if (result == 1) {
                    $("#msgsucesso-usuario-status").fadeIn(1500, function () {
                        $this.addClass('hidden');
                        $this.closest('td').find('.edit-user').addClass('hidden');
                        $this.closest('td').find('.habilitar-usuario').removeClass('hidden');

                        window.setTimeout(function () {
                            $('#msgsucesso-usuario-status').fadeOut();
                        }, 2500);
                    });
                } else if (result == 0) {
                    $("#msgerror-usuario-status").fadeIn(1500, function () {
                        $("#msgerror-usuario-status").focus();
                        window.setTimeout(function () {
                            $('#msgerror-usuario-status').fadeOut();
                        }, 2500);
                    });
                }
            }
        });

    });

    //Ajax habilitar o usuario
    $(document).on('click', '.habilitar-usuario', function () {
        var idUsuarios = $(this).closest('td').find('.idUsuarios').text();

        $(this).addClass('hidden');
        $(this).closest('td').find('.edit-user').removeClass('hidden');
        $(this).closest('td').find('.desabilitar-usuario').removeClass('hidden');

        $.ajax({
            url: '/prj_summer/controllers/habilita-usuario.php', //This is the current doc
            type: "POST",
            data: ({idUsuarios: idUsuarios}),
            success: function (data) {
                $("#msgsucesso-usuario-status").fadeIn(1500, function () {
                    $("#msgsucesso-usuario-status").focus();
                    window.setTimeout(function () {
                        $('#msgsucesso-usuario-status').fadeOut();
                    }, 2500);
                });
            }
        });

    });

//Ajax do cadastro de cliente
    $('#cadastro-cliente-form').submit(function () {
        $("#load").html("<img src='/prj_summer/images/load.gif'>");
        $("#load").fadeIn(100, function () {
            window.setTimeout(function () {
                $('#cadastro-cliente').find('input:text').val('');
                $('#load').fadeOut();
            }, 1400);
        });
        var dados = jQuery(this).serialize();

        $.ajax({
            type: "POST",
            url: "/prj_summer/controllers/clienteDAO.php",
            data: dados,
            success: function (data) {
                $("#msgsucessoclient").fadeIn(1500, function () {
                    $("#msgsucessoclient").focus();
                    window.setTimeout(function () {
                        $('#msgsucessoclient').fadeOut();
                    }, 2500);
                });
            }
        });

        return false;

    });


    //Ajax renderiza a pagina que edita cliente

    $(document).on('click', '.edit-cliente', function () {
        var cpf = $(this).closest('td').find('.cpf').text();
        $('#page-edita-cliente').fadeOut(0, function () {
            $('#page-edita-cliente').load('/prj_summer/views/update-cliente.php?id=' + cpf, function () {
                $('#page-edita-cliente').fadeIn(0);
                $('#update-cliente').focus();
            });
        });
    });




    //ajax update do cliente
    $(document).on('submit', '#update-cliente', function () {
        var update = jQuery(this).serialize();

        $.ajax({
            type: "POST",
            url: "/prj_summer/controllers/cliente-update.php",
            data: update,
            success: function (data) {
                $('#update-cliente').hide();
                $("#msgsucesso-cliente-update").fadeIn(300, function () {
                    window.setTimeout(function () {
                        $('#msgsucesso-cliente-update').fadeOut();

                    }, 3999);
                });
            }
        });
        return false;
    });


//Ajax do cadastro de OS
    $('#cadastro-os').submit(function () {
        var dados = jQuery(this).serialize();
        $.ajax({
            type: "POST",
            url: "/prj_summer/controllers/osDAO.php",
            cache: false,
            data: dados,
            success: function (result) {

                if (result == 3) {
                    $(".bs-os-modal-lg").animate({scrollTop: 0}, "slow");
                    $("#msgerro-os").fadeIn(150, function () {
                        window.setTimeout(function () {
                            $('#msgerro-os').fadeOut();
                        }, 2500);
                    });

                } else {
                    $(".bs-os-modal-lg").animate({scrollTop: 0}, "slow");
                    $("#load-os").html("<img src='/prj_summer/images/load.gif'>");
                    $("#load-os").fadeIn(100, function () {
                        window.setTimeout(function () {
                            $('#close-os-modal').click();
                            $('#load-os').fadeOut();
                        }, 1400);
                    });

                    $("#msgsucesso-os").fadeIn(2000, function () {
                        $('#close-os-modal').click();
                        window.setTimeout(function () {
                            $('#msgsucesso-os').fadeOut();
                        }, 2500);
                    });

                    setTimeout(function () {
                        location.reload();
                        $('#cadastro-os').find('.form-control').val('');
                        $('#cadastro-os').find('input:radio').prop('checked', false);
                    }, 4000);

                }
            }

        });

        return false;

    });

    //Ajax renderiza a pagina que edita o status da OS

    $(document).on('click', '#edit-os-status', function () {
        var idOs = $(this).closest('td').find('.idOsList').text();
        $('#page-edita-status-os').fadeOut(0, function () {
            $('#page-edita-status-os').load('/prj_summer/views/update-status-os.php?id=' + idOs, function () {
                $('#page-edita-status-os').fadeIn(0);
            });
        });
    });

    //Ajax renderiza a pagina com todas informacoes da OS

    $(document).on('click', '#os-info-link', function () {
        var idOs = $(this).closest('td').find('.idOsList').text();
        $('#os-info-body').fadeOut(0, function () {
            $('#os-info-body').load('/prj_summer/views/os-info.php?id=' + idOs, function () {
                $('#os-info-body').fadeIn(0);
            });
        });
    });


    //ajax update do status da OS
    $(document).on('submit', '.update-status-os', function () {
        var update = jQuery(this).serialize();

        $.ajax({
            type: "POST",
            url: "/prj_summer/controllers/os-update-status.php",
            data: update,
            success: function (data) {
                $("#load-os-status").html("<img src='/prj_summer/images/load.gif'>");
                $("#load-os-status").fadeIn(100, function () {
                    window.setTimeout(function () {
                        $('#close-os-status-modal').click();
                        $('#load-os-status').fadeOut();
                    }, 1400);
                });
                $("#msgsucesso-os-update").fadeIn(1500, function () {
                    window.setTimeout(function () {
                        $('#msgsucesso-os-update').fadeOut();
                        location.reload();
                    }, 3999);
                });

            }
        });
        return false;
    });


//Datepicker js

    $.fn.datepicker.noConflict = function () {
        $.fn.datepicker = old;
        return this;
    };

    $("#dataEmissao").datepicker({
        todayBtn: 1,
        autoclose: true,
        clearBtn: true,
        language: "pt-BR",
        todayHighlight: true
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#dataPrevEntrega').datepicker('setStartDate', minDate);
    });

    $("#dataPrevEntrega").datepicker({
        clearBtn: true,
        language: "pt-BR",
        todayHighlight: true,
        autoclose: true}).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#dataEmissao').datepicker('setEndDate', minDate);
    });

    $('#dataVencLentes').datepicker({
        clearBtn: true,
        language: "pt-BR",
        todayHighlight: true,
        autoclose: true
    });


    $('#dataPg').datepicker({
        clearBtn: true,
        language: "pt-BR",
        todayHighlight: true,
        autoclose: true
    });


    $('.os-filter').click(function () {
        $('li.os-filter').removeClass('active');
        $(this).addClass("active");
    });

});

