function fadeIn(obj) {
    $('.socials').fadeIn(1000);
}

function setAspectRatio() {
  jQuery('iframe').each(function() {
    jQuery(this).css('height', jQuery(this).width() * 9/16);
  });
}

setAspectRatio();   
setTimeout(fadeIn, 500);

jQuery(window).resize(setAspectRatio);