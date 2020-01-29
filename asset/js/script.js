// *** Box Side
// $(".open-person").click(function(){
//     $(".box-side").removeClass('active');
//     $("#side_person").addClass('active');
// });

$(".side-close").click(function(){
    $(".box-side").removeClass('active');
});


// *** Insert Simplebar
$('.on-simple-bar').attr('data-simplebar', true);


// *** Textarea Autosize
jQuery.each(jQuery('textarea.auto-expand'), function() {
    var offset = this.offsetHeight - this.clientHeight;
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('.auto-expand');
});