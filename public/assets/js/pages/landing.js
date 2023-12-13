"use strict";
!(function () {
    const e = document.querySelector(".layout-navbar"),
        t = document.getElementById("hero-animation"),
        n = document.querySelectorAll(".hero-dashboard-img"),
        o = document.querySelectorAll(".hero-elements-img"),
        r = document.getElementById("swiper-clients-logos"),
        i = document.getElementById("swiper-reviews"),
        s = document.getElementById("reviews-previous-btn"),
        a = document.getElementById("reviews-next-btn"),
        c = document.querySelector(".swiper-button-prev"),
        l = document.querySelector(".swiper-button-next"),
        d = document.querySelector(".price-duration-toggler"),
        u = [].slice.call(document.querySelectorAll(".price-monthly")),
        m = [].slice.call(document.querySelectorAll(".price-yearly"));
    "1200" <= screen.width &&
        t &&
        (t.addEventListener("mousemove", function (r) {
            o.forEach((e) => {
                e.style.transform = "translateZ(1rem)";
            }),
                n.forEach((e) => {
                    var t = (window.innerWidth - 2 * r.pageX) / 100,
                        n = (window.innerHeight - 2 * r.pageY) / 100;
                    e.style.transform = `perspective(1200px) rotateX(${n}deg) rotateY(${t}deg) scale3d(1, 1, 1)`;
                });
        }),
        e.addEventListener("mousemove", function (r) {
            o.forEach((e) => {
                e.style.transform = "translateZ(1rem)";
            }),
                n.forEach((e) => {
                    var t = (window.innerWidth - 2 * r.pageX) / 100,
                        n = (window.innerHeight - 2 * r.pageY) / 100;
                    e.style.transform = `perspective(1200px) rotateX(${n}deg) rotateY(${t}deg) scale3d(1, 1, 1)`;
                });
        }),
        t.addEventListener("mouseout", function () {
            o.forEach((e) => {
                e.style.transform = "translateZ(0)";
            }),
                n.forEach((e) => {
                    e.style.transform =
                        "perspective(1200px) scale(1) rotateX(0) rotateY(0)";
                });
        })),
        i &&
            new Swiper(i, {
                slidesPerView: 1,
                spaceBetween: 5,
                grabCursor: !0,
                autoplay: { delay: 3e3, disableOnInteraction: !1 },
                loop: !0,
                loopAdditionalSlides: 1,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    1200: { slidesPerView: 3, spaceBetween: 26 },
                    992: { slidesPerView: 2, spaceBetween: 20 },
                },
            }),
        a.addEventListener("click", function () {
            l.click();
        }),
        s.addEventListener("click", function () {
            c.click();
        }),
        r &&
            new Swiper(r, {
                slidesPerView: 2,
                autoplay: { delay: 3e3, disableOnInteraction: !1 },
                breakpoints: {
                    992: { slidesPerView: 5 },
                    768: { slidesPerView: 3 },
                },
            }),
        document.addEventListener("DOMContentLoaded", function (e) {
            function t() {
                d.checked
                    ? (m.map(function (e) {
                          e.classList.remove("d-none");
                      }),
                      u.map(function (e) {
                          e.classList.add("d-none");
                      }))
                    : (m.map(function (e) {
                          e.classList.add("d-none");
                      }),
                      u.map(function (e) {
                          e.classList.remove("d-none");
                      }));
            }
            t(),
                (d.onchange = function () {
                    t();
                });
        });
})();
