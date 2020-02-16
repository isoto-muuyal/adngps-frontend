// JavaScript Document
$(document).ready(function(){
$('.menujqpop > ul > li:has(ul)').addClass('desplegablepop');
$('.menujqpop > ul > li > a').click(function() {
var comprobar = $(this).next();
$('.menujqpop li').removeClass('activa');
$(this).closest('li').addClass('activa');
if((comprobar.is('ul')) && (comprobar.is(':visible'))) {
$(this).closest('li').removeClass('activa');
comprobar.slideUp('normal');
}
if((comprobar.is('ul')) && (!comprobar.is(':visible'))) {
$('.menujq ul ul:visible').slideUp('normal');
comprobar.slideDown('normal');
}
});
});