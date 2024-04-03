		<script type="text/javascript">
    const upload_btn = document.querySelector("#upload_btn");
    upload_btn.addEventListener("click", () => {
      const f = document.querySelector("#form1");
      const f1 = new FormData(f);
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "./fileupload.php", true);
      xhr.send(f1);
      xhr.onload = () => {
        if (xhr.status == 200) {
          const data = JSON.parse(xhr.responseText);
          if (data.result == "success") {
            const dis = document.querySelector("#dis");

            if(data.img.indexOf('|') != -1) {
              const ar1 = data.img.split('|');
              for (let aa of ar1) {
                dis.innerHTML += '<img src="' + aa + '">';
              }
            } else {
              dis.innerHTML += '<img src="' + data.img + '">';
            }
          }
        }
      }

    });
  </script>
