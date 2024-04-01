<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
	public function index($page = 'home'): string
	{
		if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
			throw new PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // 첫글자를 대문자로

		// return view('layout/header', $data)
		// 	. view('pages/' . $page)
		// 	. view('layout/footer');
		return render('pages/' . $page); // layout을 포함한 view 호출
	}
}
