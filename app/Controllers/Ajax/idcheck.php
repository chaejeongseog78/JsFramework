<?php

namespace App\Controllers\Ajax;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Helpers\InitConfigGlobalHelper;
use PDO;

class idcheck extends BaseController
{
	use ResponseTrait;

	public function idcheck()
	{

		if ($this->request->is('get')) {

			// $_config = _GetConfig();
			$_config = InitConfigGlobalHelper::getInitConfig();
			$sock = InitConfigGlobalHelper::getConnPDO();

			parse_str($_config['_URL_Last_Nm'], $arrQryDat);
			// print_r($arrQryDat);

			$user_id = $arrQryDat['id'];
			$sql = "SELECT COUNT(*) cnt FROM members WHERE social_name = '" . $user_id . "'";
			$stmt = $sock->prepare($sql);
			$stmt->execute();
			// $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$dat = $stmt->fetch(PDO::FETCH_ASSOC);

			$sock = null;

			return $this->response->setJSON([
				'MSG' => 'OK',
				'QryDat' => $arrQryDat,
				'DAT' => $dat['cnt'] ? 'exist' : 'not_exist'
			]);
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
