/* Author: 

*/
jQuery(document).ready(function($){
    $('.window_popup').popupWindow({ 
        height:500, 
        width:800, 
        top:50, 
        left:50 
    });
    $('#RegistrationAddForm .titleHintBox').tipsy({trigger: 'focus', gravity: 'w', fade:true});
    $('.colorbox').colorbox();
});
