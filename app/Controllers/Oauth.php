<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use Hybridauth\Provider\Google;

class Oauth extends BaseController
{

	private function getConfig()
	{ // (2)
		$config = [
			'callback' => 'http://localhost:8080/oauth/google',
			'keys' => [
				'id' => env("oauth.google.id"),
				'secret' => env("oauth.google.secret")
			],
		];
		return $config;
	}
	public function google() // (3)
	{
		// session_start();
		$adapter = new Google($this->getConfig());
		$adapter->authenticate(); // (4)
		if ($adapter->isConnected()) { // (5)
			$userProfile = $adapter->getUserProfile(); // (6)
			// print_r($userProfile);
			$identifier = $userProfile->identifier ?? null; // (7)
			$displayName = $userProfile->displayName ?? null; // (8)
			$model = new MemberModel();
			$exist_data = $model->where([ // (9)
				'identifier' => $identifier,
				'social_name' => 'google'
			])->first();
			$member_id = null;
			if ($exist_data == null) { // (10)
				$member_id = $model->insert([
					'social_name' => 'google',
					'identifier' => $identifier,
					'member_name' => $displayName
				]);
			} else {
				$member_id = $exist_data['member_id']; // (11)
			}
			// var_export($member_id);
			$_SESSION['member_id'] = $member_id; // (12)
			// print_r($_SESSION);
			// var_export($_SESSION['HYBRIDAUTH::STORAGE']);
			$this->response->redirect("/post");
		} else { // (13)
			$this->response->redirect("/post");
		}
	}
	public function logout()
	{ // (14)
		$adapter = new Google($this->getConfig());
		$adapter->disconnect(); // (15)
		if (isset($_SESSION['member_id'])) { // (16)
			unset($_SESSION['member_id']);
		}
		$this->response->redirect("/post");
	}
}
