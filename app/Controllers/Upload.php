<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Upload extends BaseController
{
	use ResponseTrait;

	public function index()
	{

		$files = $this->request->getFileMultiple("files");

		if ($files == null) {
			return $this->response->setJSON([
				'file_info_array' => []
			]);
		}

		$file_info_array = [];

		foreach ($files as $file) {
			$fileInfo = [];
			if ($file != null) {
				if (!$file->isValid()) {
					$errorString = $file->getErrorString();
					$errorCode = $file->getError();
					$fileInfo['hasError'] = true;
					$fileInfo['errorString'] = $errorString;
					$fileInfo['errorCode'] = $errorCode;
				} else {
					$fileInfo['hasError'] = false;
					if ($file->hasMoved() === false) {
						// mimeType은 `store` 전에.
						$fileInfo['mimeType'] = $file->getMimeType();
						$fileInfo['guessExtention'] = $file->guessExtension();

						$savedPath = $file->store();

						$fileInfo['savedPath'] = $savedPath;
						$fileInfo['clientName'] = $file->getClientName();
						$fileInfo['name'] = $file->getName();
						$fileInfo['clientMimeType'] = $file->getClientMimeType();
						$fileInfo['clientExtention'] = $file->getClientExtension();
					}
				}
			}
			array_push($file_info_array, $fileInfo);
		}

		return $this->response->setJSON([
			'file_info_array' => $file_info_array
		]);
	}

	public function showimg()
	{
		helper("filesystem");

		$path = WRITEPATH . 'uploads/';
		$filename = 'loading.gif';

		$fullpath = $path . $filename;
		$file = new \CodeIgniter\Files\File($fullpath, true);
		$binary = readfile($fullpath);
		return $this->response
			->setHeader('Content-Type', $file->getMimeType())
			->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
			->setStatusCode(200)
			->setBody($binary);
	}

	public function param($seg1 = false, $seg2 = false)
	{
		helper("filesystem");

		// echo $seg1 . "<br>";
		// echo $seg2 . "<br>";

		$fileNm = "";
		if ($seg1) {
			$fileNm  = $seg1;
		}
		if ($seg2) {
			$fileNm .= '/' . $seg2;
		}
		// echo $fileNm;

		$path = WRITEPATH . 'uploads/';

		$fullpath = $path . $fileNm;
		if (!file_exists($fullpath)) {
			$fileNm = 'loading2.gif';
		}
		$fullpath = $path . $fileNm;

		$file = new \CodeIgniter\Files\File($fullpath, true);
		$binary = readfile($fullpath);
		return $this->response
			->setHeader('Content-Type', $file->getMimeType())
			->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
			->setStatusCode(200)
			->setBody($binary);
	}
}
