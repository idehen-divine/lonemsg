"use strict";
let isRtl = window.Helpers.isRtl(),
	isDarkStyle = window.Helpers.isDarkStyle(),
	menu,
	animate,
	isHorizontalLayout = !1;
document.getElementById("layout-menu") &&
	(isHorizontalLayout = document
		.getElementById("layout-menu")
		.classList.contains("menu-horizontal")),
	(function () {
		setTimeout(function () {
			window.Helpers.initCustomOptionCheck();
		}, 1e3),
			document.querySelectorAll("#layout-menu").forEach(function (e) {
				(menu = new Menu(e, {
					orientation: isHorizontalLayout ? "horizontal" : "vertical",
					closeChildren: !!isHorizontalLayout,
					showDropdownOnHover: localStorage.getItem(
						"templateCustomizer-" +
							templateName +
							"--ShowDropdownOnHover"
					)
						? "true" ===
						  localStorage.getItem(
								"templateCustomizer-" +
									templateName +
									"--ShowDropdownOnHover"
						  )
						: void 0 === window.templateCustomizer ||
						  window.templateCustomizer.settings
								.defaultShowDropdownOnHover,
				})),
					window.Helpers.scrollToActive((animate = !1)),
					(window.Helpers.mainMenu = menu);
			});
		document.querySelectorAll(".layout-menu-toggle").forEach((e) => {
			e.addEventListener("click", (e) => {
				if (
					(e.preventDefault(),
					window.Helpers.toggleCollapsed(),
					config.enableMenuLocalStorage &&
						!window.Helpers.isSmallScreen())
				)
					try {
						localStorage.setItem(
							"templateCustomizer-" +
								templateName +
								"--LayoutCollapsed",
							String(window.Helpers.isCollapsed())
						);
						var t,
							o = document.querySelector(
								".template-customizer-layouts-options"
							);
						o &&
							((t = window.Helpers.isCollapsed()
								? "collapsed"
								: "expanded"),
							o.querySelector(`input[value="${t}"]`).click());
					} catch (e) {}
			});
		});
		if (document.getElementById("layout-menu")) {
			var t = document.getElementById("layout-menu");
			var o = function () {
				Helpers.isSmallScreen() ||
					document
						.querySelector(".layout-menu-toggle")
						.classList.add("d-block");
			};
			let e = null;
			(t.onmouseenter = function () {
				e = Helpers.isSmallScreen()
					? setTimeout(o, 0)
					: setTimeout(o, 300);
			}),
				(t.onmouseleave = function () {
					document
						.querySelector(".layout-menu-toggle")
						.classList.remove("d-block"),
						clearTimeout(e);
				});
		}
		window.Helpers.swipeIn(".drag-target", function (e) {
			window.Helpers.setCollapsed(!1);
		}),
			window.Helpers.swipeOut("#layout-menu", function (e) {
				window.Helpers.isSmallScreen() &&
					window.Helpers.setCollapsed(!0);
			});
		let e = document.getElementsByClassName("menu-inner"),
			n = document.getElementsByClassName("menu-inner-shadow")[0];
		0 < e.length &&
			n &&
			e[0].addEventListener("ps-scroll-y", function () {
				this.querySelector(".ps__thumb-y").offsetTop
					? (n.style.display = "block")
					: (n.style.display = "none");
			});
		var a,
			t = document.querySelector(".dropdown-style-switcher"),
			s =
				localStorage.getItem(
					"templateCustomizer-" + templateName + "--Style"
				) ||
				(window.templateCustomizer?.settings?.defaultStyle ?? "light"),
			l =
				(window.templateCustomizer &&
					t &&
					([].slice
						.call(t.children[1].querySelectorAll(".dropdown-item"))
						.forEach(function (e) {
							e.addEventListener("click", function () {
								var e = this.getAttribute("data-theme");
								"light" === e
									? window.templateCustomizer.setStyle(
											"light"
									  )
									: "dark" === e
									? window.templateCustomizer.setStyle("dark")
									: window.templateCustomizer.setStyle(
											"system"
									  );
							});
						}),
					(l = t.querySelector("i")),
					"light" === s
						? (l.classList.add("bx-sun"),
						  new bootstrap.Tooltip(l, {
								title: "Light Mode",
								fallbackPlacements: ["bottom"],
						  }))
						: "dark" === s
						? (l.classList.add("bx-moon"),
						  new bootstrap.Tooltip(l, {
								title: "Dark Mode",
								fallbackPlacements: ["bottom"],
						  }))
						: (l.classList.add("bx-desktop"),
						  new bootstrap.Tooltip(l, {
								title: "System Mode",
								fallbackPlacements: ["bottom"],
						  }))),
				"system" === (a = s) &&
					(a = window.matchMedia("(prefers-color-scheme: dark)")
						.matches
						? "dark"
						: "light"),
				[].slice
					.call(document.querySelectorAll("[data-app-" + a + "-img]"))
					.map(function (e) {
						var t = e.getAttribute("data-app-" + a + "-img");
						e.src = assetsPath + "img/" + t;
					}),
				"undefined" != typeof i18next &&
					"undefined" != typeof i18NextHttpBackend &&
					i18next
						.use(i18NextHttpBackend)
						.init({
							lng: window.templateCustomizer
								? window.templateCustomizer.settings.lang
								: "en",
							debug: !1,
							fallbackLng: "en",
							backend: {
								loadPath:
									assetsPath + "json/locales/{{lng}}.json",
							},
							returnObjects: !0,
						})
						.then(function (e) {
							r();
						}),
				document.getElementsByClassName("dropdown-language"));
		if (l.length) {
			var i = l[0].querySelectorAll(".dropdown-item");
			for (let e = 0; e < i.length; e++)
				i[e].addEventListener("click", function () {
					let o = this.getAttribute("data-language"),
						n = this.getAttribute("data-text-direction");
					for (var e of this.parentNode.children)
						for (var t = e.parentElement.parentNode.firstChild; t; )
							1 === t.nodeType &&
								t !== t.parentElement &&
								t
									.querySelector(".dropdown-item")
									.classList.remove("active"),
								(t = t.nextSibling);
					this.classList.add("active"),
						i18next.changeLanguage(o, (e, t) => {
							if (
								(window.templateCustomizer &&
									window.templateCustomizer.setLang(o),
								"rtl" === n
									? "true" !==
											localStorage.getItem(
												"templateCustomizer-" +
													templateName +
													"--Rtl"
											) &&
									  window.templateCustomizer &&
									  window.templateCustomizer.setRtl(!0)
									: "true" ===
											localStorage.getItem(
												"templateCustomizer-" +
													templateName +
													"--Rtl"
											) &&
									  window.templateCustomizer &&
									  window.templateCustomizer.setRtl(!1),
								e)
							)
								return console.log(
									"something went wrong loading",
									e
								);
							r();
						});
				});
		}
		function r() {
			var e = document.querySelectorAll("[data-i18n]"),
				t = document.querySelector(
					'.dropdown-item[data-language="' + i18next.language + '"]'
				);
			t && t.click(),
				e.forEach(function (e) {
					e.innerHTML = i18next.t(e.dataset.i18n);
				});
		}
		s = document.querySelector(".dropdown-notifications-all");
		function d(e) {
			"show.bs.collapse" == e.type || "show.bs.collapse" == e.type
				? e.target.closest(".accordion-item").classList.add("active")
				: e.target
						.closest(".accordion-item")
						.classList.remove("active");
		}
		const c = document.querySelectorAll(".dropdown-notifications-read");
		s &&
			s.addEventListener("click", (e) => {
				c.forEach((e) => {
					e.closest(".dropdown-notifications-item").classList.add(
						"marked-as-read"
					);
				});
			}),
			c &&
				c.forEach((t) => {
					t.addEventListener("click", (e) => {
						t.closest(
							".dropdown-notifications-item"
						).classList.toggle("marked-as-read");
					});
				}),
			document
				.querySelectorAll(".dropdown-notifications-archive")
				.forEach((t) => {
					t.addEventListener("click", (e) => {
						t.closest(".dropdown-notifications-item").remove();
					});
				}),
			[].slice
				.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
				.map(function (e) {
					return new bootstrap.Tooltip(e);
				});
		[].slice
			.call(document.querySelectorAll(".accordion"))
			.map(function (e) {
				e.addEventListener("show.bs.collapse", d),
					e.addEventListener("hide.bs.collapse", d);
			});
		window.Helpers.setAutoUpdate(!0),
			window.Helpers.initPasswordToggle(),
			window.Helpers.initSpeechToText(),
			window.Helpers.initNavbarDropdownScrollbar();
		let u = document.querySelector("[data-template^='horizontal-menu']");
		if (
			(u &&
				(window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT
					? window.Helpers.setNavbarFixed("fixed")
					: window.Helpers.setNavbarFixed("")),
			window.addEventListener(
				"resize",
				function (e) {
					window.innerWidth >= window.Helpers.LAYOUT_BREAKPOINT &&
						document.querySelector(".search-input-wrapper") &&
						(document
							.querySelector(".search-input-wrapper")
							.classList.add("d-none"),
						(document.querySelector(".search-input").value = "")),
						u &&
							(window.innerWidth <
							window.Helpers.LAYOUT_BREAKPOINT
								? window.Helpers.setNavbarFixed("fixed")
								: window.Helpers.setNavbarFixed(""),
							setTimeout(function () {
								window.innerWidth <
								window.Helpers.LAYOUT_BREAKPOINT
									? document.getElementById("layout-menu") &&
									  document
											.getElementById("layout-menu")
											.classList.contains(
												"menu-horizontal"
											) &&
									  menu.switchMenu("vertical")
									: document.getElementById("layout-menu") &&
									  document
											.getElementById("layout-menu")
											.classList.contains(
												"menu-vertical"
											) &&
									  menu.switchMenu("horizontal");
							}, 100));
				},
				!0
			),
			!isHorizontalLayout &&
				!window.Helpers.isSmallScreen() &&
				("undefined" != typeof TemplateCustomizer &&
					(window.templateCustomizer.settings.defaultMenuCollapsed
						? window.Helpers.setCollapsed(!0, !1)
						: window.Helpers.setCollapsed(!1, !1)),
				"undefined" != typeof config) &&
				config.enableMenuLocalStorage)
		)
			try {
				null !==
					localStorage.getItem(
						"templateCustomizer-" +
							templateName +
							"--LayoutCollapsed"
					) &&
					window.Helpers.setCollapsed(
						"true" ===
							localStorage.getItem(
								"templateCustomizer-" +
									templateName +
									"--LayoutCollapsed"
							),
						!1
					);
			} catch (e) {}
	})(),
	"undefined" != typeof $ &&
		$(function () {
			window.Helpers.initSidebarToggle();
			var t,
				o,
				e,
				n = $(".search-toggler"),
				a = $(".search-input-wrapper"),
				s = $(".search-input"),
				l = $(".content-backdrop");
			n.length &&
				n.on("click", function () {
					a.length && (a.toggleClass("d-none"), s.focus());
				}),
				$(document).on("keydown", function (e) {
					var t = e.ctrlKey,
						e = 191 === e.which;
					t && e && a.length && (a.toggleClass("d-none"), s.focus());
				}),
				setTimeout(function () {
					var e = $(".twitter-typeahead");
					s.on("focus", function () {
						a.hasClass("container-xxl")
							? (a.find(e).addClass("container-xxl"),
							  e.removeClass("container-fluid"))
							: a.hasClass("container-fluid") &&
							  (a.find(e).addClass("container-fluid"),
							  e.removeClass("container-xxl"));
					});
				}, 10),
				s.length &&
					((t = function (n) {
						return function (t, e) {
							let o;
							(o = []),
								n.filter(function (e) {
									if (
										e.name
											.toLowerCase()
											.startsWith(t.toLowerCase())
									)
										o.push(e);
									else {
										if (
											e.name
												.toLowerCase()
												.startsWith(t.toLowerCase()) ||
											!e.name
												.toLowerCase()
												.includes(t.toLowerCase())
										)
											return [];
										o.push(e),
											o.sort(function (e, t) {
												return t.name < e.name ? 1 : -1;
											});
									}
								}),
								e(o);
						};
					}),
					(n = "search-vertical.json"),
					$("#layout-menu").hasClass("menu-horizontal") &&
						(n = "search-horizontal.json"),
					(o = $.ajax({
						url: assetsPath + "json/" + n,
						dataType: "json",
						async: !1,
					}).responseJSON),
					s.each(function () {
						var e = $(this);
						s
							.typeahead(
								{
									hint: !1,
									classNames: {
										menu: "tt-menu navbar-search-suggestion",
										cursor: "active",
										suggestion:
											"suggestion d-flex justify-content-between px-3 py-2 w-100",
									},
								},
								{
									name: "pages",
									display: "name",
									limit: 5,
									source: t(o.pages),
									templates: {
										header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Pages</h6>',
										suggestion: function ({
											url: e,
											icon: t,
											name: o,
										}) {
											return (
												'<a href="' +
												e +
												'"><div><i class="bx ' +
												t +
												' me-2"></i><span class="align-middle">' +
												o +
												"</span></div></a>"
											);
										},
										notFound:
											'<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Pages</h6><p class="py-2 mb-0"><i class="bx bx-error-circle bx-xs me-2"></i> No Results Found</p></div>',
									},
								},
								{
									name: "files",
									display: "name",
									limit: 4,
									source: t(o.files),
									templates: {
										header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Files</h6>',
										suggestion: function ({
											src: e,
											name: t,
											subtitle: o,
											meta: n,
										}) {
											return (
												'<a href="javascript:;"><div class="d-flex w-50"><img class="me-3" src="' +
												assetsPath +
												e +
												'" alt="' +
												t +
												'" height="32"><div class="w-75"><h6 class="mb-0">' +
												t +
												'</h6><small class="text-muted">' +
												o +
												'</small></div></div><small class="text-muted">' +
												n +
												"</small></a>"
											);
										},
										notFound:
											'<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Files</h6><p class="py-2 mb-0"><i class="bx bx-error-circle bx-xs me-2"></i> No Results Found</p></div>',
									},
								},
								{
									name: "members",
									display: "name",
									limit: 4,
									source: t(o.members),
									templates: {
										header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Members</h6>',
										suggestion: function ({
											name: e,
											src: t,
											subtitle: o,
										}) {
											return (
												'<a href="app-user-view-account.html"><div class="d-flex align-items-center"><img class="rounded-circle me-3" src="' +
												assetsPath +
												t +
												'" alt="' +
												e +
												'" height="32"><div class="user-info"><h6 class="mb-0">' +
												e +
												'</h6><small class="text-muted">' +
												o +
												"</small></div></div></a>"
											);
										},
										notFound:
											'<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Members</h6><p class="py-2 mb-0"><i class="bx bx-error-circle bx-xs me-2"></i> No Results Found</p></div>',
									},
								}
							)
							.bind("typeahead:render", function () {
								l.addClass("show").removeClass("fade");
							})
							.bind("typeahead:select", function (e, t) {
								t.url && (window.location = t.url);
							})
							.bind("typeahead:close", function () {
								s.val(""),
									e.typeahead("val", ""),
									a.addClass("d-none"),
									l.addClass("fade").removeClass("show");
							}),
							s.on("keyup", function () {
								"" == s.val() &&
									l.addClass("fade").removeClass("show");
							});
					}),
					$(".navbar-search-suggestion").each(function () {
						e = new PerfectScrollbar($(this)[0], {
							wheelPropagation: !1,
							suppressScrollX: !0,
						});
					}),
					s.on("keyup", function () {
						e.update();
					}));
		});
