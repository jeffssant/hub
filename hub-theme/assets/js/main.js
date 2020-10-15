!(function ($) {
    "use strict";


    // Preloader
    $(window).on('load', function () {
        if ($('#preloader').length) {
            $('#preloader').delay(100).fadeOut('slow', function () {
                $(this).remove();
            });
        }
    });

    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $('#header').outerHeight() - 2;
    $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            e.preventDefault();
            var target = $(this.hash);
            if (target.length) {

                var scrollto = target.offset().top - scrolltoOffset;

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu, .mobile-nav').length) {
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function () {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });

    // Mobile Navigation
    if ($('.nav-menu').length) {
        var $mobile_nav = $('.nav-menu').clone().prop({
            class: 'mobile-nav d-lg-none'
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
        $('body').append('<div class="mobile-nav-overly"></div>');

        $(document).on('click', '.mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').toggle();
        });




        $(document).on('click', '.curso-0', function (e) {
            $('#Curso_Fundamental').prop('checked', true);
        });
        $(document).on('click', '.curso-1', function (e) {
            $('#Curso_Intermediario').prop('checked', true);
        });
        $(document).on('click', '.curso-2', function (e) {
            $('#Curso_Avançado').prop('checked', true);
        });


        $(document).on('click', '.tab-1', function (e) {
            $(".tab-1").addClass('active');
            $(".tab-2").removeClass('active');
            $(".tab-3").removeClass('active');
            $(".tab-0").removeClass('active');
        });

        $(document).on('click', '.tab-3', function (e) {
            $(".tab-3").addClass('active');
            $(".tab-2").removeClass('active');
            $(".tab-1").removeClass('active');
            $(".tab-0").removeClass('active');
        });

        $(document).on('click', '.tab-2', function (e) {
            $(".tab-2").addClass('active');
            $(".tab-1").removeClass('active');
            $(".tab-3").removeClass('active');
            $(".tab-0").removeClass('active');
        });

        $(document).on('click', '.tab-0', function (e) {
            $(".tab-0").addClass('active');
            $(".tab-1").removeClass('active');
            $(".tab-3").removeClass('active');
            $(".tab-2").removeClass('active');
        });



        $(document).on('click', '.mobile-nav .drop-down > a', function (e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass('active');
        });

        $(document).click(function (e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }

    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, #mobile-nav');

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop() + 200;

        nav_sections.each(function () {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find('li').removeClass('active');
                }
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }
            if (cur_pos < 300) {
                $(".nav-menu ul:first li:first").addClass('active');
            }
        });
    });

    // Toggle .header-scrolled class to #header when page is scrolled
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    if ($(window).scrollTop() > 100) {
        $('#header').addClass('header-scrolled');
    }

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });

    // Clients carousel (uses the Owl Carousel library)
    $(".clients-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 4
            },
            900: {
                items: 6
            }
        }
    });

    // Porfolio isotope and filter
    $(window).on('load', function () {
        var portfolioIsotope = $('.portfolio-container').isotope({
            itemSelector: '.portfolio-item'
        });

        $('#portfolio-flters li').on('click', function () {
            $("#portfolio-flters li").removeClass('filter-active');
            $(this).addClass('filter-active');

            portfolioIsotope.isotope({
                filter: $(this).data('filter')
            });
            aos_init();
        });

        // Initiate venobox (lightbox feature used in portofilo)
        $(document).ready(function () {
            $('.venobox').venobox({
                'share': false
            });
        });
    });

    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000
    });

    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1
    });

    // Portfolio details carousel
    $(".portfolio-details-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1
    });

    // Init AOS
    function aos_init() {
        AOS.init({
            duration: 1000,
            once: true
        });
    }
    $(window).on('load', function () {
        aos_init();
    });


    jQuery("input#tel")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if (phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        });

    jQuery("input#tel-teste")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if (phone.length > 10) {
                element.mask("(99) 99999-999?9");
            } else {
                element.mask("(99) 9999-9999?9");
            }
        });

    // Popular select de estados
    $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/', function (json) {
        var options = '<option value="">Selecione o estado</option>';
        for (var i = 0; i < json.length; i++) {
            options += '<option value="' + json[i].id + '" >' + json[i].nome + '</option>';
        }
        $("#estado").html(options);
        $("#estado-teste").html(options);
    });

    $('#cidade').prop("disabled", true);
    $('#cidade-teste').prop("disabled", true);



    $("#estado").change(function () {
        var estado = $(this).val();
        $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estado + '/municipios', function (json) {
            var options = '<option value="">Selecione a cidade</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';
            }
            $("#cidade").html(options);
            $('#cidade').prop("disabled", false);
        });
    });

    $("#estado-teste").change(function () {
        var estado = $(this).val();
        $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estado + '/municipios', function (json) {
            var options = '<option value="">Selecione a cidade</option>';
            for (var i = 0; i < json.length; i++) {
                options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';
            }
            $("#cidade-teste").html(options);
            $('#cidade-teste').prop("disabled", false);
        });
    });
})(jQuery);





$('#cta-btn').on('click', function () {
    
    nome = $('#name-teste').val();
    email = $('#email-teste').val();
    telefone = $('#tel-teste').val();
    estado = $('#estado-teste option:selected').text();
    cidade = $('#cidade-teste option:selected').val();
    password = $('#password-teste').val();
    origem = 'Teste vocacional';
   


    var reTipo = /[A-z][ ][A-z]/; 
    if( reTipo.test(nome)== false){       
        $('#name-teste').css("background-color", "#f9c1c1");
        $('.aviso').show();
        $('.aviso').html('<div class="error-message">Preencha seu nome completo</div>');
        $('#cta-btn').prop("disabled", false);
        return false
    }
    else{
        $('#name-teste').css("background-color", "white");
    }

    var emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (emailFilter.test(email)==false) {       
        $('#email-teste').css("background-color", "#f9c1c1");
        $('.aviso').show();
        $('.aviso').html('<div class="error-message">Digite um e-mail válido</div>');
        
        return false;
    }
    else{
        $('#email-teste').css("background-color", "white");
    }

    if (telefone=="") {       
        $('#tel-teste').css("background-color", "#f9c1c1");
        $('.aviso').show();
        $('.aviso').html('<div class="error-message">Por favor preencha seu telefone</div>');
        
        return false;
    }
    else{
        $('#tel-teste').css("background-color", "white");
    }

    if ($('#estado-teste option:selected').val()=="") {       
        $('#estado-teste').css("background-color", "#f9c1c1");
        $('.aviso').show();
        $('.aviso').html('<div class="error-message">Por favor selecione um estado</div>');
        
        return false;
    }
    else{
        $('#estado-teste').css("background-color", "white");
    }

    if ($('#cidade-teste option:selected').val()=="") {       
        $('#cidade-teste').css("background-color", "#f9c1c1");
        $('.aviso').show();
        $('.aviso').html('<div class="error-message">Por favor selecione uma cidade</div>');
        
        return false;
    }
    else{
        $('#cidade-teste').css("background-color", "white");
    }

 

    if(password.trim().length < 4){
        $('#password-teste').css("background-color", "#f9c1c1");
        $('.aviso').show();
        $('.aviso').html('<div class="error-message">Por favor digite uma senha com mais de 4 caractéres</div>');
        
        return false;
    }
    else{
        $('#password-teste').css("background-color", "white");
    }

      $('.aviso').show();
      $('#cta-btn').prop("disabled", true);

        $.ajax({
            method: 'POST',
            url: wpobj.ajaxurl,
            data: {
                action: 'addUser',
                nome: nome,
                email: email,
                telefone: telefone,
                estado: estado,
                cidade: cidade,
                password: password,
                origem: origem
            }
        }).done(function (res) {
            if (res == '<div class="cadastrado">Usuário cadastrado com sucesso </div>'){
                window.location.href = window.location.href+"/quiz/";
            }
            console.log(res);
            $('.aviso').html(res);
            $('#cta-btn').prop("disabled", false);
        })
    
});






$('#insc-btn').on('click', function () {
    
    nome = $('#name').val();
    email = $('#email').val();
    telefone = $('#tel').val();
    estado = $('#estado option:selected').text();
    cidade = $('#cidade option:selected').val();
    password = $('#password').val();
    origem = $(".inscricao input[type='radio']:checked").val();
   


    var reTipo = /[A-z][ ][A-z]/; 
    if( reTipo.test(nome)== false){       
        $('#name').css("background-color", "#f9c1c1");
        $('.aviso-insc').show();
        $('.aviso-insc').html('<div class="error-message">Preencha seu nome completo</div>');
        $('#insc-btn').prop("disabled", false);
        return false
    }
    else{
        $('#name').css("background-color", "white");
    }

    var emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (emailFilter.test(email)==false) {       
        $('#email').css("background-color", "#f9c1c1");
        $('.aviso-insc').show();
        $('.aviso-insc').html('<div class="error-message">Digite um e-mail válido</div>');       
        return false;
    }
    else{
        $('#email').css("background-color", "white");
    }

    if (telefone=="") {       
        $('#tel').css("background-color", "#f9c1c1");
        $('.aviso-insc').show();
        $('.aviso-insc').html('<div class="error-message">Por favor preencha seu telefone</div>');
        
        return false;
    }
    else{
        $('#tel').css("background-color", "white");
    }

    if ($('#estado option:selected').val()=="") {       
        $('#estado').css("background-color", "#f9c1c1");
        $('.aviso-insc').show();
        $('.aviso-insc').html('<div class="error-message">Por favor selecione um estado</div>');
        
        return false;
    }
    else{
        $('#estado').css("background-color", "white");
    }

    if ($('#cidade option:selected').val()=="") {       
        $('#cidade').css("background-color", "#f9c1c1");
        $('.aviso-insc').show();
        $('.aviso-insc').html('<div class="error-message">Por favor selecione uma cidade</div>');
        
        return false;
    }
    else{
        $('#cidade').css("background-color", "white");
    }

 

    if(password.trim().length < 4){
        $('#password').css("background-color", "#f9c1c1");
        $('.aviso-insc').show();
        $('.aviso-insc').html('<div class="error-message">Por favor digite uma senha com mais de 4 caractéres</div>');
        
        return false;
    }
    else{
        $('#password').css("background-color", "white");
    }

      $('.aviso-insc').show();
      $('#insc-btn').prop("disabled", true);

        $.ajax({
            method: 'POST',
            url: wpobj.ajaxurl,
            data: {
                action: 'addUser',
                nome: nome,
                email: email,
                telefone: telefone,
                estado: estado,
                cidade: cidade,
                password: password,
                origem: origem,
            }
        }).done(function (res) {
            if (res == '<div class="cadastrado">Usuário cadastrado com sucesso </div>'){
                window.location.href = window.location.href+"/area-do-aluno/";
            }
            console.log(res);
            $('.aviso-insc').html(res);
            $('#insc-btn').prop("disabled", false);
        })
    
});
$('#contact-button').on('click', function () {
    event.preventDefault();
    
    nome = $('#name-contato').val();
    email = $('#email-contato').val();
    assunto = $('#subject').val();
    mensagem = $('.mensagem').val();
    
    origem = 'Formulário de contato';
   


    var reTipo = /[A-z][ ][A-z]/; 
    if( reTipo.test(nome)== false){       
        $('#name-contato').css("background-color", "#6a020226");
        $('.aviso-contato').show();
        $('.error-message').show();
        $('.aviso-contato').html('<div class="error-message">Preencha seu nome completo</div>');
        $('.contact-button').prop("disabled", false);
        return false
    }
    else{
        $('#name-contato').css("background-color", "white");
    }

    var emailFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (emailFilter.test(email)==false) {       
        $('#email-contato').css("background-color", "#6a020226");
        $('.aviso-contato').show();
        $('.aviso-contato').html('<div class="error-message">Digite um e-mail válido</div>');       
        return false;
    }
    else{
        $('#email-contato').css("background-color", "white");
    }

    if (mensagem=="") {       
        $('.mensagem').css("background-color", "#6a020226");
        $('.aviso-contato').show();
        $('.aviso-contato').html('<div class="error-message">Por favor preencha sua mensagem</div>');
        
        return false;
    }
    else{
        $('.mensagem').css("background-color", "white");
    }

    if ($('#subject').val()=="") {       
        $('#subject').css("background-color", "#6a020226");
        $('.aviso-contato').show();
        $('.aviso-contato').html('<div class="error-message">Por favor digite o assunto da mensagem</div>');
        
        return false;
    }
    else{
        $('#subject').css("background-color", "white");
    } 

    

      $('.aviso-contato').show();
      $('#contact-button').prop("disabled", true);

        $.ajax({
            method: 'POST',
            url: wpobj.ajaxurl,
            data: {
                action: 'phpMail',
                nome: nome,
                telefone: '',
                email: email,
                origem: origem,
                mensagem : mensagem,
                assunto : assunto,               
                
            }
        }).done(function (res) {           
            console.log(res);
            $('.aviso-contato').html('<div class="cadastrado">' + res + '</div>');
            $('#contact-button').prop("disabled", false);
            $('#form-conta input').val("");
        })
    
});

$('.teste').on('click', function () {
$.ajax({
    method: 'POST',
    url: wpobj.ajaxurl,
    data: {
        action: 'phpMail',        
    }
}).done(function (res) {
    alert('teste');
})
});


