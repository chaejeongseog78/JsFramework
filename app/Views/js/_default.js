(function ($) {
	document.addEventListener("DOMContentLoaded", () => {
		$("#left_menu_middle").jstree({
			plugins: ["search", "wholerow"],
			core: {
				data: function (obj, cb) {
					// console.log("ck1:", obj, this);
					const xhr = new XMLHttpRequest();
					// xhr.open("get", "/index.php/ajax/mnumenu/getmnu", true);
					xhr.open("get", "/ajax/mnumenu/getmnu", true);
					xhr.onreadystatechange = function () {
						if (xhr.readyState == 4 && xhr.status == 200) {
							// console.log(xhr.responseText);
							cb.call(obj, JSON.parse(xhr.responseText));
							$("#left_menu_middle").jstree(true);
						}
					};
					xhr.send();
				},
				check_callback: true, // 요거이 없으면, create_node 안먹음
			},
		});
	});

	$(document).ready(function () {
		const inxListener = () => {
			// Node선택
			$("#left_menu_middle").on("select_node.jstree", function (e, data) {
				const obj = data.node.original;
				console.log("obj=>", obj);
				const moveURL = obj.gurl;
				console.log("url=>", moveURL);
				if (moveURL) {
					self.location = moveURL;
				}
			});

			$(document).on("click", "#btn_schCatNm", function (e) {
				$("#left_menu_middle").jstree(true).search($("#schCatNm").val());
			});

			$(document).on("click", "#OpnNodes", function (e) {
				$("#left_menu_middle").jstree("open_all");
			});

			$(document).on("click", "#ClsNodes", function (e) {
				$("#left_menu_middle").jstree("close_all");
			});

			$("#left_menu_middle")
				.on("click", function (e) {
					$("#left_menu_middle").jstree(true).toggle_node(e.target);
				})
				.jstree({
					core: {
						dblclick_toggle: false,
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
			inxListener();
		};

		const inxInit = () => {
			inxOnLoad();
		};

		inxInit();
	});
})(jQuery);
