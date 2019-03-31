require('./bootstrap');
var divs = $("#skills .skill");
var max_per_column = Math.ceil(divs.length / 2);
for (var i = 0; i < divs.length; i += max_per_column) {
    divs.slice(i, i + max_per_column).wrapAll("<div class='col col-sm-6'/>");
}
$('.skill').each(function (i) {
    var el = $(this);
    var progress = $('.progress-bar', el);
    var percent = progress.data('level') / 100;
    var parent_width = progress.parent().width();
    setTimeout(function () {
        setTimeout(function () {
            el.css({ opacity: 1 }).addClass('animated flipInX');
            progress.animate({ width: (parent_width * percent) + "px" }, 1000);
        }, 150 * i);
    }, 1000);
});
window.onload = function () {
    $('body').removeClass('no-scroll');
    $('.loading').fadeOut();
}
