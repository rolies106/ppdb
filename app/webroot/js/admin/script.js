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

    $('.showNilaiTestForm').click(function () {
        var thisRel = $(this).attr('rel');
        var isVis = $('#' + thisRel).is(":visible");

        if (isVis == false) {
            $('#' + thisRel).show();   
        } else {
            $('#' + thisRel).hide();   
        }
    });

    // Filter form
    $('.filterform .input').removeClass('required');

    // Nilai Test Form
    $('.update-nilai-form').ajaxForm({ 
        dataType        : 'json',
        beforeSubmit    : function(formData, form, options) {
            $(form).find('input[type="submit"]').hide();
            $(form).find('.loadingimg').show();
        },
        success         : function(data, statusText, xhr, form) {
            $(form).find('input[type="submit"]').show();
            $(form).find('.loadingimg').hide();

            if (data.success == true) {
                var formID = $(form).attr('id');
                $(form).find('#TestScoreId').val(data.id);
                
                $('.' + formID).text('Update Nilai');
                $('#show' + formID).slideUp();

                $('#testFormMessages').addClass('success').html('Data berhasil disimpan.').show();

            } else {
                $('#testFormMessages').addClass('notice').html('Data gagal disimpan, pastikan semua kolom nilai sudah diisi dengan data yang benar (hanya angka).').show();
            }

            setTimeout(
                function(){
                    $("#testFormMessages").slideUp("slow");
                },
            2000);            
                    
        }
    }); 
});