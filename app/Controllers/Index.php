<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Helpers\InitConfigGlobalHelper;

class Index extends BaseController
{
	public function index(): string
	{

		$_config = InitConfigGlobalHelper::getInitConfig();
		// dd($_config);

		if (
			isset($_config) &&
			isset($_config['_URL_Last_FileName']) &&
			file_exists(APPPATH . "Views/html/" . $_config['_URL_Last_FileName'] . ".html")
		) {

			$data['_config'] = $_config;

			return view('layout/header', $data)
				. view('html/' . $_config['_URL_Last_FileName'] . '.html', $data)
				. view('layout/footer', $data);
		} else throw new PageNotFoundException();
	}
}
