<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Api\UserModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;

/**
 * @OA\Info(title="JSFramwork API", version="1.0")
 * 	@OA\SecurityScheme(
 * 		type="http",
 * 		description=" Use /auth to get the JWT token",
 * 		name="Authorization",
 * 		in="header",
 * 		scheme="bearer",
 * 		bearerFormat="JWT",
 * 		securityScheme="bearerAuth",
 * )
 */

class Login extends BaseController
{
	use ResponseTrait;


	/**
	 * @OA\Post(path="/api/login/",
	 * 	summary="Method for Login post",
	 * 	tags={"Login"},
	 * 	@OA\RequestBody(
	 * 		@OA\MediaType(
	 *			mediaType="application/json",
	 *			@OA\Schema(
	 *				@OA\Property(
	 *					property="email",
	 *					type="string",
	 *				),
	 *				@OA\Property(
	 *					property="password",
	 *					type="string",
	 *				),
	 *			),
	 *		),
	 *	),
	 *  @OA\Response(response="200", description="Login Succesful"),
	 *  @OA\Response(response="404", description="Not Found"),
	 * 	security={ {"bearerAuth":{}}}
	 * )
	 */
	public function index()
	{
		$userModel = new UserModel();

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');

		// $email = $this->request->getVar();
		// $response = [
		// 'message' => 'Login Succesful',
		// 'token' => $email
		// ];
		// return $this->respond($response, 200);

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
