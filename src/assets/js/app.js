import $ from "jquery";
import "what-input";

// Foundation JS relies on a global variable. In ES6, all imports are hoisted
// to the top of the file so if we used `import` to import Foundation,
// it would execute earlier than we have assigned the global variable.
// This is why we have to use CommonJS require() here since it doesn't
// have the hoisting behavior.
window.jQuery = $;
require("foundation-sites");

// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';
import "../../../js/theme";

$(document)
	.foundation()
	.ready(function ($) {
		/**
		 * GWT theme scripts.
		 */

		// Cookie handler, non-$ style
		function createCookie(name, value, days) {
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
				var expires = "; expires=" + date.toGMTString();
			} else {
				var expires = "";
			}
			document.cookie = name + "=" + value + expires + "; path=/";
		}

		function readCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(";");
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == " ") {
					c = c.substring(1, c.length);
				}
				if (c.indexOf(nameEQ) == 0) {
					return c.substring(nameEQ.length, c.length);
				}
			}
			return null;
		}
		// Transparency Seal
		$("#tp-seal").parent().parent().addClass("text-center");

		// High contrast handler
		if (readCookie("a11y-high-contrast")) {
			$("body").addClass("contrast");
			$("head").append(
				$(
					"<link href='" +
						template_directory +
						"/accessibility/a11y-contrast.css' id='highContrastStylesheet' rel='stylesheet' type='text/css' />"
				)
			);
			$("#accessibility-contrast")
				.attr("aria-checked", true)
				.addClass("active");
		}
		$(".toggle-contrast").on("click", function () {
			if (!$(this).hasClass("active")) {
				$("head").append(
					$(
						"<link href='" +
							template_directory +
							"/accessibility/a11y-contrast.css' id='highContrastStylesheet' rel='stylesheet' type='text/css' />"
					)
				);
				$("body").addClass("contrast");
				createCookie("a11y-high-contrast", "1");
				$(this).attr("aria-checked", true).addClass("active");
				return false;
			} else {
				$("#highContrastStylesheet").remove();
				$("body").removeClass("contrast");
				$(this).removeAttr("aria-checked").removeClass("active");
				eraseCookie("a11y-high-contrast");
				return false;
			}
		});

		// Saturation handler
		if (readCookie("a11y-desaturated")) {
			$("body").addClass("desaturated");
			$("head").append(
				$(
					"<link href='" +
						template_directory +
						"/accessibility/a11y-desaturate.css' id='desaturateStylesheet' rel='stylesheet' type='text/css' />"
				)
			);
			$("#accessibility-grayscale")
				.attr("aria-checked", true)
				.addClass("active");
		}
		$(".toggle-grayscale").on("click", function () {
			if (!$(this).hasClass("active")) {
				$("head").append(
					$(
						"<link href='" +
							template_directory +
							"/accessibility/a11y-desaturate.css' id='desaturateStylesheet' rel='stylesheet' type='text/css' />"
					)
				);
				$("body").addClass("desaturated");
				$(this).attr("aria-checked", true).addClass("active");
				createCookie("a11y-desaturated", "1");
				return false;
			} else {
				$("#desaturateStylesheet").remove();
				$("body").removeClass("desaturated");
				$(this).removeAttr("aria-checked").removeClass("active");
				eraseCookie("a11y-desaturated");
				return false;
			}
		});

		// Fontsize handler
		if (readCookie("a11y-larger-fontsize")) {
			$("body").addClass("fontsize");
			$("head").append(
				$(
					"<link href='" +
						template_directory +
						"/accessibility/a11y-fontsize.css' id='fontsizeStylesheet' rel='stylesheet' type='text/css' />"
				)
			);
			$("#accessibility-fontsize")
				.attr("aria-checked", true)
				.addClass("active");
		}
		$(".toggle-fontsize").on("click", function () {
			if (!$(this).hasClass("active")) {
				$("head").append(
					$(
						"<link href='" +
							template_directory +
							"/accessibility/a11y-fontsize.css' id='fontsizeStylesheet' rel='stylesheet' type='text/css' />"
					)
				);
				$("body").addClass("fontsize");
				$(this).attr("aria-checked", true).addClass("active");
				createCookie("a11y-larger-fontsize", "1");
				return false;
			} else {
				$("#fontsizeStylesheet").remove();
				$("body").removeClass("fontsize");
				$(this).removeAttr("aria-checked").removeClass("active");
				eraseCookie("a11y-larger-fontsize");
				return false;
			}
		});

		// Back to top elavator
		var offset = 220;
		var duration = 500;
		$(window).scroll(function () {
			if ($(this).scrollTop() > offset) {
				$("#back-to-top").fadeIn(duration);
			} else {
				$("#back-to-top").fadeOut(duration);
			}
		});
		$("#back-to-top").click(function (event) {
			event.preventDefault();
			$("html, body").animate({ scrollTop: 0 }, duration);
			return false;
		});

		// Skip to Content handler
		var stc = $("#main-content").position().top;
		b = $(".sticky ").height();
		c = stc - 58;
		$("#accessibility-skip-content").click(function (event) {
			event.preventDefault();
			$("html, body").animate({ scrollTop: c }, duration);
			return false;
		});

		// Skip to Footer handler
		var stf = $("#gwt-standard-footer").position().top;
		$("#accessibility-skip-footer").click(function (event) {
			event.preventDefault();
			$("html, body").animate({ scrollTop: stf }, duration);
			return false;
		});
	});
