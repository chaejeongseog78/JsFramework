<!-- [e] contents -->
</section>

</div>
<!-- [e] wrapper -->

<footer class="m-0 flex justify-center items-center h-[40px] border border-t-indigo-500">
	<em>&copy; 2024 JSD 2</em>
</footer>


<?php
if (isset($_config) && isset($_config['_URL_Last_FileName'])) {
	if (file_exists(APPPATH . "Views/js/" . $_config['_URL_Last_FileName'] . ".js")) {
		require(APPPATH . "Views/js/" . $_config['_URL_Last_FileName'] . ".js");
	}
}
?>

</body>

</html>
