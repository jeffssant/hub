(function ($) {
    $('a.btn-get-started').on('click', setTimeout(setData, 1000) );

    setTimeout(function() {
        var select = 'input[type="button"][value="Próximo"].wpProQuiz_button.wpProQuiz_QuestionButton';
        var el = document.querySelectorAll(select);
        
        el[(el.length - 1)].addEventListener('click', sendDataToDB)
    }, 1500);
})(jQuery);

// Seta as informações na session storage para pegar mais tarde
function setData() {
    $('input[type="submit"].wpcf7-form-control').on('click', function () {
        var form = $(this).parents('form');

        var dados = {
            nome: form.find('#nome').val(),
            email: form.find('#inputEmail4').val(),
            senha: form.find('#inputPassword4').val(),
            cidade: form.find('#inputCity').val(),
            estado: form.find('#inputEstado').val()
        };

        sessionStorage.setItem('usuario', JSON.stringify(dados));
    });
}

// Retorna os dados
function getData() {
    return JSON.parse(sessionStorage.getItem('usuario'));
}

function sendDataToDB() {
    var data = getData();
    data.resultado = $('.course-title-label:visible').text();

    $.ajax({
        method: 'POST',
        url: wpobj.ajaxurl,
        data: {
            action: 'salva_dados_teste',
            usuario: data
        }
    }).done(function (res) {
        console.log(res);
    });
}
