<!DOCTYPE html>
<html lang="ko">

<head>
	<title><?php echo (isset($_TitleName)) ? $_TitleName :  ''; ?>`</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Keywords" content="<?php echo (isset($_Keywords)) ? $_Keywords :  ''; ?>">
	<meta name="Description" content="<?php echo (isset($_Description)) ? $_Description :  ''; ?>">
	<meta http-equiv="Site-Enter" content="blendTrans(Duration=1.0)">
	<meta http-equiv="Site-Exit" content="blendTrans(Duration=1.0)">
	<link rel="shortcut icon" href="/favicon.ico">

	<link type="text/css" rel="stylesheet" href="/css/_init.css">
	<link type="text/css" rel="stylesheet" href="/css/_layout.css">
	<link type="text/css" rel="stylesheet" href="/css/_style.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<?php
	require($_config['ABSPATH'] . "/inc/jsncss.php");
	?>

	<script src="https://cdn.tailwindcss.com"></script>

</head>

<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

	<header class="flex flex-row border border-b-indigo-500 h-[70px] m-0">
		<div id="logo" class="w-[184px] border border-r-sky-700 flex justify-center items-center">LOGO2</div>
		<div id="head" class="flex flex-row justify-end items-center w-full p-[20px] gap-7">
			<p>About</p>
			<p>Contact US</p>
			<p>Blog</p>
		</div>
	</header>

	<!-- [s] wrapper -->
	<div id="wrapper" class="flex flex-row">

		<nav class="border border-r-indigo-500 m-0 w-[184px]">
			<div id="sidebar" class="bg-[#DDD]">
				<div id="left_menu">
					<div id="left_menu_top">Top</div>
					<div id="left_menu_middle">
						<h1>메뉴</h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
					</div>
					<div id="left_menu_bottom">Bottom</div>
				</div>
			</div>
		</nav>

		<!-- [s] contents -->
		<section class="m-0 border border-blue-90 w-full h-full p-[20px]">
