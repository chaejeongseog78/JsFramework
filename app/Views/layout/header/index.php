<?php
//https://youtu.be/9uIk_91GQYI
//$random=array("r6TQegzZ4zA","9uIk_91GQYI","X0Cv0l-j86Y","63D43-xGZdo","cr5kcR78lGQ","hlWiI4xVXKY","2OEL4P1Rz04","ftlvreFtA2A","63D43-xGZdo","fUxVJkdZ3c4", "cr5kcR78lGQ", "kuG4zgXM3ko", "ghd-Fckttus", "EGOWYthsZEg", "pdAg3jfTTXY", "ZKTCrmCEWds", "v-t3L7nWEbg", "aeuiLgUBK9o", "vfnGJOTtp0k", "PgV-z7Q2t5U", "DGQwd1_dpuc", "TvCQHM3kA6Q", "n_pPK5NYxM0", "PAFTQ9Ns1T4", "9uIk_91GQYI", "hlWiI4xVXKY", "usSEwxyu268", "G1scWilEZMM", "lFrLhclVcic", "vr0qNXmkUJ8", "lM02vNMRRB0", "7Rl00LuU9Ko", "d90JYK916AU", "ab0TSkLe-E0");
#$random=array("ol40Gm8u5js","9f0FOoNlrEY","GZZulzn5xR8","bl_eV3MqOwI","WWn4lfNQy2s","2b2gJu-g3qE","qwQfZscZlOA","MxcJtLbIhvs","3PZ65s2qLTE","hlWiI4xVXKY","linlz7-Pnvw","QlgRNWhrpLk","cr5kcR78lGQ","hlWiI4xVXKY","2OEL4P1Rz04","9uIk_91GQYI","68EV5kohmAU","v-t3L7nWEbg");
$random = array("4purD15kRu4");

srand((float)microtime() * 1000000);
shuffle($random);

$VideoId = $random[array_rand($random)];
?>

<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AceJS</title>

	<!-- <link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap.min.css" /> -->


	<!-- [s] ### Start Codeing -->
	<style>
		@import url(https://fonts.googleapis.com/earlyaccess/nanumgothic.css);
		@import url(https://fonts.googleapis.com/earlyaccess/nanummyeongjo.css);
		@import url(https://fonts.googleapis.com/css?family=Roboto);


		@font-face {
			font-family: 'Nanumgothic Bold';
			src: url('/font/fonts/NanumGothicBold.eot');
			src: url('/font/fonts/NanumGothicBold.eot?iefix'),
				local('☺'),
				url('/font/fonts/NanumGothicBold.woff') format('woff'),
				url('/font/fonts/NanumGothicBold.ttf') format('truetype');
		}

		.log {
			border: 1px solid red;
		}

		html,
		div,
		span,
		applet,
		object,
		iframe,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		p,
		blockquote,
		pre,
		a,
		abbr,
		acronym,
		address,
		big,
		cite,
		code,
		del,
		dfn,
		em,
		font,
		img,
		ins,
		kbd,
		q,
		s,
		samp,
		small,
		strike,
		strong,
		sub,
		sup,
		tt,
		var,
		b,
		u,
		i,
		center,
		form,
		dl,
		dt,
		dd,
		ol,
		ul,
		li,
		fieldset,
		form,
		label,
		legend {
			margin: 0;
			padding: 0;
			border: 0;
			outline: 0;
			/*font-size: 100%;*/
			vertical-align: top;
			background: transparent;
			word-break: break-all;
		}

		body {
			color: #fff;
			height: 100%;
			width: 100%;
			background-color: #333;

			text-align: center;
			text-shadow: 0 1px 3px rgba(0, 0, 0, .5);
			box-shadow: inset 0 0 100px rgba(0, 0, 0, .5);

			margin: 0;
			border: 0;
			outline: 0;
			/*font-size: 100%;*/
			vertical-align: middle;
			background: transparent;

			word-break: break-all;

			font-family: 'nanumgothic', 'Nanum Gothic', "돋움", 'dotum', sans-serif;
			font-size: 1em;
			overflow: hidden;
		}

		input {
			margin: 0;
			padding: 0;
			outline: 0;
			/*font-size: 100%;*/
			vertical-align: top;
		}

		table,
		caption,
		tbody,
		tfoot,
		thead,
		tr,
		th,
		td {
			margin: 0;
			padding: 0;
			/*border: 0;*/
			outline: 0;
			/*font-size: 100%;*/
			/*background: transparent;*/
		}

		/*	배경[S]*/
		.parallax-overlay-pattern {
			background-image: url('/img/overlay-pattern.png') !important;
			z-index: 999999
		}

		*:first-child+html .ex7 {
			width: 1040px;
		}

		/*	배경[E]*/

		.center_wrap {
			display: table;
			width: 100%;
			margin-left: auto;
			margin-right: auto;
			display: inline-block;
			text-align: center;
		}

		.center {
			display: table;
			max-width: 1200px;
			padding: 0 20px 0 20px;
			margin-left: auto;
			margin-right: auto;
			display: inline-block;
			text-align: center;
		}

		*:focus {
			outline: none;
		}

		ul {
			list-style: none;
		}

		a {
			text-decoration: none;
			cursor: pointer;
			color: #000;
		}

		a:hover {
			text-decoration: none;
			color: #000;
		}

		*:first-child+html select {
			width: auto
		}

		::selection {
			background: #6bd0cf;
			color: #fff;
		}

		::-moz-selection {
			background: #6bd0cf;
			color: #fff;
		}

		.display_b {
			display: block;
		}

		.display_n {
			display: none;
		}

		.overflow_h {
			overflow: hidden;
		}

		.cursor_p {
			cursor: pointer
		}

		.position_r {
			position: relative;
		}

		.position_a {
			position: absolute;
		}

		.position_f {
			position: fixed;
		}


		.eng {
			font-family: 'Segoe UI,Helvetica,Arial,"돋움",dotum', sans-serif;
		}

		.eng_ro {
			font-family: 'Roboto', sans-serif;
		}


		.kor_b {
			font-family: 'nanumgothic', 'Nanum Gothic', "돋움", 'dotum', sans-serif;
			font-size: 14px;
		}

		.kor_bold {
			font-family: 'Nanumgothic Bold', 'Nanum Gothic', "돋움", 'dotum', sans-serif;
		}

		.kor {
			font-family: 'nanumgothic', 'Nanum Gothic', "돋움", 'dotum', sans-serif;
		}

		.kor_m {
			font-family: 'nanumgothic', 'Nanum Myeongjo', "돋움", 'dotum', sans-serif;
		}

		.kor_s {
			font-family: 'nanumgothic', 'Nanum Gothic', "돋움", 'dotum', sans-serif;
			font-size: 11px;
		}

		.kor_d {
			font-family: "돋움", 'dotum', sans-serif;
		}

		.bold {
			font-weight: bold;
		}

		.normal {
			font-weight: normal;
		}

		.text_deco_l {
			text-decoration: line-through
		}

		.mx154 {
			max-width: 155px;
		}

		.mx231 {
			max-width: 231px;
		}

		.mx244 {
			max-width: 245px;
		}

		.mx430 {
			max-width: 430px
		}

		.mx500 {
			max-width: 500px
		}

		.width0 {
			width: 0px
		}

		.width1 {
			width: 1px
		}

		.width2 {
			width: 2px
		}

		.width3 {
			width: 3px
		}

		.width4 {
			width: 4px
		}

		.width5 {
			width: 5px
		}

		.width6 {
			width: 6px
		}

		.width7 {
			width: 7px
		}

		.width8 {
			width: 8px
		}

		.width9 {
			width: 9px
		}

		.width10 {
			width: 10px
		}

		.width15 {
			width: 15px
		}

		.width20 {
			width: 20px
		}

		.width30 {
			width: 30px
		}

		.width40 {
			width: 40px
		}

		.width50 {
			width: 50px
		}

		.width60 {
			width: 60px
		}

		.width70 {
			width: 70px
		}

		*:first-child+html .width70 {
			width: 54px
		}

		.width80 {
			width: 80px
		}

		.width90 {
			width: 90px
		}

		.width93 {
			width: 93px
		}

		.width100 {
			width: 100px
		}

		.width110 {
			width: 110px
		}

		.width120 {
			width: 120px
		}

		.width130 {
			width: 130px
		}

		.width140 {
			width: 140px
		}

		.width150 {
			width: 150px
		}

		.width160 {
			width: 160px
		}

		.width170 {
			width: 170px
		}

		.width180 {
			width: 180px
		}

		.width190 {
			width: 190px
		}

		.width200 {
			width: 200px
		}

		.width220 {
			width: 220px;
		}

		.width300 {
			width: 300px
		}

		.width400 {
			width: 400px
		}

		.width500 {
			width: 500px
		}

		.width940 {
			width: 940px;
		}


		.width_1 {
			width: 1%
		}

		.width_2 {
			width: 2%
		}

		.width_3 {
			width: 3%
		}

		.width_4 {
			width: 4%
		}

		.width_5 {
			width: 5%
		}

		.width_6 {
			width: 6%
		}

		.width_7 {
			width: 7%
		}

		.width_8 {
			width: 8%
		}

		.width_9 {
			width: 9%
		}

		.width_10 {
			width: 10%
		}

		.width_20 {
			width: 20%
		}

		.width_25 {
			width: 25%
		}

		.width_26 {
			width: 26%
		}

		.width_27 {
			width: 27%
		}

		.width_28 {
			width: 28%
		}

		.width_29 {
			width: 29%
		}

		.width_30 {
			width: 30%
		}

		.width_33 {
			width: 33%
		}

		.width_40 {
			width: 40%
		}

		.width_45 {
			width: 45%
		}

		.width_49 {
			width: 49%
		}

		.width_50 {
			width: 50%
		}

		.width_60 {
			width: 60%
		}

		.width_70 {
			width: 70%
		}

		.width_80 {
			width: 80%
		}

		.width_90 {
			width: 90%
		}

		.width_100 {
			width: 100%
		}


		.height0 {
			height: 0px
		}

		.height1 {
			height: 1px
		}

		.height2 {
			height: 2px
		}

		.height3 {
			height: 3px
		}

		.height4 {
			height: 4px
		}

		.height5 {
			height: 5px
		}

		.height6 {
			height: 6px
		}

		.height7 {
			height: 7px
		}

		.height8 {
			height: 8px
		}

		.height9 {
			height: 9px
		}

		.height10 {
			height: 10px
		}

		.height15 {
			height: 15px
		}

		.height20 {
			height: 20px
		}

		.height30 {
			height: 30px
		}

		.height40 {
			height: 40px
		}

		.height50 {
			height: 50px
		}

		.height60 {
			height: 60px
		}

		.height70 {
			height: 70px
		}

		.height80 {
			height: 80px
		}

		.height90 {
			height: 90px
		}

		.height100 {
			height: 100px
		}

		.height110 {
			height: 110px
		}

		.height120 {
			height: 120px
		}

		.height130 {
			height: 130px
		}

		.height140 {
			height: 140px
		}

		.height150 {
			height: 150px
		}

		.height160 {
			height: 160px
		}

		.height170 {
			height: 170px
		}

		.height180 {
			height: 180px
		}

		.height190 {
			height: 190px
		}

		.height200 {
			height: 200px
		}

		.height210 {
			height: 210px
		}

		.height220 {
			height: 220px
		}

		.height230 {
			height: 230px
		}

		.height240 {
			height: 240px
		}

		.height250 {
			height: 250px
		}

		.height260 {
			height: 260px
		}

		.height270 {
			height: 270px
		}

		.height280 {
			height: 280px
		}

		.height290 {
			height: 290px
		}

		.height300 {
			height: 300px
		}

		.height400 {
			height: 400px
		}

		.height500 {
			height: 500px
		}

		.height_100 {
			height: 100%
		}

		.top_0 {
			top: 0;
		}

		.bottom_0 {
			bottom: 0;
		}

		.right_0 {
			right: 0;
		}

		.left_0 {
			left: 0;
		}

		.margin_0 {
			margin: 0
		}

		.margin_l_1 {
			margin-left: 1%
		}

		*:first-child+html .margin_l_1 {
			margin-left: 5px
		}

		.margin_l_2 {
			margin-left: 2%
		}

		*:first-child+html .margin_l_1 {
			margin-left: 5px
		}


		.margin_l1 {
			margin-left: 1px
		}

		.margin_l2 {
			margin-left: 2px
		}

		.margin_l3 {
			margin-left: 3px
		}

		.margin_l4 {
			margin-left: 4px
		}

		.margin_l5 {
			margin-left: 5px
		}

		.margin_l10 {
			margin-left: 10px
		}

		.margin_l15 {
			margin-left: 15px
		}

		.margin_l20 {
			margin-left: 20px
		}

		.margin_l25 {
			margin-left: 25px
		}

		.margin_l30 {
			margin-left: 30px
		}

		.margin_l35 {
			margin-left: 35px;
		}

		.margin_l40 {
			margin-left: 40px
		}

		.margin_l42 {
			margin-left: 42px
		}

		.margin_l45 {
			margin-left: 45px
		}

		.margin_l50 {
			margin-left: 50px
		}

		.margin_l75 {
			margin-left: 75px
		}



		.margin_r_1 {
			margin-right: 1%
		}

		*:first-child+html .margin_r_1 {
			margin-right: 5px
		}

		.margin_r5 {
			margin-right: 5px
		}

		.margin_r10 {
			margin-right: 10px
		}

		.margin_r15 {
			margin-right: 15px
		}

		.margin_r20 {
			margin-right: 20px
		}

		.margin_r30 {
			margin-right: 30px
		}

		.margin_r40 {
			margin-right: 40px
		}

		.margin_r45 {
			margin-right: 45px
		}

		.margin_r50 {
			margin-right: 50px
		}

		.margin_r60 {
			margin-right: 60px
		}

		.margin_r70 {
			margin-right: 70px
		}

		.margin_r75 {
			margin-right: 75px
		}

		.margin_t0 {
			margin-top: 0px
		}

		.margin_t1 {
			margin-top: 1px
		}

		.margin_t2 {
			margin-top: 2px
		}

		.margin_t3 {
			margin-top: 3px
		}

		.margin_t4 {
			margin-top: 4px
		}

		.margin_t5 {
			margin-top: 5px
		}

		.margin_t6 {
			margin-top: 6px
		}

		.margin_t7 {
			margin-top: 7px
		}

		.margin_t8 {
			margin-top: 8px
		}

		.margin_t9 {
			margin-top: 9px
		}

		.margin_t10 {
			margin-top: 10px
		}

		.margin_t11 {
			margin-top: 11px
		}

		.margin_t12 {
			margin-top: 12px
		}

		.margin_t13 {
			margin-top: 13px
		}

		.margin_t14 {
			margin-top: 14px
		}

		.margin_t15 {
			margin-top: 15px
		}

		.margin_t16 {
			margin-top: 16px
		}

		.margin_t17 {
			margin-top: 17px
		}

		.margin_t18 {
			margin-top: 18px
		}

		.margin_t19 {
			margin-top: 19px
		}

		.margin_t20 {
			margin-top: 20px
		}

		.margin_t25 {
			margin-top: 23px
		}

		.margin_t30 {
			margin-top: 30px
		}

		.margin_t35 {
			margin-top: 35px
		}

		.margin_t40 {
			margin-top: 40px
		}

		.margin_t45 {
			margin-top: 45px
		}

		.margin_t50 {
			margin-top: 50px
		}

		.margin_t55 {
			margin-top: 55px
		}

		.margin_t60 {
			margin-top: 60px
		}

		.margin_t70 {
			margin-top: 70px
		}

		.margin_t75 {
			margin-top: 75px
		}

		.margin_t80 {
			margin-top: 80px
		}

		.margin_t90 {
			margin-top: 90px
		}

		.margin_t100 {
			margin-top: 100px
		}

		.margin_b0 {
			margin-bottom: 0px
		}

		.margin_b2 {
			margin-bottom: 2px
		}

		.margin_b5 {
			margin-bottom: 5px
		}

		.margin_b10 {
			margin-bottom: 10px
		}

		.margin_b15 {
			margin-bottom: 15px
		}

		.margin_b20 {
			margin-bottom: 20px
		}

		.margin_b30 {
			margin-bottom: 30px
		}

		.margin_b40 {
			margin-bottom: 40px
		}

		.margin_b45 {
			margin-bottom: 45px
		}

		.margin_b50 {
			margin-bottom: 50px
		}

		.margin_b60 {
			margin-bottom: 60px
		}

		.margin_b70 {
			margin-bottom: 70px
		}

		.margin_b75 {
			margin-bottom: 75px
		}

		.margin_b80 {
			margin-bottom: 80px
		}

		.margin_b85 {
			margin-bottom: 85px
		}

		.margin_b95 {
			margin-bottom: 95px
		}

		.margin0 {
			margin: 0px;
		}

		.padding_0 {
			padding: 0px
		}

		.padding_1 {
			padding: 1px
		}

		.padding_2 {
			padding: 2px
		}

		.padding_3 {
			padding: 3px
		}

		.padding_4 {
			padding: 4px
		}

		.padding_5 {
			padding: 5px
		}

		.padding_10 {
			padding: 10px
		}

		.padding_13 {
			padding: 13px
		}

		.padding_15 {
			padding: 15px
		}

		.padding_20 {
			padding: 20px
		}

		.padding_25 {
			padding: 25px
		}

		.padding_30 {
			padding: 30px
		}

		.padding_40 {
			padding: 40px
		}

		.padding_l0 {
			padding-left: 0px
		}

		.padding_r0 {
			padding-right: 0px
		}

		.padding_t0 {
			padding-top: 0px
		}

		.padding_b0 {
			padding-bottom: 0px
		}

		.padding_l5 {
			padding-left: 5px
		}

		.padding_l7 {
			padding-left: 7px
		}

		.padding_l10 {
			padding-left: 10px
		}

		.padding_l13 {
			padding-left: 13px
		}

		.padding_l15 {
			padding-left: 15px
		}

		.padding_l20 {
			padding-left: 20px
		}

		.padding_l30 {
			padding-left: 30px
		}

		.padding_l40 {
			padding-left: 40px
		}

		.padding_l50 {
			padding-left: 50px
		}

		.padding_l60 {
			padding-left: 60px
		}

		.padding_l70 {
			padding-left: 70px
		}

		.padding_l80 {
			padding-left: 80px
		}

		.padding_l90 {
			padding-left: 90px
		}

		.padding_l100 {
			padding-left: 100px
		}

		.padding_r5 {
			padding-right: 5px
		}

		.padding_r7 {
			padding-right: 7px
		}

		.padding_r10 {
			padding-right: 10px
		}

		.padding_r11 {
			padding-right: 11px
		}

		.padding_r12 {
			padding-right: 12px
		}

		.padding_r13 {
			padding-right: 13px
		}

		.padding_r14 {
			padding-right: 14px
		}

		.padding_r15 {
			padding-right: 15px
		}

		.padding_r20 {
			padding-right: 20px
		}

		.padding_r30 {
			padding-right: 30px
		}

		.padding_r40 {
			padding-right: 40px
		}

		.padding_r50 {
			padding-right: 50px
		}

		.padding_r60 {
			padding-right: 60px
		}

		.padding_r70 {
			padding-right: 70px
		}

		.padding_r80 {
			padding-right: 80px
		}

		.padding_r90 {
			padding-right: 90px
		}

		.padding_r100 {
			padding-right: 100px
		}


		.padding_t0 {
			padding-top: 0px
		}

		.padding_t1 {
			padding-top: 1px
		}

		.padding_t2 {
			padding-top: 2px
		}

		.padding_t3 {
			padding-top: 3px
		}

		.padding_t4 {
			padding-top: 4px
		}

		.padding_t5 {
			padding-top: 5px
		}

		.padding_t6 {
			padding-top: 6px
		}

		.padding_t7 {
			padding-top: 7px
		}

		.padding_t8 {
			padding-top: 8px
		}

		.padding_t9 {
			padding-top: 9px
		}

		.padding_t10 {
			padding-top: 10px
		}

		.padding_t11 {
			padding-top: 11px
		}

		.padding_t12 {
			padding-top: 12px
		}

		.padding_t13 {
			padding-top: 13px
		}

		.padding_t14 {
			padding-top: 14px
		}

		.padding_t15 {
			padding-top: 15px
		}

		.padding_t20 {
			padding-top: 20px
		}

		.padding_t30 {
			padding-top: 30px
		}

		.padding_t40 {
			padding-top: 40px
		}

		.padding_t50 {
			padding-top: 50px
		}

		.padding_t60 {
			padding-top: 60px
		}

		.padding_t70 {
			padding-top: 70px
		}

		.padding_t80 {
			padding-top: 80px
		}

		.padding_t90 {
			padding-top: 90px
		}

		.padding_t100 {
			padding-top: 100px
		}

		.padding_b0 {
			padding-bottom: 0px
		}

		.padding_b1 {
			padding-bottom: 1px
		}

		.padding_b2 {
			padding-bottom: 2px
		}

		.padding_b3 {
			padding-bottom: 3px
		}

		.padding_b4 {
			padding-bottom: 4px
		}

		.padding_b5 {
			padding-bottom: 5px
		}

		.padding_b6 {
			padding-bottom: 6px
		}

		.padding_b7 {
			padding-bottom: 7px
		}

		.padding_b8 {
			padding-bottom: 8px
		}

		.padding_b9 {
			padding-bottom: 9px
		}

		.padding_b10 {
			padding-bottom: 10px
		}

		.padding_b11 {
			padding-bottom: 11px
		}

		.padding_b12 {
			padding-bottom: 12px
		}

		.padding_b13 {
			padding-bottom: 13px
		}

		.padding_b14 {
			padding-bottom: 14px
		}

		.padding_b15 {
			padding-bottom: 15px
		}

		.padding_b16 {
			padding-bottom: 16px
		}

		.padding_b17 {
			padding-bottom: 17px
		}

		.padding_b18 {
			padding-bottom: 18px
		}

		.padding_b19 {
			padding-bottom: 19px
		}

		.padding_b20 {
			padding-bottom: 20px
		}

		.padding_b30 {
			padding-bottom: 30px
		}

		.padding_b40 {
			padding-bottom: 40px
		}

		.padding_b50 {
			padding-bottom: 50px
		}

		.padding_b60 {
			padding-bottom: 60px
		}

		.padding_b70 {
			padding-bottom: 70px
		}

		.padding_b80 {
			padding-bottom: 80px
		}

		.padding_b90 {
			padding-bottom: 90px
		}

		.padding_b100 {
			padding-bottom: 100px
		}

		.border_0 {
			border: 0
		}

		.border_1 {
			border: 1px solid #ddd
		}

		.border_1_a {
			border: 1px solid #aaa
		}

		.border_1_0 {
			border: 1px solid #000
		}

		.border_1_d {
			border: 1px solid #ddd
		}

		.border_1_9 {
			border: 1px solid #999
		}

		.border_1_e {
			border: 1px solid #eee
		}

		.border_t_0 {
			border-top: 0px solid #e6e6e6;
		}

		.border_t {
			border-top: 1px solid #e6e6e6;
		}

		.border_t_e {
			border-top: 1px solid #eee;
		}

		.border_t_d {
			border-top: 1px solid #ddd;
		}

		.border_t_7 {
			border-top: 1px solid #777;
		}

		.border_t_9 {
			border-top: 1px solid #999;
		}

		.border_t_r {
			border-top: 1px solid #d9534f;
		}

		.border_b_0 {
			border-bottom: 0px solid #e6e6e6;
		}

		.border_b {
			border-bottom: 1px solid #e6e6e6;
		}

		.border_b_1 {
			border-bottom: 1px solid #111;
		}

		.border_b_3 {
			border-bottom: 1px solid #333;
		}

		.border_b_f {
			border-bottom: 1px solid #fff;
		}

		.border_b_e {
			border-bottom: 1px solid #eee;
		}

		.border_b_d {
			border-bottom: 1px solid #ddd;
		}

		.border_b_7 {
			border-bottom: 1px solid #777;
		}

		.border_b_r {
			border-bottom: 1px solid #d9534f;
		}

		.border_b_bl {
			border-bottom: 1px solid #428bca;
		}

		.border_b_wbl {
			border-bottom: 1px solid #14badd;
		}

		.border_t_youth {
			border-top: 1px solid #6bd0cf
		}

		.border_b_youth {
			border-bottom: 1px solid #6bd0cf;
		}

		.border_r_youth {
			border-right: 1px solid #6bd0cf
		}

		.border_l_youth {
			border-left: 1px solid #6bd0cf
		}

		.border_t_b {
			border-top: 1px solid #B4B4B4
		}

		.border_b_b {
			border-bottom: 1px solid #B4B4B4;
		}

		.border_r_b {
			border-right: 1px solid #B4B4B4
		}

		.border_l_b {
			border-left: 1px solid #B4B4B4
		}

		.border_r_7 {
			border-right: 1px solid #777
		}

		.border_l_7 {
			border-left: 1px solid #777
		}

		.border_r_9 {
			border-right: 1px solid #999
		}

		.border_l_9 {
			border-left: 1px solid #999
		}

		.border_r_d {
			border-right: 1px solid #ddd
		}

		.border_l_d {
			border-left: 1px solid #ddd
		}

		.border_r_e {
			border-right: 1px solid #eee
		}

		.border_l_e {
			border-left: 1px solid #eee
		}

		.border-d_t {
			border-top: 4px double #ddd;
		}

		.border-d_b {
			border-bottom: 4px double #ddd;
		}


		.color_0 {
			color: #000;
		}

		.color_1 {
			color: #111;
		}

		.color_2 {
			color: #222;
		}

		.color_3 {
			color: #333;
		}

		.color_4 {
			color: #444;
		}

		.color_5 {
			color: #555;
		}

		.color_6 {
			color: #666;
		}

		.color_7 {
			color: #777;
		}

		.color_8 {
			color: #888;
		}

		.color_82 {
			color: #828282;
		}

		.color_89 {
			color: #898989;
		}

		.color_94 {
			color: #949494;
		}

		.color_9 {
			color: #999;
		}

		.color_a {
			color: #aaa;
		}

		.color_b {
			color: #bbb;
		}

		.color_c {
			color: #ccc;
		}

		.color_d {
			color: #ddd;
		}

		.color_e {
			color: #eee;
		}

		.color_f {
			color: #fff;
		}

		.color_fa {
			color: #fafafa;
		}

		.color_r {
			color: #eb4d31;
		}

		.color_9e {
			color: #9e9e9e;
		}

		.color_a0 {
			color: #a0a0a0;
		}

		.color_32 {
			color: #353434;
		}

		.b_color_t {
			background-color: transparent;
		}

		.b_color_0 {
			background-color: #000;
		}

		.b_color_1 {
			background-color: #111;
		}

		.b_color_2 {
			background-color: #222;
		}

		.b_color_3 {
			background-color: #333;
		}

		.b_color_4 {
			background-color: #444;
		}

		.b_color_5 {
			background-color: #555;
		}

		.b_color_6 {
			background-color: #666;
		}

		.b_color_7 {
			background-color: #777;
		}

		.b_color_8 {
			background-color: #888;
		}

		.b_color_9 {
			background-color: #999;
		}

		.b_color_a {
			background-color: #aaa;
		}

		.b_color_b {
			background-color: #bbb;
		}

		.b_color_c {
			background-color: #ccc;
		}

		.b_color_d {
			background-color: #ddd;
		}

		.b_color_e {
			background-color: #eee;
		}

		.b_color_ef {
			background-color: #f9f9f9;
		}

		.b_color_ed {
			background-color: #ededed;
		}

		.b_color_fa {
			background-color: #fafafa;
		}

		.b_color_f1 {
			background-color: #f1f1f1;
		}

		.b_color_f {
			background-color: #fff;
		}

		.b_color_g {
			background-color: #4bbd9f;
		}

		.b_color_y {
			background-color: #f0ad4e;
		}

		.b_color_r {
			background-color: #d9534f;
		}

		.b_color_wbl {
			background-color: #14badd;
		}

		.b_color_youth {
			background-color: #6bd0cf;
		}

		.b_color_bl {
			background-color: #5bc0de;
		}

		.b_color_blg {
			background: #14b9dc;
			/* Old browsers */
			background: -moz-linear-gradient(top, #14b9dc 0%, #129ab7 100%);
			/* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #14b9dc), color-stop(100%, #129ab7));
			/* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, #14b9dc 0%, #129ab7 100%);
			/* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, #14b9dc 0%, #129ab7 100%);
			/* Opera 11.10+ */
			background: -ms-linear-gradient(top, #14b9dc 0%, #129ab7 100%);
			/* IE10+ */
			background: linear-gradient(to bottom, #14b9dc 0%, #129ab7 100%);
			/* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#14b9dc', endColorstr='#129ab7', GradientType=0);
			/* IE6-9 */
		}

		.b_color_rg {
			background: #eb5a5a;
			/* Old browsers */
			background: -moz-linear-gradient(top, #eb5a5a 0%, #c12323 100%);
			/* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #eb5a5a), color-stop(100%, #c12323));
			/* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, #eb5a5a 0%, #c12323 100%);
			/* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, #eb5a5a 0%, #c12323 100%);
			/* Opera 11.10+ */
			background: -ms-linear-gradient(top, #eb5a5a 0%, #c12323 100%);
			/* IE10+ */
			background: linear-gradient(to bottom, #eb5a5a 0%, #c12323 100%);
			/* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#eb5a5a', endColorstr='#c12323', GradientType=0);
			/* IE6-9 */
		}

		.b_color_rg:hover {
			background: #c12323;
			/* Old browsers */
			background: -moz-linear-gradient(top, #c12323 0%, #eb5a5a 100%);
			/* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #c12323), color-stop(100%, #eb5a5a));
			/* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, #c12323 0%, #eb5a5a 100%);
			/* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, #c12323 0%, #eb5a5a 100%);
			/* Opera 11.10+ */
			background: -ms-linear-gradient(top, #c12323 0%, #eb5a5a 100%);
			/* IE10+ */
			background: linear-gradient(to bottom, #c12323 0%, #eb5a5a 100%);
			/* W3C */
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#c12323', endColorstr='#eb5a5a', GradientType=0);
			/* IE6-9 */
		}

		.text999 {
			color: #999;
		}




		.bg_hover_fa {
			background-color: #fff;
			border-left: 1px solid #fff;
			border-right: 1px solid #fff;
			cursor: pointer
		}

		.bg_hover_fa:hover {
			background-color: #fafafa;
			border-left: 1px solid #eee;
			border-right: 1px solid #eee;
			text-decoration: none;
			transition: all 150ms linear;
			-webkit-transition: all 150ms linear;
		}

		.bg_hover_2 {
			background-color: #222;
			cursor: pointer
		}

		.bg_hover_2:hover {
			background-color: #444;
			text-decoration: none;
			transition: all 150ms linear;
			-webkit-transition: all 150ms linear;
		}

		.bg_hover_youth_f {
			background-color: #fff;
			cursor: pointer
		}

		.bg_hover_youth_f:hover {
			background-color: #6BD0CF;
			text-decoration: none;
			transition: all 150ms linear;
			-webkit-transition: all 150ms linear;
		}

		.text_hover_youth_ar {
			color: #aaa;
			cursor: pointer
		}

		.text_hover_youth_ar:hover {
			color: #e9b4ec;
			text-decoration: none;
			transition: all 150ms linear;
			-webkit-transition: all 150ms linear;
		}

		.text_hover_youth {
			color: #111;
			cursor: pointer
		}

		.text_hover_youth:hover {
			color: #6BD0CF;
			text-decoration: none;
			transition: all 150ms linear;
			-webkit-transition: all 150ms linear;
		}

		.text_hover_youth_f {
			color: #fff;
			cursor: pointer
		}

		.text_hover_youth_f:hover {
			color: #6BD0CF;
			text-decoration: none;
			transition: all 150ms linear;
			-webkit-transition: all 150ms linear;
		}

		.text_hover_youth_a {
			color: #aaa;
			cursor: pointer
		}

		.text_hover_youth_a:hover {
			color: #6BD0CF;
			text-decoration: none;
			transition: all 150ms linear;
			-webkit-transition: all 150ms linear;
		}

		.text_over_effect_f {
			color: #fff;
			cursor: pointer
		}

		.text_over_effect_f:hover {
			color: #14badd;
			text-decoration: none
		}

		.text_over_effect_0 {
			color: #000;
			cursor: pointer
		}

		.text_over_effect_0:hover {
			color: #000;
			text-decoration: none
		}

		.text_over_effect_b {
			color: #000;
			cursor: pointer
		}

		.text_over_effect_b:hover {
			color: #14badd;
			text-decoration: none
		}

		.text_over_effect_3 {
			color: #333;
			cursor: pointer
		}

		.text_over_effect_3:hover {
			color: #14badd;
			text-decoration: none
		}

		.text_over_effect_8 {
			color: #888;
			cursor: pointer
		}

		.text_over_effect_8:hover {
			color: #555;
			text-decoration: none
		}

		.text_over_effect_r {
			color: #b94a48;
			cursor: pointer
		}

		.text_over_effect_o:hover {
			color: #14badd;
			text-decoration: none
		}

		.text_over_effect_bl {
			color: #14badd;
			cursor: pointer
		}

		.text_over_effect_bl:hover {
			color: #999;
			text-decoration: none
		}

		.text_over_effect_b_color_fa {
			background: #fafafa
		}

		.text_over_effect_b_color_fa:hover {
			background: #eee
		}

		.size10 {
			font-size: 10px
		}

		.size11 {
			font-size: 11px
		}

		.size12 {
			font-size: 12px
		}

		.size13 {
			font-size: 13px
		}

		.size14 {
			font-size: 14px
		}

		.size15 {
			font-size: 15px
		}

		.size16 {
			font-size: 16px
		}

		.size17 {
			font-size: 17px
		}

		.size18 {
			font-size: 18px
		}

		.size19 {
			font-size: 19px
		}

		.size20 {
			font-size: 20px
		}

		.size21 {
			font-size: 21px
		}

		.size22 {
			font-size: 22px
		}

		.size23 {
			font-size: 23px
		}

		.size24 {
			font-size: 24px
		}

		.size25 {
			font-size: 25px
		}

		.size26 {
			font-size: 26px
		}

		.size27 {
			font-size: 27px
		}

		.size28 {
			font-size: 28px
		}

		.size29 {
			font-size: 29px
		}

		.size30 {
			font-size: 30px
		}

		.size31 {
			font-size: 31px
		}

		.size32 {
			font-size: 32px
		}

		.size33 {
			font-size: 33px
		}

		.size34 {
			font-size: 34px
		}

		.size35 {
			font-size: 35px
		}

		.size36 {
			font-size: 36px
		}

		.size37 {
			font-size: 37px
		}

		.size38 {
			font-size: 38px
		}

		.size39 {
			font-size: 39px
		}

		.size40 {
			font-size: 40px
		}

		.size50 {
			font-size: 50px
		}

		.size60 {
			font-size: 60px
		}

		.text_s {
			text-shadow: 1px 1px 2px #000;
		}


		.btn_line_y {
			border: 1px solid #ec9b00;
			overflow: hidden;
		}

		.btn_chk_icon {
			background: url('../img/icon/login_btn_icon.jpg') no-repeat;
			width: 12px;
			height: 13px;
			display: inline-block;
		}

		.red_icon {
			width: 4px;
			height: 4px;
			background-color: #eb4d31;
		}

		.btn_gray {
			width: 78px;
			height: 20px;
			line-height: 20px;
			font-size: 11px;
			background-color: #595959;
			text-align: center;
			color: #fff;
		}

		#join_btn {
			margin-left: 4px;
			width: 106px;
			height: 53px;
			line-height: 53px;
			background-color: #eb4d31;
			color: #fff;
			text-align: center;
			cursor: pointer;
		}

		.red_btn {
			margin-left: 4px;
			width: 130px;
			height: 53px;
			line-height: 53px;
			background-color: #eb4d31;
			color: #fff;
			text-align: center;
			cursor: pointer;
		}

		.gray_btn {
			margin-left: 4px;
			width: 130px;
			height: 53px;
			line-height: 53px;
			border: 1px solid #aeaeae;
			text-align: center;
			cursor: pointer;
		}

		.contentsbox_17 {
			margin-top: 17px;
			width: 100%;
			overflow: hidden;
		}

		.bg_gray_btn {
			background: url('../img/layout/graybtn-bg.jpg') repeat-x;
			text-align: center;
			font-weight: bold;
			border: 1px solid #d3d3d3;
			padding: 0px 10px 0px 10px;
			font-size: 11px;
			cursor: pointer;
		}









		/* Extra markup and styles for table-esque vertical and horizontal centering */
		.site-wrapper {
			display: table;
			width: 100%;
			height: 100%;
			/* For at least Firefox */
			min-height: 100%;
		}

		.site-wrapper-inner {
			display: table-cell;
			vertical-align: top;
		}

		.cover-container {
			margin-left: auto;
			margin-right: auto;
		}

		/* Padding for spacing */
		.inner {
			padding: 30px;
		}


		/*
 * Header
 */
		.masthead-brand {
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.masthead-nav>li {
			display: inline-block;
		}

		.masthead-nav>li+li {
			margin-left: 20px;
		}

		.masthead-nav>li>a {
			padding-left: 0;
			padding-right: 0;
			font-size: 16px;
			font-weight: bold;
			color: #fff;
			/* IE8 proofing */
			color: rgba(255, 255, 255, .75);
			border-bottom: 2px solid transparent;
		}

		.masthead-nav>li>a:hover,
		.masthead-nav>li>a:focus {
			background-color: transparent;
			border-bottom-color: rgba(255, 255, 255, .25);
		}

		.masthead-nav>.active>a,
		.masthead-nav>.active>a:hover,
		.masthead-nav>.active>a:focus {
			color: #fff;
			border-bottom-color: #fff;
		}

		@media (min-width: 768px) {
			.masthead-brand {
				float: left;
			}

			.masthead-nav {
				float: right;
			}
		}


		/*
 * Cover
 */

		.cover {
			padding: 0 20px;
		}

		.cover .btn-lg {
			padding: 10px 20px;
			font-weight: bold;
		}


		/*
 * Footer
 */

		.mastfoot {
			color: #999;
			/* IE8 proofing */
			color: rgba(255, 255, 255, .5);
		}


		/*
 * Affix and center
 */

		@media (min-width: 768px) {

			/* Pull out the header and footer */
			.masthead {
				/*position: fixed;*/
				top: 0;
			}

			.mastfoot {
				/*position: fixed;*/
				bottom: 0;
			}

			/* Start the vertical centering */
			.site-wrapper-inner {
				vertical-align: middle;
			}

			/* Handle the widths */
			.masthead,
			.mastfoot,
			.cover-container {
				width: 100%;
				/* Must be percentage or pixels for horizontal alignment */
			}
		}

		@media (min-width: 992px) {

			.masthead,
			.mastfoot,
			.cover-container {
				width: 700px;
			}
		}
	</style>


	<script type="text/javascript" src="/js/vendor/jquery-3.7.1.min.js"></script>
	<!-- <script type="text/javascript" src="/js/vendor/jquery-confirm.min.js"></script> -->
	<script type="text/javascript" charset="utf-8" src="/js/vendor/jquery.tubular.1.0.js"></script>

	<script type="text/javascript">
		function login_proc() {
			location.replace('/main');
			return false;

			var FrmObj = document.login_proc;

			var memID = $.trim($("#memID").val());
			var memPW = $.trim($("#memPW").val());


			if (memID == "") {
				alert('아이디를 입력해주세요.');
				return false;
			}

			if (memPW == "") {
				alert('비밀번호를 입력해주세요.');
				return false;
			}


			$.ajax({
				url: '/ajax/proc/gLoginProc.php',
				type: 'post',
				dataType: 'json',
				data: {
					action: 'gLogin',
					param: encodeURIComponent($('form[name="login_proc"]').serialize())
				},
				success: function(result) {
					if (result !== null) {
						if (result['MSG'] == 'OK') {
							location.replace('/');
						} else {
							alert(result['MSG']);
						}
					}
				}
			});
		}
	</script>


</head>

<body class="">


	<table align="center" width="100%" height="100%">
		<tr height="100%">
			<td align="center" valign="middle" width="100%" height="100%">

				<div id="LoginWrapper" class="padding_t0 padding_b0">
					<div class="site-wrapper">
						<div class="site-wrapper-inner">
							<div class="cover-container">

								<div class="masthead clearfix">
									<div class="inner">
										<h3 class="masthead-brand">JS</h3>
										<ul class="nav masthead-nav">
											<li><a href="/registration.php">Registration</a></li>
											<!-- <li class="active"><a href="#">test2</a></li>
							<li><a href="#">test3</a></li> -->
										</ul>
									</div>
								</div>

								<form name="login_proc" id="login_proc" method="post" autocomplete="off" accept-charset="utf-8" onsubmit="return false">
									<div class="inner cover">
										<h1 class="cover-heading">LOG IN</h1>
										<div class="inner">
											<span class="pull-left  width_100"><input type="text" class="form-control " name="memID" id="memID" placeholder="ID" style="height:30px;"></span>
										</div>
										<div class="inner">
											<span class="pull-left  width_100"><input type="password" class="form-control " name="memPW" id="memPW" placeholder="PW" style="height:30px;"></span>
										</div>
										<div class="margin_t20 inner">

											<button type="button" class="btn btn-lg btn-default width_100 login_bt" id="form_submit">OK</button>

										</div>
									</div>
									<input type="hidden" name="token" value="">
								</form>

								<div class="mastfoot">
									<div class="inner">
										<p>Design by JS</p>

										<div class="inner">
											<a class="tubular-volume-up" style="color:white">VolumeUp</a>&nbsp;&nbsp;&nbsp;
											<a class="tubular-volume-down" style="color:white">VolumeDown</a>&nbsp;&nbsp;&nbsp;
											<a class="tubular-play" style="color:white">Play</a>&nbsp;&nbsp;&nbsp;
											<a class="tubular-pause" style="color:white">Pause</a>&nbsp;&nbsp;&nbsp;
											<a class="tubular-mute" style="color:white">Mute</a></p>
										</div>

									</div>
								</div>

							</div>
						</div>

						<div class="position_f center_wrap parallax-overlay-pattern" style="left:0; top:0; z-index:-9"></div>

					</div>
				</div>

			</td>
		</tr>
	</table>

	<script type="text/javascript">
		$(window).ready(function() {
			$('.parallax-overlay-pattern').height($(window).height());
		});
		$(window).resize(function() {
			$('.parallax-overlay-pattern').height($(window).height());
		}).resize();

		(function($) {
			$(document).ready(function() {
				var options = {
					videoId: '<?php echo $VideoId; ?>',
					start: 8
				};
				$('#LoginWrapper').tubular(options);

				$(document).on('keyup', '#login_proc input[name="memPW"]', function(e) {
					e.preventDefault();
					e.stopPropagation();
					e.returnValue = false; //Enter 처리추가 JSD
					if (e.keyCode === 13) {
						$(this).blur();
						$('#form_submit').click();
					}
				});

				$(document).on('click', '#form_submit', function(e) {
					e.preventDefault();
					e.stopPropagation();
					e.returnValue = false;
					login_proc();
				});

			});
		})(jQuery);
	</script>



	<!-- [e] ### End   Codeing -->
