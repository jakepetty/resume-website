require('./bootstrap');
var divs = $("#skills .skill");
var max_per_column = Math.ceil(divs.length / 2);
for (var i = 0; i < divs.length; i += max_per_column) {
    divs.slice(i, i + max_per_column).wrapAll("<div class='col col-md-6'/>");
}
$('#skills .col-md-6:last').addClass('d-none d-lg-inline-block');
$('.skill').each(function (i) {
    var el = $(this);
    setTimeout(function () {
        setTimeout(function () {
            el.css({ opacity: 1 }).addClass('animated flipInX');
        }, 150 * i);
    }, 1000);
});
window.onload = function () {
    $('body').removeClass('no-scroll');
    $('.loading').fadeOut();
    $('*[data-toggle="popover"]').popover()
}
$('.navbar a').each(function () {
    var el = $(this);
    var url = el.attr('href');
    var loc = window.location.href;
    if (url == loc) {
        el.parent().addClass('active');
    }
});
