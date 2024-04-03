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

	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
	<link rel="stylesheet" href="/css/_tailwind.css">

</head>

<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">

	<header class="flex flex-row basis-0 justify-between border border-b-indigo-500 h-[70px] m-0">
		<div id="logo" class="w-[184px] border border-r-sky-400 flex justify-center items-center"><a href="/">LOGO2</a></div>
		<div id="head" class="flex flex-row justify-end items-center p-[20px] gap-x-24">
			<p>About</p>
			<p>Contact US</p>
			<p>Blog</p>
		</div>
	</header>

	<!-- [s] wrapper -->
	<div id="wrapper" class="flex flex-row m-0 flex-nowrap">

		<nav class="flex flex-col border border-r-sky-400">
			<div id="sidebar" class="bg-[#DDD]">
				<div id="left_menu">
					<div id="left_menu_top">Top</div>
					<div id="left_menu_middle">
						<h1><a href="/fileupload">PHOTO올리기</a></h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
						<h1>메뉴</h1>
					</div>
					<div id="left_menu_bottom">Bottom</div>
				</div>
			</div>
			<div class="w-[184px]">jsd</div>
		</nav>

		<!-- [s] contents -->
		<section class="p-[20px] w-[calc(100vh-186px)] h-[calc(100%-112px)]">
