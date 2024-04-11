document.addEventListener("DOMContentLoaded", () => {
	const Frm = document.Frm;

	const listener = () => {
		btn_submit = document.querySelector("#btn_submit");
		btn_submit.addEventListener("click", (e) => {
			e.preventDefault();

			if (chkForm()) {
				// $.confirm({
				// 	keyboardEnabled: true,
				// 	content:
				// 		'<p>등록 하시겠습니까1? <span class="txtBold">[Enter:Save / ESC:Cancel]</span></p>',
				// 	confirmKeys: [13], //Enter
				// 	confirm: function () {
				// 		chkWrite();
				// 	},
				// 	cancel: function () {},
				// });
			}

			const f1 = new FormData();

			f1.append("name", Frm.name.value);
			f1.append("password", Frm.password.value);
			f1.append("subject", Frm.subject.value);
			f1.append("content", markupStr);

			const xhr = new XMLHttpRequest();
			const gUrl = ajax_URL_Last_Nm + "/append";
			alert(gUrl);
			xhr.open("POST", gUrl, true);
			xhr.send(f1);
			btn_submit.disabled = true;
			xhr.onload = () => {
				if (xhr.status == 200) {
					const obj = JSON.parse(xhr.response);
					console.log(obj);
				} else {
					alert(xhr.status);
				}
			};
		});
	};

	var chkForm = function () {
		if (Frm.name.value == "") {
			alert("글쓴이를 입력하세요");
			Frm.name.focus();
			return false;
		}
		if (Frm.password.value == "") {
			alert("비밀번호를 입력하세요");
			Frm.password.focus();
			return false;
		}
		if (Frm.subject.value == "") {
			alert("제목을 입력하세요");
			Frm.subject.focus();
			return false;
		}

		const markupStr = $("#summernote").summernote("code");
		if (markupStr == "<p><br></p>") {
			alert("내용을 입력하세요");
			return false;
		}

		// if (empty(Frm.pg_id.value)) {
		// 	$("input[name='pg_id']").parent().addClass("error");
		// 	Frm.pg_id.focus();
		// 	alertMSGbyTime("PG ID를 선택하세요!", 4000);
		// 	return false;
		// } else {
		// 	$("input[name='pg_id']").parent().addClass("success");
		// }
		// if (!form_check("#form_reg")) {
		// 	return false;
		// }
		return true;
	};

	const getList = () => {};

	const onLoad = () => {
		// $.alert({
		// 	title: "Alert!",
		// 	content: "Simple alert!",
		// });
		$("#summernote").summernote({
			placeholder: "내용을 입력하여 주세요",
			tabsize: 2,
			height: 300,
			toolbar: [
				["style", ["style"]],
				["font", ["bold", "underline", "clear"]],
				["color", ["color"]],
				["para", ["ul", "ol", "paragraph"]],
				["table", ["table"]],
				["insert", ["link", "picture", "video"]],
				["view", ["fullscreen", "codeview", "help"]],
			],
		});
	};

	const init = () => {
		onLoad();
		//getList(1);
		listener();
	};

	init();
});
