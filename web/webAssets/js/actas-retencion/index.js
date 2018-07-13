$(document).ready(function(){
    $("#pjax-actas").on('pjax:complete', function() {
      
        $("#wrkactasretencionsearch-txt_fecha").kvDatepicker({"clearBtn": true,"autoclose":true,"format":"dd-mm-yyyy","language":"es"});
        
      })
});