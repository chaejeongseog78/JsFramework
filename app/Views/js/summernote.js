document.addEventListener("DOMContentLoaded", () => {
	const Frm = document.Frm;

	const listener = () => {
		btn_submit = document.querySelector("#btn_submit");
		btn_submit.addEventListener("click", (e) => {
			e.preventDefault();
			console.log("click");
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

			const f1 = new FormData();

			f1.append("name", Frm.name.value);
			f1.append("password", Frm.password.value);
			f1.append("subject", Frm.subject.value);
			f1.append("content", markupStr);

			const xhr = new XMLHttpRequest();
			const gUrl = ajax_URL_Last_FileName + "/append";
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

	const getList = () => {};

	const onLoad = () => {
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
