<?php

namespace App\Controllers\Ajax;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Helpers\InitConfigGlobalHelper;
use PDO;

class mnumenu extends BaseController
{
	use ResponseTrait;

	public function getmnu()
	{

		if ($this->request->is('get')) {

			// $_config = _GetConfig();
			// $_config = InitConfigGlobalHelper::getInitConfig();
			$sock = InitConfigGlobalHelper::getConnPDO();

			// parse_str($_config['_URL_Last_Nm'], $arrQryDat);
			// print_r($arrQryDat);

			$sql = "SELECT * FROM mnumenu order by parentidx, idx";
			$stmt = $sock->prepare($sql);
			$stmt->execute();

			$folders_arr = array();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$parentidx = $row['parentidx'];
				if ($parentidx == '0') {
					$parentidx = "#";
					$selected = false;
					$opened = true;
				} else {
					$selected = false;
					$opened = false;
				}
				$folders_arr[] = array(
					"id" => $row['idx'],
					"parent" => $parentidx,
					"text" => $row['mnuNm'],
					"gurl" => $row['mnuUrl'],
					"icon" => "",
					"state" => array("selected" => $selected, "opened" => $opened)
				);
			}

			$stmt->closeCursor();
			$sock = null;

			return $this->response->setJSON($folders_arr);
		}
	}

	public function getPullDownMnu()
	{
		if ($this->request->is('get')) {

			// $_config = InitConfigGlobalHelper::getInitConfig();
			$sock = InitConfigGlobalHelper::getConnPDO();

			// parse_str($_config['_URL_Last_Nm'], $arrQryDat);
			// print_r($arrQryDat);

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
							if ($datas[$i]['mnuUrl']) {
								$tree .= "<a href='" . $datas[$i]['mnuUrl'] . "?mnu=" . $datas[$i]['idx'] . "'>" . $datas[$i]['mnuNm'] . "</a>";
							} else {
								$tree .= $datas[$i]['mnuNm'];
							}
							$tree .= ' <i class="fa-solid fa-caret-right"></i></span>';
						} else {
							$tree .= "<li><span>";
							if ($datas[$i]['mnuUrl']) {
								$tree .= "<a href='" . $datas[$i]['mnuUrl'] . "?mnu=" . $datas[$i]['idx'] . "'>" . $datas[$i]['mnuNm'] . "</a>";
							} else {
								$tree .= $datas[$i]['mnuNm'];
							}
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

			$sql = "SELECT * FROM mnumenu order by parentidx, idx";
			// $stmt = $sock->prepare($sql);
			// $stmt->execute();

			$stmt = $sock->query("SELECT * from mnumenu order by parentidx, idx");
			$rowCnt = $stmt->rowCount();
			// var_dump($rowCnt);
			$GLOBALS['TreeLimitCnt'] = $rowCnt;

			$GLOBALS['row'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// print_r($GLOBALS['row']);

			$stmt->closeCursor();
			$sock = null;
			// exit;

			$res = generatePageTree($GLOBALS['row'], $parent = 0);

			$result = array(
				"MSG" => "OK",
				"DAT" => $res
			);

			return $this->response->setJSON($result);
		}
	}
}
