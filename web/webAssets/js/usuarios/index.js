$(document).ready(function(){
    $('.js-activar-usuario').on('change', function(){
        
        var token = $(this).data('token');
        var url = $(this).data('url');

        $.ajax({
            url: url+'/usuarios/activar-usuario?token='+token,
            success: function(){

            }
        });
    });

    $('.js-bloquear-usuario').on('change', function(){

        
        var token = $(this).data('token');
        var url = $(this).data('url');

        $.ajax({
            url: url+'/usuarios/bloquear-usuario?token='+token,
            success: function(){
                
            }
        });
    });
});