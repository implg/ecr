var ajax_send = false;
var ie_8 = false;
var timer_seconds;
var slider_timer;
var slider_timer_delay = 9000;
var hint_txt = "Пожалуйста, заполните это поле";
var hint_txt_email = "Пожалуйста, введите корректный e-mail";
var spinner_button = {
	lines: 8, // The number of lines to draw
  length: 3, // The length of each line
  width: 4, // The line thickness
  radius: 6, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 0, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#fff', // #rgb or #rrggbb or array of colors
  speed: 1, // Rounds per second
  trail: 60, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
	top: '40%', // Top position relative to parent in px
	left: 'auto' // Left position relative to parent in px
};

$(document).ready(
	function() {
		
		
		if (navigator.userAgent.indexOf("MSIE 8") != -1) ie_8 = true;
		
		

		
		//!Validate form
		$("body").on("submit", "form",
			function (event) {
				var form_valid = true;
				var obj_form = $(this);
				var obj_offset = 0;
				var inputs = $(":input:not(:submit, :reset, :hidden)", obj_form);
				$(".hint").remove();
				if (form_valid) {
					inputs.filter("[type='text'][required]").each(
						function () {
							var obj = $(this);
							if ($.trim(obj.val()) == "" || $.trim(obj.val()) == obj.attr("placeholder")) {
								obj.val("");
								obj_offset = obj.offset();
								obj_offset.top += obj.outerHeight();
								$("body").append("<div class='hint animated fadeInUp'><div class='icon warning'></div><div>" + hint_txt + "</div></div>");
								$(".hint").css({"left": obj_offset.left, "top": obj_offset.top, "max-width": obj.outerWidth()});
								form_valid = false;
								return false;
							}
						}
					);
				}
				if (form_valid) {
					inputs.filter("[type='password'][required]").each(
						function () {
							var obj = $(this);
							if ($.trim(obj.val()) == "" || $.trim(obj.val()) == obj.attr("placeholder")) {
								obj.val("");
								obj_offset = obj.offset();
								obj_offset.top += obj.outerHeight();
								$("body").append("<div class='hint animated fadeInUp'><div class='icon warning'></div><div>" + hint_txt + "</div></div>");
								$(".hint").css({"left": obj_offset.left, "top": obj_offset.top, "max-width": obj.outerWidth()});
								form_valid = false;
								return false;
							}
						}
					);
				}
				if (form_valid) {
					inputs.filter("textarea[required]").each(
						function () {
							var obj = $(this);
							if ($.trim(obj.val()) == "" || $.trim(obj.val()) == obj.attr("placeholder")) {
								obj.val("");
								obj_offset = obj.offset();
								obj_offset.top += obj.outerHeight();
								$("body").append("<div class='hint animated fadeInUp'><div class='icon warning'></div><div>" + hint_txt + "</div></div>");
								$(".hint").css({"left": obj_offset.left, "top": obj_offset.top, "max-width": obj.outerWidth()});
								form_valid = false;
								return false;
							}
						}
					);
				}
				if (form_valid) {
					inputs.filter("[type='tel'][required]").each(
						function () {
							var obj = $(this);
							if ($.trim(obj.val()) == "" || $.trim(obj.val()) == obj.attr("placeholder")) {
								obj.val("");
								obj_offset = obj.offset();
								obj_offset.top += obj.outerHeight();
								$("body").append("<div class='hint animated fadeInUp'><div class='icon warning'></div><div>" + hint_txt + "</div></div>");
								$(".hint").css({"left": obj_offset.left, "top": obj_offset.top, "max-width": obj.outerWidth()});
								form_valid = false;
								return false;
							}
						}
					);
				}
				if (form_valid) {
					inputs.filter("[type='email']").each(
						function () {
							var obj = $(this);
							if (obj.attr("required") == "required" || ($.trim(obj.val()) != "" && obj.attr("required") == undefined)) {
								if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($.trim(obj.val()))) {
									obj_offset = obj.offset();
									obj_offset.top += obj.outerHeight();
									$("body").append("<div class='hint animated fadeInUp'><div class='icon warning'></div><div>" + hint_txt_email + "</div></div>");
									$(".hint").css({"left": obj_offset.left, "top": obj_offset.top, "max-width": obj.outerWidth()});
									form_valid = false;
									return false;
								}
							}
						}
					);
				}
				if (form_valid) {
					if (!obj_form.hasClass("on_ajax")) return true;
					if (!ajax_send) {
						ajax_send = true;
						$(".hint").remove();
						var obj = $("button", obj_form);
						if (obj.get(0)) {
							var spinner = Spinner(spinner_button).spin();
							obj.prepend(spinner.el)
						} else obj = $("input[type='submit']", obj_form);
						
						var data = obj_form.serializeArray();
						var contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
						var processData = true;
						if ($("input[type='file']", obj_form).get(0)) {
							var form_data = data;
							data = new FormData();
							$("input[type='file']", obj_form).each(
								function () {
									var file = $(this);
									data.append(file.attr("name"), file.prop("files")[0]);
								}
							);
			        for (key in form_data) data.append(form_data[key]["name"], form_data[key]["value"]);
			        contentType = false;
			        processData = false;
						}
						
						$.ajax({
		          url: obj_form.attr("action"),
		          data: data,
		          type: "post",
		          contentType: contentType,
		          processData: processData,
		          success: function (reply) {
		          	ajax_send = false;
		          	if (spinner) spinner.stop();
		          	if (reply) {
			          	if (reply.success) {
			          		if (reply.response.redirect_url != undefined) {
			          			if (reply.response.redirect_url.indexOf("!") != -1) window.location.reload();
			          			else window.location = reply.response.redirect_url;
			          		}
				          	obj_form.html("<div class='success'>" + reply.message + "</div>");
			          	} else {
			          		$.each(reply.errors, function(key, val) {
			          			obj = $("[name=" + key + "]", obj_form);
			          			if(!obj.offset()){
			          				obj = $("#" + key  , obj_form);
			          			}
			          			var hint_obj = $("<div class='hint animated fadeInUp'><div class='icon warning'></div><div>" + val + "</div></div>");
			          			$("body").append(hint_obj);
				          		hint_obj.css({"left": obj.offset().left, "top": obj.offset().top + obj.outerHeight(), "max-width": obj.outerWidth()});
				          		if (hint_obj.offset().left < 0) hint_obj.css({"left": 0});
				          		if ((hint_obj.offset().left + hint_obj.outerWidth()) > $(window).width()) hint_obj.css({"right": 0, "left": "auto"});
				          		if (!$("body").hasClass("no_scroll")) $("html, body").animate({scrollTop: hint_obj.offset().top - ($(window).height() / 2 - hint_obj.outerHeight() / 2)});
			          		});
			          		$("button", obj_form).addClass("animated bounce").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
											function () {
												$(this).removeClass("animated bounce");
											}
										);
			          	}
		          	}
		          }
		        });
					}
				} else {
					if (!$("body").hasClass("no_scroll")) $("html, body").animate({scrollTop: obj_offset.top - ($(window).height() / 2 - $(".hint").outerHeight() / 2)});
					$("button", obj_form).addClass("animated bounce").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
						function () {
							$(this).removeClass("animated bounce");
						}
					);
				}
				event.stopImmediatePropagation();
				return false;
			}
		);
		$("body").on("focus", "form :input:not(:submit, :reset)",
			function () {
				$(".hint").remove();
			}
		);
		$("body").on("click", ".hint",
			function () {
				$(this).remove();
			}
		);
		
		
		//!Input correct
		if (ie_8) {
			var selector = ":input[placeholder][placeholder!='']";
			$(selector).each(
				function () {
					$(this).val($(this).attr("placeholder"));
				}
			);
			$("body").on("focus", selector,
				function () {
					var obj = $(this);
					if (obj.val() == obj.attr("placeholder")) obj.val("");
				}
			);
			$("body").on("blur", selector,
				function () {
					var obj = $(this);
					if ($.trim(obj.val()) == "") obj.val(obj.attr("placeholder"));
				}
			);
		}
		
		
	
		$('input[name=company_in_forum]').on('change', function(){
			if($(this).is(':checked')){
				$('input[name=company]').hide();
				$('select[name=member]').show();
				$('select[name=member]').attr('required', 'required');
				$('input[name=bik]').hide();
				$('input[name=bankname]').hide();
				$('input[name=ks]').hide();
				$('input[name=rs]').hide();
				$('input[name=urname]').hide();
				$('h3.requisit').hide();
			}else{
				$('input[name=company]').show();
				$('select[name=member]').hide();
				$('select[name=member]').removeAttr('required');				
				$('input[name=bik]').show();
				$('input[name=bankname]').show();
				$('input[name=ks]').show();
				$('input[name=rs]').show();
				$('input[name=urname]').show();
				$('h3.requisit').show();
			}
		})

		$('input.latine').on('keyup', function(){
			val = $(this).val();
			$(this).val(val.replace(/[А-Яа-я]/, ''))
		})


		function NumberSplit (number) {
			return number.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1 ');
		}
		
		////////////////////////////////
		
		
		
		
		
		
		
		
		
				
		
		
		

	}
)