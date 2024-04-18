<!-- [e] contents -->
</section>

</main>

<footer class="m-0 flex justify-center items-center h-[40px] border border-t-indigo-500">
	<p class="text-center text-gray-500 text-xs">
		&copy;2024 JSD Corp. All rights reserved.
	</p>
</footer>


<?php
echo "<script type='text/javascript'>var ajax_URL_Last_Nm = '/ajax/" . $_config['_URL_Last_Nm'] . "';</script>";
echo "<script type='text/javascript'>";
if (file_exists(APPPATH . "Views/js/_default.js")) {
	require(APPPATH . "Views/js/_default.js");
}
if (isset($_config) && isset($_config['_URL_Last_Nm'])) {
	if (file_exists(APPPATH . "Views/js/" . $_config['_URL_Last_Nm'] . ".js")) {
		require(APPPATH . "Views/js/" . $_config['_URL_Last_Nm'] . ".js");
	}
}
echo "</script>";
?>

</body>

</html>
