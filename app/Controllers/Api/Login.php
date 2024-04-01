<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Api\UserModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

class Login extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		$userModel = new UserModel();

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');

		$user = $userModel->where('email', $email)->first();

		if (is_null($user)) {
			return $this->respond(['error' => 'Invalid username or password.'], 401);
		}

		$pwd_verify = password_verify($password, $user['password']);

		if (!$pwd_verify) {
			return $this->respond(['error' => 'Invalid username or password.'], 401);
		}

		$key = getenv('JWT_SECRET');
		$iat = time(); // current timestamp value
		$exp = $iat + 3600;

		$payload = array(
			"iat" => $iat, //Time the JWT issued at
			"exp" => $exp, // Expiration time of token
			"uid" => $user['id'],
			"email" => $user['email'],
		);

		$token = JWT::encode($payload, $key, 'HS256');

		$response = [
			'message' => 'Login Succesful',
			'token' => $token
		];

		return $this->respond($response, 200);
	}
}
