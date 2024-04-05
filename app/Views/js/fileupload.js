document.addEventListener("DOMContentLoaded", () => {
	const upload_btn = document.querySelector("#upload_btn");
	upload_btn.addEventListener("click", () => {
		const f = document.querySelector("#form1");
		const f1 = new FormData(f);
		const xhr = new XMLHttpRequest();
		xhr.open("POST", "./upload/file", true);
		xhr.send(f1);
		xhr.onload = () => {
			if (xhr.status == 200) {
				const data = JSON.parse(xhr.responseText);
				// console.log(data.file_info_array);
				const dis = document.querySelector("#dis");

				for (let arr of data.file_info_array) {
					dis.innerHTML +=
						'<img src="http://localhost/upload/showimg/' + arr.savedPath + '">';
				}
			}
		};
	});
});
