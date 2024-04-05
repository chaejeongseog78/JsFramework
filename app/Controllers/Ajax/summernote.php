<?php

namespace App\Controllers\Ajax;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Helpers\InitConfigGlobalHelper;
use PDO;

class summernote extends BaseController
{
	use ResponseTrait;

	public function append()
	{

		if ($this->request->is('post')) {

			$_config = InitConfigGlobalHelper::getInitConfig();
			$sock = InitConfigGlobalHelper::getConnPDO();

			$post_dats = $this->request->getPost();
			$content = $post_dats['content'];

			preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);

			$img_array = [];
			foreach ($matches[1] as $key => $val) {
				// data:image/png;base64,AAAFBFj42Pj4kjlkjlk~~~
				list($type, $data) = explode(';', $val);
				// $type : data:image/png
				// $data : base64,AAFBFj42Pj4kjlkjlk~~~
				list(, $ext) = explode('/', $type);
				$ext = ($ext == 'jpeg') ? 'jpg' : $ext;
				$filename = date('YmdHis') . '_' . $key . '.' . $ext;

				list(, $base64_decode_data) = explode(',', $data);
				$rs_code = base64_decode($base64_decode_data);

				$path = WRITEPATH . 'uploads/';
				$fullpath = $path . $filename;

				file_put_contents($fullpath, $rs_code);

				$img_array[] = "/upload/showimg/" . $filename;
				// $content = str_replace(바꿀대상, 변경할이름, $content);
				$content = str_replace($val, 'http://localhost/upload/showimg/' . $filename, $content);
			}

			$imglist = implode('|', $img_array);

			$sock = null;
			return $this->response->setJSON([
				'MSG' => 'OK',
				'DAT' => array('imgs' => $imglist, 'dat' => $post_dats)
			]);
		}
	}
}
