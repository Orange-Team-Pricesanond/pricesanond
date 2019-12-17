// *** Sidebar
$( ".exp-menu" ).click(function() {
    $('.sidebar').toggleClass('expmenu');
});

// *** Control
$(document).on('click', '.switch-1', function(){
    $('#list_control').addClass('active');
});
$(document).on('click', '#control_02', function(){
    $('#list_attach').addClass('active');
});
$(document).on('click', '#control_03', function(){
    $('#list_history').addClass('active');
});
$(document).on('click', '#control_04', function(){
    $('#form_renew').addClass('active');
});
$(document).on('click', '#control_05', function(){
    $('#form_amendment').addClass('active');
});
$(document).on('click', '#side_reviewer', function(){
    $('#form_reviewer').addClass('active');
});
$(document).on('click', '#side_upload', function(){
    $('#form_upload').addClass('active');
});

$(document).on('click', '.side-close1', function(){
    $('#list_control').removeClass('active');
});
$(document).on('click', '.side-close2', function(){
    $('#list_attach').removeClass('active');
});
$(document).on('click', '.side-close3', function(){
    $('#list_history').removeClass('active');
});
$(document).on('click', '.side-close4', function(){
    $('#form_renew').removeClass('active');
});
$(document).on('click', '.side-close5', function(){
    $('#form_amendment').removeClass('active');
});


$(".side-close").click(function(){
  $(".box-side").removeClass('active');
});
// $(".box-side").mouseleave(function(){
//   $(this).removeClass('active');
// });



// insert simplebar
// $('.work-pane').attr('data-simplebar', true);


// *** Textarea Autosize
jQuery.each(jQuery('textarea.auto-expand'), function() {
    var offset = this.offsetHeight - this.clientHeight;
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('.auto-expand');
});


// topic-a-02 function
$('#pi_student, #pi_other, #lab_animal_exp').hide();
$('#pi_item').change(function(){
    if ($(this).val() == 'pi_3' || $(this).val() == 'pi_4' || $(this).val() == 'pi_5') {
        $('#pi_student').show();
        $('#pi_other').hide();
    } else if ($(this).val() == 'pi_6') {
        $('#pi_student').hide();
        $('#pi_other').show();
    } else {
        $('#pi_student').hide();
        $('#pi_other').hide();
    }
});

$("#chk-a2-1_4").click(function () {
    if ($(this).is(":checked")) {
        $("#lab_animal_exp").show();
    } else {
        $("#lab_animal_exp").hide();
    }
});