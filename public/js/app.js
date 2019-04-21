var app = {
    init: function(){
        app.events();
        app.checkType();
    },
    events: function(){
        $('#component_type').change(function(){
            $('#component_format').html('');
            app.checkType();
            app.fillSelect();
        })
    },
    checkType: function(){
        $('.choice_type').attr('required', false).parent().addClass('d-none');
        
        switch ($('#component_type').children("option:selected").text()){
            case 'Texto':
                $('#component_text').attr('required', true).parent().removeClass('d-none');
                break;
            case 'Imagen':
                $('#component_link, #component_size, #component_format').attr('required', true).parent().removeClass('d-none');
                break;
            case 'Video':
                $('#component_link, #component_size, #component_format').attr('required', true).parent().removeClass('d-none');
                break;
        }
    },
    fillSelect: function(){
        $('#component_format').html('');
        switch ($('#component_type').children("option:selected").text()){
            case 'Texto':
                $('#component_text').attr('required', true).parent().removeClass('d-none');
                break;
            case 'Imagen':
                $('#component_format').append(new Option("PNG", "PNG")).append(new Option("JPG", "JPG"))
                break;
            case 'Video':
                $('#component_format').append(new Option("MP4", "MP4")).append(new Option("WEBM", "WEBM"))
                break;
        }
    }
}

var countChar = {
    init: function(){
        $('.cont-char').parent().append($('<leyend/>').attr({
            'id': 'cont-char-1'
        }).css({
            'text-align': 'right',
            'padding': '5px',
            'color': '#FFF',
            'margin-top': '2px',
            'float': 'right'
        }));
        countChar.events();
        countChar.checkLenght($('.cont-char').val().length);
    },
    events: function(){
        $('.cont-char').keyup( function() {
            if ($(this).val().length > 140) {
                var texto = $(this).val().substr(0,140);
                $(this).val(texto);
            }
            countChar.checkLenght($(this).val().length);
        });
    },
    checkLenght: function(campo) {
        $("#cont-char-1").text(campo +'/140');
        if (campo >= 90 && campo < 140) {
            $("#cont-char-1").css("background-color","#eb984e");
        }
        if (campo > 110) {
            $("#cont-char-1").css("background-color","#ec7063");
        }
        if (campo < 90) {
            $("#cont-char-1").css("background-color","#58d68d");
        }
    }
}

$(document).ready(function(){
    countChar.init();
})