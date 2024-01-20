"use strict";
function _instanceof(e, i) {
    return null != i && "undefined" != typeof Symbol && i[Symbol.hasInstance] ? !!i[Symbol.hasInstance](e) : e instanceof i;
}
function _classCallCheck(e, i) {
    if (!_instanceof(e, i)) throw new TypeError("Cannot call a class as a function");
}
function _defineProperties(e, i) {
    for (var t = 0; t < i.length; t++) {
        var s = i[t];
        (s.enumerable = s.enumerable || !1), (s.configurable = !0), "value" in s && (s.writable = !0), Object.defineProperty(e, s.key, s);
    }
}
function _createClass(e, i, t) {
    return i && _defineProperties(e.prototype, i), t && _defineProperties(e, t), e;
}
window.NodeList &&
    !NodeList.prototype.forEach &&
    (NodeList.prototype.forEach = function (e, i) {
        i = i || window;
        for (var t = 0; t < this.length; t++) e.call(i, this[t], t, this);
    });
var purePajinate = (function () {
    function e(i) {
        if (
            (_classCallCheck(this, e),
                (this.config = {
                    containerSelector: ".items",
                    itemSelector: ".item",
                    navigationSelector: ".page_navigation",
                    itemsPerPage: 10,
                    pageLinksToDisplay: 10,
                    startPage: 0,
                    wrapAround: !1,
                    navLabelFirst: "First",
                    navLabelPrev: "Prev",
                    navLabelNext: "Next",
                    navLabelLast: "Last",
                    navOrder: ["first", "prev", "num", "next", "last"],
                    showFirstLast: !1,
                    showPrevNext: !0,
                    hideOnSmall: !1,
                    defaultClass: "",
                    activeClass: "active",
                    disabledClass: "disabled",
                    onInit: function () { },
                    onPageDisplayed: function () { },
                }),
                void 0 !== i)
        ) {
            var t = i;
            for (var s in t) null != t[s] && (this.config[s] = t[s]);
        }
        this.init();
    }
    return (
        _createClass(e, [
            {
                key: "init",
                value: function () {
                    (this.config.item_container = document.querySelector(this.config.containerSelector)), (this.config.pagination_containers = document.querySelectorAll(this.config.navigationSelector));
                    var e = this.config.item_container.querySelectorAll(this.config.itemSelector);
                    if (!(this.config.hideOnSmall && this.config.itemsPerPage >= e.length)) {
                        this.current_page = this.config.startPage;
                        for (var i = 0; i < e.length; i++) (e[i].style.display = "none"), e[i].classList.add("hidden");
                        for (
                            var t = Math.ceil(e.length / this.config.itemsPerPage),
                            s = this.config.showFirstLast ? '<li class="first_link ' + this.config.defaultClass + '"><a href="" onclick="return false;">' + this.config.navLabelFirst + "</a></li>" : "",
                            n = this.config.showFirstLast ? '<li class="last_link ' + this.config.defaultClass + '"><a href="" onclick="return false;">' + this.config.navLabelLast + "</a></li>" : "",
                            a = this.config.showPrevNext ? '<li class="previous_link ' + this.config.defaultClass + '"><a href="" onclick="return false;">' + this.config.navLabelPrev + "</a></li>" : "",
                            l = this.config.showPrevNext ? '<li class="next_link ' + this.config.defaultClass + '"><a href="" onclick="return false;">' + this.config.navLabelNext + "</a></li>" : "",
                            o = "<ul>",
                            r = 0;
                            r < this.config.navOrder.length;
                            r++
                        )
                            switch (this.config.navOrder[r]) {
                                case "first":
                                    o += s;
                                    break;
                                case "last":
                                    o += n;
                                    break;
                                case "next":
                                    o += l;
                                    break;
                                case "prev":
                                    o += a;
                                    break;
                                case "num":
                                    this.config.showPrevNext && (o += '<li class="ellipse less"><span>...</span></li>');
                                    for (var c = 0; t > c;) {
                                        var g = "";
                                        0 == c && (g = " first"),
                                            c == t - 1 && (g = " last"),
                                            (o += '<li class="page_link' + g + " " + this.config.defaultClass + '" longdesc="' + c + '"><a href="" onclick="return false;"><span>' + (c + 1) + "</span></a></li>"),
                                            c++;
                                    }
                                    this.config.showPrevNext && (o += '<li class="ellipse more"><span>...</span></li>');
                            }
                        (o += "</ul>"),
                            this.config.pagination_containers.forEach(function (e) {
                                e.innerHTML = o;
                                for (var i = e.querySelectorAll(".page_link"), t = (Math.min(i.length, this.config.pageLinksToDisplay), 0); t < i.length; t++)
                                    (t >= this.config.pageLinksToDisplay + this.config.startPage || t < this.config.startPage) && (i[t].style.display = "none");
                                e.querySelectorAll(".ellipse").forEach(function (e) {
                                    e.style.display = "none";
                                });
                                var s = e.querySelector(".previous_link").nextElementSibling.nextElementSibling;
                                s.classList.add("active_page"),
                                    s.classList.add(this.config.activeClass),
                                    (this.total_page_no_links = i.length),
                                    (this.config.pageLinksToDisplay = Math.min(this.config.pageLinksToDisplay, this.total_page_no_links));
                                var n = this;
                                this.config.showFirstLast &&
                                    (e.querySelector(".first_link").addEventListener("click", function (i) {
                                        i.preventDefault(), n.showFirstPage(e);
                                    }),
                                        e.querySelector(".last_link").addEventListener("click", function (i) {
                                            i.preventDefault(), n.showLastPage(e);
                                        })),
                                    this.config.showPrevNext &&
                                    (e.querySelector(".previous_link").addEventListener("click", function (i) {
                                        i.preventDefault(), n.showPrevPage(e);
                                    }),
                                        e.querySelector(".next_link").addEventListener("click", function (i) {
                                            i.preventDefault(), n.showNextPage(e);
                                        })),
                                    e.querySelectorAll(".page_link").forEach(function (e) {
                                        e.addEventListener("click", function (i) {
                                            i.preventDefault(), n.gotopage(e.getAttribute("longdesc"));
                                        });
                                    }, n);
                            }, this),
                            this.gotopage(parseInt(this.config.startPage)),
                            this.config.item_container.classList.add("loaded"),
                            this.config.onInit.call(this);
                    }
                },
            },
            {
                key: "showFirstPage",
                value: function (e) {
                    this.movePageNumbersRight(e.querySelector(".first_link"), 0), this.gotopage(0);
                },
            },
            {
                key: "showLastPage",
                value: function (e) {
                    var i = this.total_page_no_links - 1;
                    this.movePageNumbersLeft(e.querySelector(".last_link"), i), this.gotopage(i);
                },
            },
            {
                key: "showPrevPage",
                value: function (e) {
                    var i = parseInt(this.current_page) - 1,
                        t = e.querySelector(".previous_link").parentNode.querySelector(".active_page").previousElementSibling;
                    null != t && t.classList.contains("page_link")
                        ? (this.movePageNumbersRight(e.querySelector(".previous_link"), i), this.gotopage(i))
                        : this.config.wrapAround && (this.movePageNumbersLeft(e.querySelector(".previous_link"), this.total_page_no_links - 1), this.gotopage(this.total_page_no_links - 1));
                },
            },
            {
                key: "showNextPage",
                value: function (e) {
                    var i = parseInt(this.current_page) + 1,
                        t = e.querySelector(".next_link").parentNode.querySelector(".active_page").nextElementSibling;
                    null != t && t.classList.contains("page_link")
                        ? (this.movePageNumbersLeft(e.querySelector(".next_link"), i), this.gotopage(i))
                        : this.config.wrapAround && (this.movePageNumbersRight(e.querySelector(".next_link"), 0), this.gotopage(0));
                },
            },
            {
                key: "gotopage",
                value: function (e) {
                    e = parseInt(e, 10);
                    for (
                        var i = parseInt(this.config.itemsPerPage),
                        t = e * i,
                        s = t + i,
                        n = this.config.item_container.querySelectorAll(this.config.itemSelector),
                        a = function (e) {
                            e >= s || e < t
                                ? ((n[e].style.display = "none"), n[e].classList.remove("visible"), n[e].classList.add("hidden"))
                                : ((n[e].style.display = "inline-block"),
                                    setTimeout(function () {
                                        n[e].classList.remove("hidden"), n[e].classList.add("visible");
                                    }, 20));
                        },
                        l = 0;
                        l < n.length;
                        l++
                    )
                        a(l);
                    this.config.pagination_containers.forEach(function (i) {
                        for (var t = i.querySelectorAll(".page_link"), s = 0; s < t.length; s++)
                            t[s].getAttribute("longdesc") == e ? (t[s].classList.add("active_page"), t[s].classList.add(this.config.activeClass)) : (t[s].classList.remove("active_page"), t[s].classList.remove(this.config.activeClass));
                    }, this),
                        (this.current_page = e),
                        this.toggleMoreLess(),
                        this.config.wrapAround || this.tagNextPrev(),
                        this.config.onPageDisplayed.call(this, e + 1);
                },
            },
            {
                key: "movePageNumbersLeft",
                value: function (e, i) {
                    var t = i;
                    e.parentNode.querySelectorAll(".page_link").forEach(function (e) {
                        e.getAttribute("longdesc") != t ||
                            e.classList.contains("active_page") ||
                            "none" != e.style.display ||
                            this.config.pagination_containers.forEach(function (e) {
                                for (var i = e.querySelectorAll(".page_link"), s = 0; s < i.length; s++) s < t + 1 && s >= parseInt(t - this.config.pageLinksToDisplay + 1) ? (i[s].style.display = "inline") : (i[s].style.display = "none");
                            }, this);
                    }, this);
                },
            },
            {
                key: "movePageNumbersRight",
                value: function (e, i) {
                    var t = i;
                    e.parentNode.querySelectorAll(".page_link").forEach(function (e) {
                        e.getAttribute("longdesc") != t ||
                            e.classList.contains("active_page") ||
                            "none" != e.style.display ||
                            this.config.pagination_containers.forEach(function (e) {
                                for (var i = e.querySelectorAll(".page_link"), s = 0; s < i.length; s++) s < t + parseInt(this.config.pageLinksToDisplay) && s >= t ? (i[s].style.display = "inline") : (i[s].style.display = "none");
                            }, this);
                    }, this);
                },
            },
            {
                key: "toggleMoreLess",
                value: function () {
                    this.config.pagination_containers.forEach(function (e) {
                        var i = e.querySelector(".more");
                        null != i && ((i.style.display = "none"), this.isHidden(e.querySelector(".page_link.last")) && (i.style.display = "inline"));
                        var t = e.querySelector(".less");
                        null != t && ((t.style.display = "none"), this.isHidden(e.querySelector(".page_link.first")) && (t.style.display = "inline"));
                    }, this);
                },
            },
            {
                key: "tagNextPrev",
                value: function () {
                    this.config.pagination_containers.forEach(function (e) {
                        var i = e.querySelector(".next_link"),
                            t = e.querySelector(".previous_link"),
                            s = e.querySelector(".first_link"),
                            n = e.querySelector(".last_link");
                        e.querySelector(".page_link.last").classList.contains("active_page")
                            ? (null != i && (i.classList.add("no_more"), i.classList.add(this.config.disabledClass)), null != n && (n.classList.add("no_more"), n.classList.add(this.config.disabledClass)))
                            : (null != i && (i.classList.remove("no_more"), i.classList.remove(this.config.disabledClass)), null != n && (n.classList.remove("no_more"), n.classList.remove(this.config.disabledClass))),
                            e.querySelector(".page_link.first").classList.contains("active_page")
                                ? (null != t && (t.classList.add("no_more"), t.classList.add(this.config.disabledClass)), null != s && (s.classList.add("no_more"), s.classList.add(this.config.disabledClass)))
                                : (null != t && (t.classList.remove("no_more"), t.classList.remove(this.config.disabledClass)), null != s && (s.classList.remove("no_more"), s.classList.remove(this.config.disabledClass)));
                    }, this);
                },
            },
            {
                key: "isHidden",
                value: function (e) {
                    var i = window.getComputedStyle(e);
                    return "none" === i.display || "hidden" === i.visibility;
                },
            },
        ]),
        e
    );
})();

let itms = 6; // itemsPerPage
let stpg = 1; // startPage
let pltd = 4; // pageLinksToDisplay
let winw = window.innerWidth;

function optionsByWindowSize() {
    winw = window.innerWidth;
    if (winw > 1600) { itms = 6; stpg = 0; pltd = 3; }
    else if (winw > 1230) { itms = 5; stpg = 0; pltd = 3; }
    else if (winw > 980) { itms = 4; stpg = 0; pltd = 3; }
    else if (winw > 750) { itms = 3; stpg = 0; pltd = 3; }
    else if (winw > 510) { itms = 2; stpg = 0; pltd = 3; }
    else { itms = 1; stpg = 0; pltd = 1; }
}

function reportWindowSize() {
    optionsByWindowSize();
    //purePajination Script - START
    if (document.readyState === "complete") {
        var gallery = new purePajinate({
            containerSelector: '.items',
            itemSelector: '.items > div',
            navigationSelector: '.pagination',
            wrapAround: true,
            pageLinksToDisplay: pltd,
            showFirstLast: true,
            navLabelPrev: '&nbsp;&nbsp;&nbsp;',
            navLabelNext: '&nbsp;&nbsp;&nbsp;',
            navLabelFirst: '&nbsp;&nbsp;&nbsp;',
            navLabelLast: '&nbsp;&nbsp;&nbsp;',
            itemsPerPage: itms,
            startPage: stpg
        });
    } //purePajination Script - END
}

document.onreadystatechange = reportWindowSize;
window.onresize = reportWindowSize;