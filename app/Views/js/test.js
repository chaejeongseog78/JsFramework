document.addEventListener("DOMContentLoaded", () => {
	const onLoad = () => {
		$.confirm({
			content:
				'등록 하시겠습니까? <span class="font-bold">[Enter:Save / ESC:Cancel]</span>',
			closeIcon: true,
			boxWidth: "450px",
			title: "JS",
			titleClass: "text-blue-700",
			buttons: {
				specialKey: {
					btnClass: "btn-dark",
					text: "Enter=>Save",
					keys: ["enter"],
					action: function () {
						$.alert("Enter was pressed");
					},
				},
				cancel: function () {},
			},
		});
	};

	const init = () => {
		onLoad();
		// getList(1);
		// listener();
	};

	init();
});
