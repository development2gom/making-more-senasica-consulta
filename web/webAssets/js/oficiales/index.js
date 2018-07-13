$(document).ready(function(){
    $('.js-activar-oficial').on('change', function(){
        
        var uddi = $(this).data('uddi');
        var url = $(this).data('url');

        $.ajax({
            url: url+'/oficiales/activar-oficial?uddi='+uddi,
            success: function(){

            }
        });
    });

    $('.js-bloquear-oficial').on('change', function(){

        
        var uddi = $(this).data('uddi');
        var url = $(this).data('url');

        $.ajax({
            url: url+'/oficiales/bloquear-oficial?uddi='+uddi,
            success: function(){
                
            }
        });
    });
});