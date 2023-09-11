// JavaScript Document
$('nav div').click(function(){
  $('ul').slideToggle();
  $('ul ul').css('display', 'none');
});

$('ul li').click(function(){
  $('ul ul').slideUp();
  $(this).find('ul').slideToggle();
});

//slideToggle sets the display to none (inline - with the style tag), once the height of the element is 0.
//if the window is resized from mobile to desktop, the element will not appear.

$(window).resize(function(){
  if($(window).width() > 768){
    $('ul').removeAtrr('style');
  }
});
$('#myModal').on('shown.bs.modal', function () {
  $('#video1')[0].play();
})
$('#myModal').on('hidden.bs.modal', function () {
  $('#video1')[0].pause();
});


