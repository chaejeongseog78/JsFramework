<script>
	{$(window).scroll(function () {
		let wd = $("#sidebar").width();
		// console.log(wd);
		let st = $(this).scrollTop();
		// trace(st + ">" + $("#sidebar").height());
		if (st > $("#sidebar").height()) {
			$("#sidebar")
				.hide()
				.css({
					position: "fixed",
					width: wd,
					filter: "alpha(opacity=90)",
					opacity: "0.9",
					"-moz-opacity": "0.9",
				})
				.slideDown(0);
			$("#sidebar")
				.css({
					position: "absolute",
					"z-index": "998",
					width: wd,
					filter: "alpha(opacity=90)",
					opacity: "0.9",
					"-moz-opacity": "0.9",
				})
				.stop()
				.animate({ top: st + 4 + "px" }, 500);
		} else {
			$("#sidebar")
				.hide()
				.css({
					position: "static",
					width: wd,
					filter: "alpha(opacity=100)",
					opacity: "1",
					"-moz-opacity": "1",
				})
				.slideDown(0);
		}
	})}
</script>;
