(function ($) {
	const inxstateChanged = (nodes, nodesJson) => {
		window.inxarrsql = [];
		window.inxactiveDepth = 0;
		window.inxorderlist = "<ul>";
		inxnodesChk(nodes, 0, false);
		window.inxorderlist += "</ul>";
		//trace(window.inxorderlist);
		//window.inxorderListTree = $("#category_menu_middle").html(window.inxorderlist).easytree();
		window.inxorderListTree = $("#left_menu_middle").html(window.inxorderlist);

		$("#left_menu_middle li:not(:has(ul))").css({
			"list-style-image": 'url("/img/minus.gif")',
		});
		$("#left_menu_middle li:has(ul)")
			.css({ cursor: "pointer", "list-style-image": 'url("/img/plus.gif")' })
			.children()
			.hide();

		window.inxnodejson = nodesJson;
		//trace(window.inxarrsql);
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
			window.inxorderlist +=
				"<li data-id=" +
				str.substring(1, str.length) +
				" data-depth=" +
				depth +
				" data-info=" +
				thread_info +
				">" +
				nodes[i].text;

			window.inxarrsql.push({
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
				window.inxactiveDepth = depth + 1;
				window.activeInfo = thread_info;
			}

			if (active) {
				if (window.inxactiveDepth == depth) {
					if (
						window.activeInfo ==
						thread_info.substring(0, window.inxactiveDepth * 4)
					) {
						str = nodes[i].href;
						trace(nodes[i].text + " | " + str.substring(1, str.length));
					}
				}
			} else {
				window.inxactiveDepth = 0;
			}

			if (nodes[i].children && nodes[i].children.length > 0) {
				window.inxorderlist += "<ul>";
				inxnodesChk(nodes[i].children, depth + 1, active);
				window.inxorderlist += "</ul>";
				window.inxorderlist += "</li>";
			} else {
				window.inxorderlist += "</li>";
			}
		}
	};

	$(document).ready(function () {
		const inxListener = (data) => {
			window.jsonData = data;
			//trace(window.jsonData);

			window.inxeasytree = $("#left_menu_middle").easytree({
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
				// async: false,
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
				// console.log(wd);
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
