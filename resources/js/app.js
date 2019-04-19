'use strict'
require('./bootstrap');
class App {
    constructor() {
        this.particles()
        $('[data-toggle="tooltip"]').tooltip()
        $(document).click((e) => {
            $('.navbar-collapse').collapse('hide')
        })
        this.sortProjects();
    }
    sortProjects() {
        $(".ui-sortable").sortable({
            items: '.sortable',
            cursor: 'move',
            opacity: 0.6,
            helper: function (e, ui) {
                ui.children().each(function () {
                    $(this).width($(this).width());
                });
                return ui;
            },
            update: function (event, ui) {
                var order = [];
                $('.sortable').each(function (index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                }).removeAttr('style');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: $(".ui-sortable").data('url'),
                    data: {
                        order: order,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });

    }
    particles() {
        let _self = this
        if ($('#intro').length > 0) {
            particlesJS.load('intro', '/particles.json', () => {
                let nav = $('.navbar')
                let win = $(window)
                let header = $('header')
                _self.stickyNav(nav, win)
                _self.typingAnimation()
                win.scroll((e) => {
                    _self.paralaxing(header, win)
                    _self.stickyNav(nav, win)
                })
            })
        }
    }
    paralaxing(header, win) {
        header.css({ backgroundPositionY: (win.scrollTop() / 5) + "%" })
    }
    stickyNav(nav, win) {
        let scroll = win.scrollTop() + nav.outerHeight()
        if (scroll >= win.height()) {
            nav.addClass("fixed-top")
        } else {
            nav.removeClass("fixed-top")
        }
    }
    typingAnimation() {
        new Typed("#skill", {
            strings: ['Full-Stack', 'Front-End', 'Back-End', 'PHP', 'HTML5', 'CSS3', 'JavaScript', 'Laravel', 'CakePHP', 'C', 'C++'],
            backSpeed: 25,
            backDelay: 2000,
            showCursor: true,
            typeSpeed: 100,
            shuffle: false,
            smartBackspace: true,
            loop: true
        })
    }
}
new App()
