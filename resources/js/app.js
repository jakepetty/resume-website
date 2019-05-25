'use strict'
require('./bootstrap')
require('../../node_modules/aos/dist/aos')
import AOS from 'aos';
class App {
    constructor() {
        AOS.init()
        this.intro = document.getElementById('intro');
        this.navbar = document.getElementById('menu');

        $('.modal').modal('show')
        $('[data-toggle="tooltip"]').tooltip()
        document.addEventListener('click', () => {
            $('.navbar-collapse').collapse('hide')
        })
        window.addEventListener('scroll', this.scrollEvents.bind(this), false)
        this.sortProjects()
        this.animatePills()
        this.autoResizeTextareas()

        // Navigation
        this.setupNavigation()
        // Sticky Navbar
        this.stickyNavbar(window.pageYOffset);
    }
    setupNavigation() {
        let links = document.querySelectorAll('nav a');
        for (let i = 0; i < links.length; i++) {
            let link = links[i];
            if (link.hash) {
                let target = document.querySelector(link.hash);
                link.addEventListener('click', (e) => {
                    e.preventDefault()
                    window.scrollTo(0, target.offsetTop - this.navbar.clientHeight)
                })
            }
        }
    }
    animatePills() {
        let pills = document.querySelectorAll('.pill');
        let animaton = 'rubberBand'
        pills.forEach((pill) => {
            pill.addEventListener('mouseover', () => {
                pill.classList.add('animated', animaton)
                pill.addEventListener('animationend', () => {
                    pill.classList.remove(animaton)
                })
            })
        })
    }
    autoResizeTextareas() {
        let elements = document.querySelectorAll('textarea')
        elements.forEach((element) => {
            element.addEventListener('keypress', () => {
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
                    }
                })
            }
        })
    }
    scrollEvents() {
        let y = window.pageYOffset
        this.parallaxing(y);
        this.stickyNavbar(y);
    }
    parallaxing(y) {
        // parallaxing
        this.intro.style.backgroundPositionY = (y / 4) + "%"
    }
    stickyNavbar(y) {
        let scrollY = y + this.navbar.scrollHeight
        if (scrollY >= window.innerHeight) {
            this.navbar.classList.add("fixed-top")
        } else {
            this.navbar.classList.remove("fixed-top")
        }
    }
}
new App()
