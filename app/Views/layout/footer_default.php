<!-- [e] contents -->
</section>

</div>
<!-- [e] wrapper -->

<footer class="m-0 flex justify-center items-center h-[40px] border border-t-indigo-500">
	<p class="text-center text-gray-500 text-xs">
		&copy;2024 JSD Corp. All rights reserved.
	</p>
</footer>


<?php
echo "<script type='text/javascript'>var ajax_URL_Last_FileName = '/ajax/" . $_config['_URL_Last_FileName'] . "';</script>";
echo "<script type='text/javascript'>";
if (file_exists(APPPATH . "Views/js/_default.js")) {
	require(APPPATH . "Views/js/_default.js");
}
if (isset($_config) && isset($_config['_URL_Last_FileName'])) {
	if (file_exists(APPPATH . "Views/js/" . $_config['_URL_Last_FileName'] . ".js")) {
		require(APPPATH . "Views/js/" . $_config['_URL_Last_FileName'] . ".js");
	}
}
echo "</script>";
?>

</body>

</html>
