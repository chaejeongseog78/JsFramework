(function ($) {
	const inxstateChanged = (nodes, nodesJson) => {
		window.arrsql = [];
		window.activeDepth = 0;
		window.orderlist = "<ul>";
		inxnodesChk(nodes, 0, false);
		window.orderlist += "</ul>";
		//trace(window.orderlist);
		//window.orderListTree = $("#category_menu_middle").html(window.orderlist).easytree();
		window.orderListTree = $("#left_menu_middle").html(window.orderlist);

		$("#left_menu_middle li:not(:has(ul))").css({
			"list-style-image": 'url("/img/minus.gif")',
		});
		$("#left_menu_middle li:has(ul)")
			.css({ cursor: "pointer", "list-style-image": 'url("/img/plus.gif")' })
			.children()
			.hide();

		window.nodejson = nodesJson;
		//trace(window.arrsql);
	};

	const inxnumToStr = (thread_num) => {
		let my_thread_info = "";
		if (thread_num >= 100 && thread_num < 1000) {
			my_thread_info = "0" + thread_num;
		} else if (thread_num >= 10 && thread_num < 100) {
			my_thread_info = "00" + thread_num;
		} else if (thread_num < 10) {
			my_thread_info = "000" + thread_num;
		} else {
			my_thread_info = thread_num;
		}
		return my_thread_info;
	};

	const inxnodesChk = (nodes, depth, active) => {
		let str;
		let thread_num = 0;
		let i = 0;
		let start = 0;
		for (i = 0; i < nodes.length; i++) {
			str = nodes[i].id.split("_");
			start = str.length - depth;
			thread_info = "";
			for (cnt = start; cnt < str.length + 1; cnt++) {
				thread_num = Number(str[cnt - 1]);
				thread_info += inxnumToStr(thread_num);
			}

			str = nodes[i].href;
			window.orderlist +=
				"<li data-id=" +
				str.substring(1, str.length) +
				" data-depth=" +
				depth +
				" data-info=" +
				thread_info +
				">" +
				nodes[i].text;

			window.arrsql.push({
				id: str.substring(1, str.length),
				depth: depth,
				info: thread_info,
				name: nodes[i].text,
			});

			if (nodes[i].isActive) {
				trace("------------------------------------------");
				trace("click_text=>" + nodes[i].text);
				window.selectedTxt = nodes[i].text;

				trace("click_id=>" + nodes[i].id);
				window.selectedId = nodes[i].id;

				trace("click_depth=>" + depth);
				window._depth = depth;

				trace("click_info=>" + thread_info);
				window._thread_info = thread_info;
				trace("------------------------------------------");

				active = true;
				window.activeDepth = depth + 1;
				window.activeInfo = thread_info;
			}

			if (active) {
				if (window.activeDepth == depth) {
					if (
						window.activeInfo ==
						thread_info.substring(0, window.activeDepth * 4)
					) {
						str = nodes[i].href;
						trace(nodes[i].text + " | " + str.substring(1, str.length));
					}
				}
			} else {
				window.activeDepth = 0;
			}

			if (nodes[i].children && nodes[i].children.length > 0) {
				window.orderlist += "<ul>";
				inxnodesChk(nodes[i].children, depth + 1, active);
				window.orderlist += "</ul>";
				window.orderlist += "</li>";
			} else {
				window.orderlist += "</li>";
			}
		}
	};

	$(document).ready(function () {
		const inxListener = (data) => {
			window.jsonData = data;
			//trace(window.jsonData);

			window.easytree = $("#left_menu_middle").easytree({
				data: window.jsonData,
				stateChanged: inxstateChanged,
			});

			$(document).on("click", "#left_menu_middle li:has(ul)", function (e) {
				let uid = $(this).attr("data-id");
				let info = $(this).attr("data-info");
				trace(uid + " ?? li:has(ul) " + info);

				if (this == e.target) {
					if ($(this).children().is(":hidden")) {
						$(this)
							.css("list-style-image", 'url("/img/minus.gif")')
							.children()
							.slideDown("fast");
					} else {
						$(this)
							.css("list-style-image", 'url("/img/plus.gif")')
							.children()
							.slideUp("fast");
					}
				}
				$(this)
					.children("ul")
					.children("li:has(ul) li")
					.each(function (index, element) {
						$(this).parent().css({ overflow: "visible" });
					});
				return false;
			});

			$(document).on("click", "#OpnNodes", function (e) {
				e.stopPropagation();
				$("#left_menu_middle li:has(ul)")
					.css({
						cursor: "pointer",
						"list-style-image": 'url("/img/plus.gif")',
					})
					.children()
					.hide();
				$("#left_menu_middle li:has(ul)").trigger("click"); // all depth open
			});

			$(document).on(
				"click",
				"#left_menu_middle li:not(:has(ul))",
				function (e) {
					var uid = $(this).attr("data-id");
					var info = $(this).attr("data-info");
					trace(uid + " li:not(:has(ul) " + info);
				}
			);

			$(document).on("click", "#ClsNodes", function (e) {
				$("#left_menu_middle li:has(ul)")
					.css({
						cursor: "pointer",
						"list-style-image": 'url("/img/plus.gif")',
					})
					.children()
					.hide();
				inxOnClickProc();
			});

			// 강제크릭
			inxOnClickProc();
		};

		const inxOnClickProc = () => {
			if ($("#left_menu_middle li:has(ul)")) {
				trace("li:has(ul) OK");
				$("#left_menu_middle > ul > li").each(function () {
					if ($(this).attr("data-depth") == 0) {
						trace("inxdepth=>" + $(this).attr("data-depth"));
						// $(this).trigger('click');
					}
				});
				$("#left_menu_middle > ul > li").trigger("click");
			}
		};

		const inxOnLoadCat = () => {
			$.ajax({
				url: "/data/getCategory.php",
				dataType: "json",
				data: {},
				success: function (data) {
					if (data !== null) {
						inxListener(data);
					}
				},
				complete: function () {
					//trace('complete');
				},
				error: function (data) {
					trace("error");
				},
			});
		};

		const inxScrollMnu = () => {
			$(window).scroll(function () {
				let wd = $("#sidebar").width();
				let hi = $("#sidebar").height();
				console.log(wd);
				let st = $(this).scrollTop();
				// trace(st + ">" + $("#sidebar").height());
				if (st > $("#sidebar").height()) {
					$("#sidebar")
						.hide()
						.css({
							position: "fixed",
							width: wd,
							height: hi,
							filter: "alpha(opacity=90)",
							opacity: "0.9",
							"-moz-opacity": "0.9",
						})
						.slideDown("fast");
					$("#sidebar")
						.css({
							position: "absolute",
							"z-index": "998",
							width: wd,
							height: hi,
							filter: "alpha(opacity=90)",
							opacity: "0.9",
							"-moz-opacity": "0.9",
						})
						.stop()
						.animate({ top: st + 6 + "px" }, 500);
				} else {
					$("#sidebar")
						.hide()
						.css({
							position: "static",
							width: wd,
							height: hi,
							filter: "alpha(opacity=100)",
							opacity: "1",
							"-moz-opacity": "1",
						})
						.slideDown(0);
				}
			});
		};

		const inxOnLoad = () => {
			inxScrollMnu();
			inxOnLoadCat();
		};

		const inxInit = () => {
			inxOnLoad();
		};

		inxInit();
	});
})(jQuery);
