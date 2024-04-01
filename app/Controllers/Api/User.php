<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User extends BaseController
{

	use ResponseTrait;

	protected $userModel;
	protected $data;

	public function __construct()
	{
		$this->userModel = new \App\Models\Api\UserModel();
	}

	public function index()
	{
		return $this->respond(['users' => $this->userModel->findAll()], 200);
	}

	public function meme()
	{
		$key = getenv('TOKEN_SECRET');
		$header = $this->request->getServer('HTTP_AUTHORIAZTION');
		if (!$header) return $this->failUnauthorized('Token Required2');
		$token = explode(' ', $header)[1];

		// try {
		// 	$decoded = JWT::decode($token,  new Key($key, 'HS256'));
		// 	print_r($decoded);
		// 	$response = [
		// 		'id' => $decoded->uid,
		// 		'email' => $decoded->email
		// 	];
		// 	return $this->respond($response);
		// } catch (\Throwable $th) {
		// 	return $this->fail('Invalid Token');
		// }

		// return $this->respond(['users' => $this->userModel->findAll()], 200);

		$response = [
			'message' => 'Me',
			'token' => $token
		];

		return $this->respond($response, 200);
	}

	public function get($id = false)
	{
		if ($id) {
			$data = $this->userModel->find($id);
		} else {
			$data = $this->userModel->findAll();
		}

		return $this->respond($data);
	}

	public function put($id = false)
	{
		$ret = false;
		if ($id && !empty($this->data)) {
			$ret = true;
			$this->userModel->update($id, $this->data);
		}

		return $this->respond($ret);
	}

	public function post()
	{
		$ret = false;
		if (!empty($this->data)) {
			$ret = true;
			$this->userModel->insert($this->data);
		}

		return $this->respond($ret);
	}

	public function delete($id = false)
	{
		$ret = false;

		if ($id) {
			$ret = true;
			$this->userModel->delete($id);
		}

		return $this->respond($ret);
	}
}
