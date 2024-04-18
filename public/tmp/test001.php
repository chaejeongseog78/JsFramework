<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<!-- 참조 : https://youtu.be/rvKCsHS590o -->
	<style>
		#viewjstreecss ul li {
			list-style: none;
			line-height: 2em;
		}

		#viewjstreecss ul li summary {
			cursor: pointer;
		}

		#viewjstreecss ul summary::marker {
			display: none;
		}

		#viewjstreecss ul summary::-webkit-details-marker {
			display: none;
		}

		#viewjstreecss ul li {
			position: relative;
			border-top: 1px solid green;
		}

		#viewjstreecss ul li::before {
			position: absolute;
			left: -10px;
			top: 0px;
			border-left: 2px solid red;
			border-bottom: 2px solid blue;
			content: "";
			width: 8px;
			height: 1em;

		}

		#viewjstreecss ul li::after {
			position: absolute;
			left: -10px;
			bottom: 0px;
			border-left: 2px solid green;
			content: "";
			width: 8px;
			height: 100%;
		}

		#viewjstreecss ul li:last-child:after {
			display: none;
		}

		#viewjstreecss>ul>li:last-child {
			border-bottom: 1px solid green;
		}

		#viewjstreecss details {
			margin: 0 auto;
			max-height: 30px;
			transition: max-height 3s linear;
		}

		#viewjstreecss details[open] {
			max-height: 1000px;
		}

		#viewjstreecss summary::before {
			content: '+';
			position: absolute;
			height: 18px;
			width: 18px;
			top: 6px;
			left: -3px;
			text-align: center;
			line-height: 18px;
			/* font-weight: bold; */
			color: #fff;
			background-color: #8854d0;
			border-radius: 9px;
		}

		#viewjstreecss details[open]>summary:before {
			content: '-';
			background-color: #4b7bec;
		}

		/* #viewjstreecss details>ul {
			padding: 15px;
		} */
	</style>
</head>

<body>

	<?php
	//## 참조 : https://gist.github.com/phpfiddle/41fbb2f699b015131b93
	$datas = array(
		array('id' => 1, 'parent' => 0, 'name' => 'Page 1'),
		array('id' => 2, 'parent' => 1, 'name' => 'Page 1.1'),
		array('id' => 3, 'parent' => 2, 'name' => 'Page 1.1.1'),
		array('id' => 4, 'parent' => 3, 'name' => 'Page 1.1.1.1'),
		array('id' => 5, 'parent' => 3, 'name' => 'Page 1.1.1.2'),
		array('id' => 6, 'parent' => 1, 'name' => 'Page 1.2'),
		array('id' => 7, 'parent' => 6, 'name' => 'Page 1.2.1'),
		array('id' => 8, 'parent' => 0, 'name' => 'Page 2'),
		array('id' => 9, 'parent' => 0, 'name' => 'Page 3'),
		array('id' => 10, 'parent' => 9, 'name' => 'Page 3.1'),
		array('id' => 11, 'parent' => 9, 'name' => 'Page 3.2'),
		array('id' => 12, 'parent' => 11, 'name' => 'Page 3.2.1'),
	);

	function generatePageTreeOrg($datas, $parent = 0, $limit = 0)
	{
		if ($limit > 1000) return ''; // Make sure not to have an endless recursion
		$tree = '<ul>';
		for ($i = 0, $ni = count($datas); $i < $ni; $i++) {
			if ($datas[$i]['parent'] == $parent) {
				$tree .= '<li>';
				$tree .= $datas[$i]['name'];
				$tree .= generatePageTreeOrg($datas, $datas[$i]['id'], $limit++);
				$tree .= '</li>';
			}
		}
		$tree .= '</ul>';
		if ($tree == "<ul></ul>") $tree = "";
		return $tree;
	}

	// echo (generatePageTreeOrg($datas));


	function chkChild($chkidx)
	{
		$res = false;
		$cnt = 0;
		$arrDats = $GLOBALS['row'];
		$js = count($arrDats);
		for ($j = 0; $j < $js; $j++) {
			if ($arrDats[$j]['parentidx'] == $chkidx) {
				++$cnt;
			}
		}
		if ($cnt > 0) $res = true;
		return $res;
	}

	function generatePageTree($datas, $parentidx = 0)
	{
		if ($GLOBALS['TreeLimitCnt'] == 0) return ''; // Make sure not to have an endless recursion
		$tree = '<ul>';
		for ($i = 0, $ni = count($datas); $i < $ni; $i++) {
			if ($datas[$i]['parentidx'] == $parentidx) {
				if (chkChild($datas[$i]['idx'])) {
					$tree .= '<li class="parent"><details><summary>';
					$tree .= $datas[$i]['mnuNm'];
					$tree .= '</summary>';
				} else {
					$tree .= '<li>';
					$tree .= $datas[$i]['mnuNm'];
				}
				--$GLOBALS['TreeLimitCnt'];
				$tree .= generatePageTree($datas, $datas[$i]['idx']);
				if (chkChild($datas, $datas[$i]['idx'])) {
					$tree .= '</details></li>';
				} else {
					$tree .= '</li>';
				}
			}
		}
		$tree .= '</ul>';
		if ($tree == "<ul></ul>") $tree = "";
		return $tree;
	}

	function getConnPDO()
	{

		$database_default_hostname = "127.0.0.1";
		$database_default_database = "ci4";
		$database_default_username = "root";
		$database_default_password = "";

		$servername = $database_default_hostname;
		$username = $database_default_username;
		$password = $database_default_password;
		$dbname = $database_default_database;

		try {
			$dsn = "mysql:host={$servername};dbname={$dbname}";
			$conn = new PDO($dsn, $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			// dd("<p>DB 연결 성공</p>");
			return $conn;
		} catch (PDOException $e) {
			return $e->getMessage();
			exit;
		}
	}

	$dbh = getConnPDO();
	$dbs = $dbh->query("SELECT * from mnumenu order by parentidx, idx");
	$rowCnt = $dbs->rowCount();
	// var_dump($rowCnt);
	$GLOBALS['TreeLimitCnt'] = $rowCnt;

	$GLOBALS['row'] = $dbs->fetchAll(PDO::FETCH_ASSOC);
	// print_r($GLOBALS['row']);

	$dbs->closeCursor();

	echo "<div id='viewjstreecss'>";
	echo (generatePageTree($GLOBALS['row'], $parent = 0));
	echo "</div>";

	?>
</body>

</html>
