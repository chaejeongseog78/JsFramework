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

	<link type="text/css" rel="stylesheet" href="/css/_init.css?<?= time(); ?>">
	<link type="text/css" rel="stylesheet" href="/css/_layout.css?<?= time(); ?>">
	<link type="text/css" rel="stylesheet" href="/css/_style.css?<?= time() ?>">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

	<?php
	require($_config['ABSPATH'] . "/inc/jsncss.php");
	?>

	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
	<link rel="stylesheet" href="/css/_tailwind.css?<?= time() ?>">


</head>

<!-- <body oncontextmenu="return false" onselectstart="return false" ondragstart="return false"> -->

<body>

	<header class="flex flex-row basis-0 justify-between border border-b-indigo-500 h-[70px] m-0">
		<div id="logo" class="w-[281px] border border-r-sky-400 flex justify-center items-center">
			<a href="/">JS Home</a>
		</div>
		<div id="head" class="flex flex-row justify-end items-center p-[20px] gap-x-24">
			<p>About</p>
			<p>Contact US</p>
			<p>Blog</p>
		</div>
	</header>

	<!-- [s] wrapper -->
	<div id="wrapper" class="flex flex-row m-0 flex-nowrap">

		<nav class="flex flex-col border border-r-sky-400">

			<form class="bg-white shadow-md rounded px-6 pt-4 pb-6 mb-2 w-[280px]">
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
				<div class="flex justify-between items-center p-[15px]">
					<button id="OpnNodes" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">open</button>
					<button id="ClsNodes" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">close</button>
				</div>
				<div id="left_menu">
					<div id="left_menu_top" class="w-[250px] flex justify-between"> </div>
					<div id="left_menu_middle" class="w-[250px]"> </div>
					<div id="left_menu_bottom" class="w-[250px] m-1 py-[20px]  border border-t-sky-400">
						<ul>
							<li class="font-bold"><a href="/easytree11">Category</a></li>
						</ul>
						<ul>
							<li class="font-bold"><a href="/fileupload">PHOTO올리기</a></li>
						</ul>
						<ul>
							<li class="font-bold"><a href="/test">TestPage</a></li>
						</ul>
						<ul>
							<li class="font-bold"><a href="/idcheck">중복체크</a></li>
						</ul>
						<ul>
							<li class="font-bold"><a href="/tailwindcss">TailwindCss</a></li>
						</ul>
						<ul>
							<li class="font-bold"><a href="/summernote">섬어Note</a></li>
						</ul>
						<ul>
							<li class="font-bold"><a href="/upload/showimg">ShowImg</a></li>
						</ul>
						<ul>
							<li class="font-bold"><a href="/doc/swagger/dist/">Swagger</a></li>
						</ul>
					</div>
				</div>
			</div>

		</nav>

		<!-- [s] contents -->
		<section class="p-[20px] w-[calc(100vh-186px)] h-[calc(100%-112px)]">
