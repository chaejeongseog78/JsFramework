<html>

<head>
	<meta charset="utf-8">

	<title>js 예제</title>
</head>
<style>
	ul {
		list-style: none;
	}

	a {
		text-decoration: none;
		outline: none;
	}

	.page {
		width: 1440px;
		margin: 0 auto;
	}

	header {
		width: 100%;
		height: 80px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		border-bottom: solid 1px black;
	}

	header>h2 {
		margin-left: 20px;
	}

	header>nav {
		width: 600px;
		height: 100%;
	}

	header ul {
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: space-between;
	}

	header ul>li {
		font-size: 20px;
		height: 100%;
		display: flex;
		align-items: center;
	}

	footer {
		width: 100%;
		height: 90px;
		bottom: 0px;
		position: absolute;
		border-top: 1px solid #c4c4c4;
		padding-top: 15px;
		color: #808080;
		font-size: 11px;
	}

	footer a {
		display: inline-block;
		margin: 0 20px 10px 20px;
		color: #808080;
		font-size: 11px;
	}

	footer a:visited {
		color: #808080;
	}

	footer p {
		margin-top: 0;
		margin-bottom: 0;
	}

	footer p span {
		display: inline-block;
		margin-left: 20px;
	}

	section {
		padding-bottom: 105px;
	}

	.wrap {
		min-height: 100vh;
		position: relative;
		width: 100%;
	}

	.content {
		text-align: center;
		width: 100%;
	}
</style>

<body>
	<div class="wrap">
		<header id="header" class="header">
			<nav>
				<ul>
					<li><a href="#">메뉴1</a></li>
					<li><a href="">메뉴2</a></li>
					<li><a href="">메뉴3</a></li>
					<li><a href="">메뉴4</a></li>
				</ul>
			</nav>
		</header>
		<section>
			<div class="content">
				<?php echo $content; ?>
			</div>
		</section>
		<footer id="footer" class="footer">
			<nav>
				<a href='https://cocoder.tistory.com' target='_blank'>Blog</a> |
				<a href='https://github.com/cocoder16' target='_blank'>Github</a>
			</nav>
			<p>
				<span>저자 : nick</span><br />
				<span>이메일 : nick901106@gmail.com</span><br />
				<span>Copyright 2022. All Rights Reserved.</span>
			</p>
		</footer>
	</div>
	<div class="test">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis eligendi laudantium, dolore ipsa, pariatur sunt illum cupiditate labore dolores, doloremque quis minus molestias tempora praesentium ipsam? Enim aperiam voluptatibus animi.</div>
</body>

</html>
