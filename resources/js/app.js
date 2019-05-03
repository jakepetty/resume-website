'use strict'
require('./bootstrap')
class App {
    constructor() {
        $('.modal').modal('show')
        $('[data-toggle="tooltip"]').tooltip()
        $(document).click((e) => {
            $('.navbar-collapse').collapse('hide')
        })
        this.particles()
        this.sortProjects()
        this.animatePills()
        this.autoResizeTextareas()
        $('nav a[href^="#"]').on('click', (e) => {
            e.preventDefault()
            let el = $(e.currentTarget)
            let target = $(el.attr('href'))
            $('html, body').stop().animate({
                'scrollTop': target.offset().top - 61
            }, 0)
        })
    }
    animatePills() {
        $('.pill').on('mouseover', (e) => {
            let el = $(e.currentTarget)
            let animaton = 'rubberBand'
            el[0].addEventListener('animationend', () => {
                el.removeClass(animaton)
            })
            el.addClass('animated ' + animaton)
        })
    }
    autoResizeTextareas() {
        let elements = document.querySelectorAll('textarea')
        elements.forEach((element) => {
            element.addEventListener('keypress', function () {
                element.style.height = 'auto'
                element.style.height = element.scrollHeight + 5 + 'px'
            })
            element.style.height = 'auto'
            element.style.height = element.scrollHeight + 5 + 'px'
        })
    }
    sortProjects() {
        $(".ui-sortable").sortable({
            items: '.sortable',
            cursor: 'move',
            opacity: 0.6,
            helper: (e, ui) => {
                return ui
            },
            update: (event, ui) => {
                let order = []
                $('.sortable').each((index, element) => {
                    order.push({
                        id: $(element).attr('data-id'),
                        position: index + 1
                    })
                }).removeAttr('style')

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: $(".ui-sortable").data('url'),
                    data: {
                        order: order,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (response) => {
                        console.log(response)
                    }
                })
            }
        })
    }
    particles() {
        let _self = this
        if ($('#intro').length > 0) {
            particlesJS.load('intro', '/particles.json', () => {
                let nav = $('.navbar')
                let win = $(window)
                let header = $('#intro')
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
