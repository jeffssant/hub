var $ = jQuery;

function counterwpProQuiz_buttonPages(e) {
    var o = $("p#pagecounter"),
        a = $(".wpProQuiz_question #load-bar-quiz");
    if (22 >= e) {
        var e = Number($("#page-cur").text()) + 1,
            t = Math.round(100 * e / 22);
        a.animate({
            width: t + "%"
        }, 500), o.find("#page-cur").text(e), $("input[value='Finish quiz'].wpProQuiz_button.wpProQuiz_QuestionButton").attr("value", "Finalizar")
    } else o.remove(), $("#pagecounter, #wpProQuiz_1 .wpProQuiz_quiz, h4.wpProQuiz_header").remove(), $("#conteudo-second,#vantagens").empty(), setTimeout(function () {
        $("html,body").stop();
        var e = $(".lista-cursos-result:visible");
        $("#conteudo-second").append(e);
        var o = $("#quiz-container");
        $("html,body").stop().animate({
            scrollTop: o.offset().top - 100
        }, 50)
    }, 50)
}

function radioButton() {
    $("input[name='next'].wpProQuiz_button.wpProQuiz_QuestionButton").attr("value", "Próximo"), $(".wpProQuiz_questionListItem label").addClass("radioBoxUncheck"), $("input[type='radio']").on("change", function () {
        var e = $(this);
        $(".wpProQuiz_questionListItem label").removeClass("radioBoxCheck").addClass("radioBoxUncheck"), e.parents("label").removeClass("radioBoxUncheck").addClass("radioBoxCheck")
    });
    var e = $("<div>").attr("id", "load-bar-quiz");
    $(".wpProQuiz_question").append(e)
}

function nextPage() {
    counterwpProQuiz_buttonPages(Number($("#page-cur").text()) + 1);
    $(".radioBoxCheck").is(":visible")
        && counterwpProQuiz_buttonPages(Number($("#page-cur").text()) + 1), $("html,body").stop();
}

(function ($) {
    setTimeout(function () {
        radioButton();
        var button = $("input.wpProQuiz_button.wpProQuiz_QuestionButton[name='next']");

        // Aplica a função de página para o botão "próximo"
        button.on("click", nextPage);
    }, 200);
})(jQuery);
