jQuery(document).ready(function($){
    $("#dataSiswaTable").dataTable({"bJQueryUI": true,"sPaginationType": "full_numbers"});
    $("#PostTable").dataTable({"bJQueryUI": true,"sPaginationType": "full_numbers"});
    $(".datepicker").datepicker({dateFormat:'yy-mm-dd'});
    $('.js-confirm-delete').bind('click',function(){
        if (confirm($(this).attr('title'))) {
            document.messages.submit();
        }
        return false;
    })
});
