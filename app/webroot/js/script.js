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

    if (typeof TWITTER !== 'undefined') {
        var username = typeof TWITTER !== 'undefined' ? TWITTER : 'kongcreate';
        var format = 'json';
        var url='http://api.twitter.com/1/statuses/user_timeline/'+username+'.'+format+'?callback=?';

        jQuery.getJSON(url,function(tweet){
            jQuery("#last-tweet").html(tweet[0].text);   
        });        
    }
});