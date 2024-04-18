<!DOCTYPE html>
<html lang="ko">

<head>
	<title><?php echo (isset($_TitleName)) ? $_TitleName :  ''; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Keywords" content="<?php echo (isset($_Keywords)) ? $_Keywords :  ''; ?>">
	<meta name="Description" content="<?php echo (isset($_Description)) ? $_Description :  ''; ?>">
	<meta http-equiv="Site-Enter" content="blendTrans(Duration=1.0)">
	<meta http-equiv="Site-Exit" content="blendTrans(Duration=1.0)">
	<link rel="shortcut icon" href="/favicon.ico">

	<link type="text/css" rel="stylesheet" href="/css/_init.css?ver=<?= time(); ?>">
	<link type="text/css" rel="stylesheet" href="/css/_layout.css?ver=<?= time(); ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<?php
	require($_config['ABSPATH'] . "/inc/jsncss.php");
	echo '<script src="https://cdn.tailwindcss.com"></script>';
	//echo '<link rel="stylesheet" href="/css/_tailwind.css?ver=' . time() . ">";
	?>


</head>

<!-- <body oncontextmenu="return false" onselectstart="return false" ondragstart="return false"> -->

<body>

	<header class="flex flex-row basis-0 justify-between border border-b-indigo-500 h-[70px] m-0">
		<div id="logo" class="w-[281px] border border-r-sky-400 flex justify-center items-center">
			<a href="/main">JS Home</a>
		</div>
		<div id="head" class="flex flex-row justify-end items-center p-[20px] gap-x-24">
			<p>About</p>
			<p>Contact US</p>
			<p>Blog</p>
		</div>
	</header>

	<main class="flex flex-row m-0 flex-nowrap">

		<nav class="flex flex-col border border-r-sky-400">

			<div class="p-3">
				<div id="navpulldown" class="flex justify-center items-center"></div>
			</div>

			<form class="bg-white rounded px-6 pt-4 pb-6 mb-2 w-[280px]">
				<div class="mb-4">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="username">
						UserID
					</label>
					<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" autocomplete="off">
				</div>
				<div class="mb-6">
					<label class="block text-gray-700 text-sm font-bold mb-2" for="password">
						Password
					</label>
					<input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="*********" autocomplete="off">
				</div>
				<div class="flex items-center justify-between">
					<button class="h-8 px-4 m-2 text-sm text-indigo-100 transition-colors duration-150 bg-blue-500 rounded-lg focus:shadow-outline hover:bg-blue-800">Login</button>
					<a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
						Forgot Password?
					</a>
				</div>
			</form>

			<div id="sidebar">
				<div id="left_menu">
					<div id="left_menu_top" class="border border-t-skyblue-900">
						<div class="flex justify-between items-center px-[10px] py-[10px]">
							<button id="OpnNodes" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">expand</button>
							<button id="btn_schCatNm" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">search</button>
							<button id="ClsNodes" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">collapse</button>
						</div>
						<div class="flex justify-center items-center px-3">
							<input type="text" name="schCatNm" id="schCatNm" value="" class="border border-sky-700 form-input min-w-full" />
						</div>
					</div>
					<div id="left_menu_middle"></div>
					<div id="left_menu_bottom"></div>
				</div>

				<div class="p-[10px]">
					<ul>
						<li class="font-bold"><a href="/easytree11">Category1</a></li>
						<li class="font-bold"><a href="/easytree14">Category2</a></li>
						<li class="font-bold"><a href="/easytree10">CatCRUDs</a></li>
						<li class="font-bold"><a href="/jstree">JStree</a></li>
						<li class="font-bold"><a href="/jstree01">JStree01</a></li>
						<li class="font-bold"><a href="/jstree02">JStree02</a></li>
						<li class="font-bold"><a href="/jstreecss1">JStreeCSS1</a></li>
						<li class="font-bold"><a href="/jstreecss2">JStreeCSS2</a></li>
					</ul>
					<ul>
						<li class="font-bold"><a href="/upload/showimg">ShowImg</a></li>
					</ul>
					<ul>
						<li class="font-bold"><a href="/doc/swagger/dist/">Swagger</a></li>
					</ul>
				</div>
			</div>

		</nav>

		<!-- [s] contents -->
		<!-- <section class="p-[20px] w-[calc(100%-280px)] h-[calc(100%-112px)]"> -->
		<section class="p-[16px] min-h-full flex flex-col flex-auto border">
