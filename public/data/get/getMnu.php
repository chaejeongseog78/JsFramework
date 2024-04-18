<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: text/html; charset=utf-8');

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
				$tree .= "<li><span>";
				$tree .= $datas[$i]['mnuNm'];
				// $tree .= ' <i class="fa-solid fa-angle-right"></i></span>';
				$tree .= ' <i class="fa-solid fa-caret-right"></i></span>';
			} else {
				$tree .= "<li><span>";
				$tree .= $datas[$i]['mnuNm'];
				$tree .= "</span>";
			}
			--$GLOBALS['TreeLimitCnt'];
			$tree .= generatePageTree($datas, $datas[$i]['idx']);
			if (chkChild($datas, $datas[$i]['idx'])) {
				$tree .= "</li>";
			} else {
				$tree .= "</li>";
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

$sock = getConnPDO();
$stmt = $sock->query("SELECT * from mnumenu order by parentidx, idx");
$rowCnt = $stmt->rowCount();
// var_dump($rowCnt);
$GLOBALS['TreeLimitCnt'] = $rowCnt;

$GLOBALS['row'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($GLOBALS['row']);

$stmt->closeCursor();
$sock = null;

echo (generatePageTree($GLOBALS['row'], $parent = 0));
