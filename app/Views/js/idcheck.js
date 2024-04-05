document.addEventListener("DOMContentLoaded", () => {
	const listener = () => {
		document.querySelector("#ajax_btn").addEventListener("click", (e) => {
			e.preventDefault();
			const user_id = document.querySelector("#user_id");
			const xhr = XMLHttpRequest();
			const gUrl =
				ajax_URL_Last_FileName +
				"/idcheck/id=" +
				user_id.value +
				"&pw=123&gbn=admin";
			// alert(gUrl);
			xhr.open("GET", gUrl, true);
			// 요청 전송
			xhr.send();

			// 통신후 작업
			xhr.onload = () => {
				//통신 성공
				if (xhr.status == 200) {
					const span_msg = document.querySelector("#msg");
					const obj = JSON.parse(xhr.response);
					// console.log(obj);
					if (obj.DAT == "exist") {
						span_msg.textContent = "이미 사용중인 아이디입니다.";
						user_id.value = "";
						user_id.focus();
					} else {
						span_msg.textContent = "사용이 가능한 아이디입니다.";
					}
				} else {
					console.log(xhr.status);
				}
			};
		});
	};

	const getList = () => {};
	const onLoad = () => {};
	const setGrobalFunction = () => {};
	const init = () => {
		//onLoad();
		//getList(1);
		listener();
		// setGrobalFunction();
	};

	init();
});
