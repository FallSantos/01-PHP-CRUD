$('#formCadastro').on('submit', function (event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        url: 'controller/ControllerInsert.php',
        type: 'post',
        dataType: 'html',
        data: dados,
        success: function (dados) {
            $('.result').show().html(dados);
        }
    })
});