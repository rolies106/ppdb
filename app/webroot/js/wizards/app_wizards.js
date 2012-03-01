function checkEmail(email) 
{
    if(email=="")
        return false;
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test(email) == false)
        return false;
    else
        return true;
}

/*$('#RegistrationAddForm').submit(function(){
   return false;
});*/

jQuery(document).ready(function($){
    
    // check nisn
    var passuri = $('#passing_url').val();
    var checkuser_url = $('#checkuser_url').val();
    console.log(checkuser_url);
    $('#RegistrationNisn').bindWithDelay('keyup',function(){
        var nis = $(this).val();
        
        if(isNaN(nis)){
            alert('NISN yang Anda masukan tidak valid !');
            return false;
        }else if(nis == ''){
            return false;
        }else if(nis.length < 10){
            alert('Masukan 10 Digit NISN Anda !');
            return false;
        }
        
        $.ajax({
            type    : "POST",
            url     : passuri,
            data    : 'nis=' + nis,
            success: function(data) {
                $('.available_true').remove();
                
                if(data == 'exist'){
                  $('#status_nis').val('exist');  
                  $('#RegistrationNisn').addClass('required-field');
                  $('#RegistrationNisn').parent('.input').prepend('<div class="error-message">Maaf NISN yang anda masukan telah ada. Silahkan cek NISN anda di http://nisn.jardiknas.org/</div>')
                }
                else{
                  $('#status_nis').val('available');  
                  $('#RegistrationNisn').removeClass('required-field');  
                  $('#RegistrationNisn').parent('.input').find('.error-message').remove();
                  $('#RegistrationNisn').parent('.input').append('<div class="available_true"></div>');
                }
            }
        });
        return false;
        
    }, 2000);
    
    $('#RegistrationAddForm').processPanel({
        kind: 'stepByStep',
        style: 'green-blue',
        firstSelected: true,
        icons: true,
        imgFolder: '',
        chooseAgain: true,
        nextPrevButtons: true,
        nextPrevButtonsPosition: 'bottom',
        nextButtonTitle: 'Langkah Selanjutnya',
        prevButtonTitle: 'Langkah Sebelumnya',
        fadeSpeed: 1000,
        event: 'click',
        beforeLoad: function(){},
        onLoad: function(){},
        onOpen: function(event, step, content, stepNumber){
            if(stepNumber==2)
            {
                $("#content1 .alert").remove();
                $('.available_true').remove();
                $("#content1 .field").removeClass('required-field');
                $('#content1 .field').each(function(){
                    var value = $(this).val();
                    if(value == ''){
                        $(this).addClass('required-field');
                    }
                });
                
                // validate NISN
                var nis = $('#RegistrationNisn').val();
                if(isNaN(nis)){
                    $("#content1").prepend("<div class='alert css3pie relative'>NISN yang Anda masukan tidak valid !</div>");
                    $('#RegistrationNisn').addClass('required-field');
                    return false;
                }else if(nis == ''){
                    $("#content1").prepend("<div class='alert css3pie relative'>Mohon isi NISN Anda !</div>");
                    return false;
                }else if(nis.length < 10){
                    $("#content1").prepend("<div class='alert css3pie relative'>Masukan 10 Digit NISN Anda !</div>");
                    $('#RegistrationNisn').addClass('required-field');
                    return false;
                }

                $('#UserUsername').val(nis);

                $.ajax({
                    type    : "POST",
                    url     : passuri,
                    data    : 'nis=' + $('#RegistrationNisn').val(),
                    success: function(data) {
                        if(data == 'exist'){
                          $('#status_nis').val('exist');
                          $('#RegistrationNisn').addClass('required-field');
                          $('#RegistrationNisn').parent('.input').prepend('<div class="error-message">Maaf NISN yang anda masukan telah ada. Silahkan cek NISN anda di http://nisn.jardiknas.org/</div>')
                        }
                        else{
                          $('#status_nis').val('available');
                          $('#RegistrationNisn').removeClass('required-field');  
                          $('#RegistrationNisn').parent('.input').find('.error-message').remove();
                          $('#RegistrationNisn').parent('.input').append('<div class="available_true"></div>');
                        }
                    }
                });
                if($('#status_nis').val() == 'exist'){return false;}
                
                if(!checkEmail($("#RegistrationEmail").val())){
                    $("#RegistrationEmail").addClass('required-field');
                    $("#content1").prepend("<div class='alert'>Mohon diisi data-data yang bertanda merah !<br />Alamat email harus valid dan benar !</div>");
                    return false;
                } else {
                    var emailReg = $("#RegistrationEmail").val();
                    $('#UserEmail').val(emailReg);
                }
                if($("#content1 .field").hasClass('required-field')){
                    $("#content1").prepend("<div class='alert css3pie relative'>Mohon diisi field-field yang bertanda merah !</div>");
                    return false;
                }
            }
            else if(stepNumber==3)
            {
                $("#content2 .alert").remove();
                $("#content2 .field").removeClass('required-field');
                $('#content2 .field').each(function(){
                    var value = $(this).val();
                    if(value == ''){
                        $(this).addClass('required-field');
                    }
                });
                if($("#content2 .field").hasClass('required-field')){
                    $("#content2").prepend("<div class='alert css3pie relative'>Mohon data nilai diisi semua pada setiap semester !</div>");
                    return false;
                }
            }            
            else if(stepNumber==4)
            {
                $('.available_true').remove();
                $("#content3 .alert").remove();
                $("#content3 .field").removeClass('required-field');
                $('#content3 .field').each(function(){
                    var value = $(this).val();
                    if(value == ''){
                        $(this).addClass('required-field');
                    }
                });

                $.ajax({
                    type    : "POST",
                    url     : checkuser_url,
                    data    : 'username=' + $('#UserUsername').val(),
                    success: function(data) {
                        if(data == 'exist'){
                          $('#status_username').val('exist');
                          $('#UserUsername').addClass('required-field');
                          $('#UserUsername').parent('.input').prepend('<div class="error-message">Maaf Username yang anda masukan sudah ada.</div>')
                        }
                        else
                        {
                          $('#status_username').val('available');
                          $('#UserUsername').removeClass('required-field');  
                          $('#UserUsername').parent('.input').find('.error-message').remove();
                          $('#UserUsername').parent('.input').append('<div class="available_true"></div>');
                        }
                    }
                });

                if($('#status_username').val() == 'exist'){return false;}

                // Check password match
                if($('#UserSecretword').val() != $('#UserResecretword').val()) {
                    $('#UserSecretword, #UserResecretword').addClass('required-field');
                    $('#UserSecretword').parent('.input').prepend('<div class="error-message">Password tidak sama.</div>');
                }

                if($("#content3 .field").hasClass('required-field')){
                    $("#content3").prepend("<div class='alert css3pie relative'>Mohon data diisi semua !</div>");
                    return false;
                }
            }
        },
        afterOpen: function(event, step, content, stepNumber){},
        onOpenPopup: function(event, button, panel){},
        onClosePopup: function(event, button, panel){},
        onHoverIn: function(event, step, stepNumber){},
        onHoverOut: function(event, step, stepNumber){}
});
});