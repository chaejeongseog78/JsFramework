<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\NewsModel;

class News extends BaseController
{
	public function index()
	{
		$model = model(NewsModel::class); // $model = new NewsModel();
		$data = [
			'DAT' => $model->getNews(),
			'MSG' => 'OK',
		];
		return json_encode($data, JSON_UNESCAPED_UNICODE);
		// return $this->response->setJSON($data);
	}
}
