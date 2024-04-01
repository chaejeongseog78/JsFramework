<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Me extends ResourceController
{
	/**
	 * Return an array of resource objects, themselves in array format.
	 *
	 * @return ResponseInterface
	 */
	use ResponseTrait;

	public function index()
	{
		// $issuedAt = time();
		// $expirationTime = $issuedAt + 60;  // jwt valid for 60 seconds from the issued time
		// $payload = array( // Any random data
		// 	'userid' => 'Test_UID',
		// 	'name' => 'Sankhnad Mishra',
		// 	'iat' => $issuedAt,
		// 	'exp' => $expirationTime
		// );
		// $key = 'A_JWT_SECRET'; // Any string
		// $alg = 'HS256'; // This is alg

		// $token = JWT::encode($payload, $key, $alg); // Encode payload as a JWT Token
		// $decodedToken = JWT::decode($token, new Key($key, 'HS256')); // Decode token to a payload

		// $response = [
		// 	'token' => $token,
		// 	'decodedToken' => $decodedToken
		// ];

		// print_r($response);

		$key = getenv('JWT_SECRET');
		$header = $this->request->getServer('HTTP_AUTHORIZATION');
		if (!$header) return $this->failUnauthorized('Token Required3');
		$token = explode(' ', $header)[1];

		try {
			$decoded = JWT::decode($token, new Key($key, 'HS256'));
			$response = [
				'id' => $decoded->uid,
				'email' => $decoded->email
			];
			return $this->respond($response);
		} catch (\Throwable $th) {
			return $this->fail('Invalid Token3');
		}
	}

	/**
	 * Return the properties of a resource object.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function show($id = null)
	{
		//
	}

	/**
	 * Return a new resource object, with default properties.
	 *
	 * @return ResponseInterface
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters.
	 *
	 * @return ResponseInterface
	 */
	public function create()
	{
		//
	}

	/**
	 * Return the editable properties of a resource object.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model.
	 *
	 * @param int|string|null $id
	 *
	 * @return ResponseInterface
	 */
	public function delete($id = null)
	{
		//
	}
}
