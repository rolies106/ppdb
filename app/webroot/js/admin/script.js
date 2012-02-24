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

    // Drop Down Menu
    $('.dropdown > a').click(function() {

        if ($(this).hasClass('active')) {

            $(this).removeClass('active');
            $(this).parent().find('form').hide();
            
        } else {

            $(this).addClass('active');
            $(this).parent().find('form').show();

        }

        return false;
    });

    $('.dropdown form input[type="submit"]').click(function() {
        $('.dropdown a').removeClass('active');
        $('.dropdown form').hide();
    });
});
