(function ($) {
	"use strict";

	document.addEventListener("DOMContentLoaded", () => {
		const findCoreMnuDat = (id) => {
			let dats = null;
			for (let i = 0; i < window.ObjInitMnu.length; i++) {
				dats = window.ObjInitMnu[i];
				if (dats.id == id) {
					return { inx: i, dats: dats };
				}
			}
		};
		const gDisMnuMenu = () => {
			let movObjInitMnu = window.ObjInitMnu;
			if (isset(window.urlParams.mnu) && !empty(window.urlParams.mnu)) {
				let currMnuObj = findCoreMnuDat(window.urlParams.mnu);
				if (isset(currMnuObj) && !empty(currMnuObj)) {
					// console.log(window.ObjInitMnu);
					// console.log(currMnuObj);
					// console.log(currMnuObj.dats.state.opened);
					currMnuObj.dats.state.opened = true;
					// console.log(currMnuObj.dats.state.selected);
					currMnuObj.dats.state.selected = true;
					movObjInitMnu[currMnuObj.inx] = currMnuObj.dats;
				}
			}
			$("#left_menu_middle").jstree({
				plugins: ["search", "wholerow"],
				core: {
					data: movObjInitMnu,
					multiple: false,
				},
				check_callback: true, // 요거이 없으면, create_node 안먹음
			});
		};

		const mnuOnLOad = () => {
			$.ajax({
				url: "/ajax/mnumenu/getmnu",
				cache: true,
				type: "get",
				async: true,
				crossDomain: true,
				beforeSend: function () {
					if (window.localCache.exist("InitMnu")) {
						window.ObjInitMnu = window.localCache.get("InitMnu");
						// console.log(window.ObjInitMnu);
						// console.log("localcache1");
						//return true;//Cache 사용
						//return false;//Cache 초기화
						return true;
					} else {
						return true;
					}
				},
				success: function (result) {
					// console.log(result);
					window.localCache.set("InitMnu", result);
					window.ObjInitMnu = window.localCache.get("InitMnu");
				},
				error: function (error) {
					console.log("getMnu : " + error);
					if (window.localCache.exist("InitMnu")) {
						window.ObjInitMnu = window.localCache.get("InitMnu");
						// console.log("localcache2");
					}
				},
			});
		};

		const mnuPullDownOnLoad = () => {
			$.ajax({
				url: "/ajax/mnumenu/getPullDownMnu",
				cache: true,
				type: "get",
				async: true,
				crossDomain: true,
				beforeSend: function () {
					if (window.localCache.exist("InitPullDownMnu")) {
						window.ObjInitMnuPullDown =
							window.localCache.get("InitPullDownMnu");
						// console.log(window.ObjInitMnuPullDown);
						// console.log("localcache1");
						//return true;//Cache 사용
						//return false;//Cache 초기화
						return true;
					} else {
						return true;
					}
				},
				success: function (data) {
					// console.log(data)
					if (isset(data) && !empty(data)) {
						if (data.MSG == "OK") {
							window.localCache.set("InitPullDownMnu", data.DAT);
							window.ObjInitMnuPullDown =
								window.localCache.get("InitPullDownMnu");
							document.getElementById("navpulldown").innerHTML =
								window.ObjInitMnuPullDown;
						}
					}
				},
				error: function (error) {
					console.log("getMnuPullDown : " + error);
					if (window.localCache.exist("InitPullDownMnu")) {
						window.ObjInitMnu = window.localCache.get("InitPullDownMnu");
						// console.log("localcache2");
					}
				},
			});
		};

		const mnuInit = () => {
			mnuOnLOad();
			gDisMnuMenu();
			mnuPullDownOnLoad();
		};

		mnuInit();
	});

	$(document).ready(function () {
		const inxListener = () => {
			// Node선택
			$("#left_menu_middle").on("select_node.jstree", function (e, data) {
				const obj = data.node.original;
				// console.log("obj=>", obj);
				const gUrl = obj.gurl;
				if (gUrl) {
					const moveURL = gUrl + "?mnu=" + obj.id;
					console.log("url=>", moveURL);
					goToUrl(moveURL);
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
