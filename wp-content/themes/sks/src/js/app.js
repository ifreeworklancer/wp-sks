import jquery from 'jquery';
import Flickity from 'flickity';
import 'flickity-as-nav-for';
import IMask from 'imask';

window.jQuery = window.$ = jquery;

let mapboxgl = require('mapbox-gl/dist/mapbox-gl.js');

import Vue from 'vue';
import Portfolios from './components/portfolio/Portfolios';
import Posts from './components/post/Posts';

new Vue({
    el: '#app',
    components: {
        Portfolios,
        Posts,
    }
});


(function () {

    /**
     * Burger-menu
     */
    let menu = $('.menu'),
        burgerMenu = $('.burger-menu');
    $(burgerMenu).click(function () {
        $(burgerMenu).toggleClass('active');
        $(menu).toggleClass('active');
    });

    /**
     * Scroll
     */
    $(".scroll-link").on("click", function (event) {
        event.preventDefault();
        let id = $(this).attr('href');
        if (id.length > 1) {
            let top = $(id).offset().top;

            $('body,html').animate({
                scrollTop: top
            }, 1500);
            $(burgerMenu).removeClass('active');
            $(menu).removeClass('active');
        }
    });

    /**
     * Form-label
     */

    $('.form-control').on('focus', function () {
        $(this).parents('.form-group').addClass('in-focus');
    });

    $('.form-control').on('blur', function () {
        if ($(this).val() !== "") {
            $(this).parents('.form-group').addClass('in-focus');
        } else {
            $(this).parents('.form-group').removeClass('in-focus');
        }
    });

    /**
     * Phone mask
     * @type {*|jQuery.fn.init|jQuery|HTMLElement}
     */
    const phones = $('[type="tel"]');
    Array.from(phones).forEach(phone => {
        new IMask(phone, {
            mask: '+{38} (000) 000-00-00'
        });
    });

    /**
     * Modal
     */
    var connectFeedback = $('.custom-modal--feedback');
    var closeModal = $('.close-modal');
    var modalMask = $('.modal-mask');

    $('.open-feedback').on('click', function (e) {
        e.preventDefault();
        $(connectFeedback).addClass('active');
        $(modalMask).addClass('active');
    });

    $(closeModal).on('click', function () {
        $(connectFeedback).removeClass('active');
        $(modalMask).removeClass('active');
    });

    $(modalMask).on('click', function () {
        $(connectFeedback).removeClass('active');
        $(modalMask).removeClass('active');
    });

    $(document).on('keyup', function (e) {
        if (e.keyCode === 27) {
            $(connectFeedback).removeClass('active');
            $('.outer').remove();
            $(modalMask).removeClass('active');
        }
    });

    /**
     * Youtube video
     */
    $('[data-src]').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('src'),
            padding = $(window).width() > 768 ? 120 : 30,
            ratio = 9 / 16,
            width = $(window).width() - padding,
            height = width * ratio,
            html = '<iframe style="width: ' + width + 'px; height: ' + height + 'px;" ' +
                'src="' +
                id + '" frameborder="0" gesture="media" allowfullscreen></iframe>';

        $('body').append('<div class="outer">' + html + '</div>');
    });

    $(document).mouseup(function (e) {
        var container = $('.outer iframe');

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.outer').remove();
        }
    });

    /**
     * Sliders
     */
    let elem1 = document.querySelector('.intro-slider'),
        galleryNavFor1 = document.querySelector('.intro-slider-description');
    if (elem1 && galleryNavFor1) {
        let flkty1 = new Flickity(elem1, {
            prevNextButtons: false,
            cellAlign: 'left',
            contain: true,
            draggable: false,
            pageDots: true,
            wrapAround: true,
            cellSelector: '.intro-slider-item'
        });

        new Flickity(galleryNavFor1, {
            asNavFor: elem1,
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            prevNextButtons: false,
            draggable: false,
            wrapAround: true,
            adaptiveHeight: true,
            cellSelector: '.intro-slider-description-item'
        });

        let pageDots = document.querySelectorAll('.intro-slider .flickity-page-dots li');

        pageDots.forEach((item, index) => {
            item.innerText = `0${index + 1}`.slice(-2);
        });

        let prevArrowObject = document.querySelector('.slider-arrow--intro .slider-arrow-item--prev');

        prevArrowObject.addEventListener('click', function () {
            flkty1.previous(true, false);
        });

        let nextArrowObject = document.querySelector('.slider-arrow--intro .slider-arrow-item--next');

        nextArrowObject.addEventListener('click', function () {
            flkty1.next(true, false);
        });
    }

    let elem2 = document.querySelector('.project-slider');
    if (elem2) {
        let flkty2 = new Flickity(elem2, {
            prevNextButtons: false,
            cellAlign: 'left',
            contain: true,
            draggable: false,
            pageDots: true,
            wrapAround: true,
            cellSelector: '.project-slider-item'
        });

        let prevArrowProjcet = document.querySelector('.slider-arrow--project .slider-arrow-item--prev');

        prevArrowProjcet.addEventListener('click', function () {
            flkty2.previous(true, false);
        });

        let nextArrowProjcet = document.querySelector('.slider-arrow--project .slider-arrow-item--next');

        nextArrowProjcet.addEventListener('click', function () {
            flkty2.next(true, false);
        });
    }

    let elem3 = document.querySelector('.reviews-slider');
    if (elem3) {
        let flkty3 = new Flickity(elem3, {
            prevNextButtons: false,
            cellAlign: 'left',
            contain: true,
            draggable: false,
            pageDots: true,
            wrapAround: true,
            cellSelector: '.reviews-slider-item'
        });

        let prevArrowReviews = document.querySelector('.slider-arrow--reviews .slider-arrow-item--prev');

        prevArrowReviews.addEventListener('click', function () {
            flkty3.previous(true, false);
        });

        let nextArrowReviews = document.querySelector('.slider-arrow--reviews .slider-arrow-item--next');

        nextArrowReviews.addEventListener('click', function () {
            flkty3.next(true, false);
        });
    }

    let elem4 = document.querySelector('.article-slider--main'),
        galleryNavFor4 = document.querySelector('.article-slider--navFor');
    if (elem4 && galleryNavFor4) {
        let flkty4 = new Flickity(elem4, {
            prevNextButtons: false,
            cellAlign: 'left',
            contain: true,
            draggable: false,
            pageDots: false,
            wrapAround: false,
            cellSelector: '.article-slider-item'
        });

        new Flickity(galleryNavFor4, {
            asNavFor: elem4,
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            prevNextButtons: false,
            draggable: false,
            wrapAround: false,
        });

        let prevArrowObject = document.querySelector('.slider-arrow--article .slider-arrow-item--prev');

        prevArrowObject.addEventListener('click', function () {
            flkty4.previous(true, false);
        });

        let nextArrowObject = document.querySelector('.slider-arrow--article .slider-arrow-item--next');

        nextArrowObject.addEventListener('click', function () {
            flkty4.next(true, false);
        });
    }

    /**
     * Map
     */
    if ($('#contacts-map').length > 0) {
        $('.map-mask').on('click', function () {
            $(this).addClass('is-disabled');
        });
        let mapLong = $('#contacts-map').data('long');
        let mapLat = $('#contacts-map').data('lat');
        let mapIcon = $('#contacts-map').data('icon');
        mapboxgl.accessToken = 'pk.eyJ1IjoibWFwYm94dXNlcm11c2V1bSIsImEiOiJjanRya2FoZXQwcjVlNDVtdTNlOWNoMzUyIn0.oMm4w0lY15eiIFOcl-gkIA';
        let map = new mapboxgl.Map({
            container: 'contacts-map',
            style: 'mapbox://styles/mapbox/dark-v10',
            center: [mapLat, mapLong],
            zoom: 16
        });

        map.on('load', function () {
            map.loadImage(`${mapIcon}`, function (error, image) {
                if (error) throw error;
                map.addImage('cat', image);
                map.addLayer({
                    "id": "points",
                    "type": "symbol",
                    "source": {
                        "type": "geojson",
                        "data": {
                            "type": "FeatureCollection",
                            "features": [{
                                "type": "Feature",
                                "geometry": {
                                    "type": "Point",
                                    "coordinates": [mapLat, mapLong],
                                }
                            }]
                        }
                    },
                    "layout": {
                        "icon-image": "cat",
                        "icon-size": 1
                    }
                });
            });
        });
    }
})(jQuery);