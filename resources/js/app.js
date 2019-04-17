'use strict'
require('./bootstrap');
class App {
    constructor() {
        this.particles()
        $('[data-toggle="tooltip"]').tooltip()
        $(document).click((e) => {
            $('.navbar-collapse').collapse('hide')
        })
    }
    particles() {
        let _self = this
        particlesJS.load('intro', 'particles.json', () => {
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
            strings: ['Front-End', 'Back-End', 'PHP', 'HTML5', 'CSS3', 'JavaScript', 'Laravel', 'CakePHP', 'C', 'C++', 'Full-Stack'],
            backSpeed: 25,
            showCursor: false,
            typeSpeed: 100,
            shuffle: false,
            smartBackspace: true,
            loop: true
        })
    }
}
new App()
