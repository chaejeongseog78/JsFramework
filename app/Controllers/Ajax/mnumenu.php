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
			$_config = InitConfigGlobalHelper::getInitConfig();
			$sock = InitConfigGlobalHelper::getConnPDO();

			parse_str($_config['_URL_Last_Nm'], $arrQryDat);
			// print_r($arrQryDat);

			$sql = "SELECT * FROM mnumenu";
			$stmt = $sock->prepare($sql);
			$stmt->execute();

			$folders_arr = array();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$parentidx = $row['parentidx'];
				if ($parentidx == '0') $parentidx = "#";

				$selected = false;
				$opened = false;
				// if ($row['idx'] == 2) {
				// $selected = true;
				// $opened = true;
				// }
				$folders_arr[] = array(
					"id" => $row['idx'],
					"parent" => $parentidx,
					"text" => $row['mnuNm'],
					"gurl" => $row['mnuUrl'],
					"state" => array("selected" => $selected, "opened" => $opened)
				);
			}

			$sock = null;

			return $this->response->setJSON($folders_arr);
		}
	}

	public function test($seg1 = false, $seg2 = false)
	{

		$id = $this->request->getVar('id');

		return $this->response->setJSON([
			'MSG' => 'ajsx called test',
			'seg1' => $seg1,
			'seg2' => $seg2,
			'id' => $id
		]);
	}
}
