<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Helpers\LoginHelper;
use App\Models\PostsModel;
use Michelf\Markdown;

class Post extends BaseController
{
	// 생성
	public function create()
	{
		if (LoginHelper::isLogin() === false) {
			return $this->response->redirect("/post");
		}

		if ($this->request->is('get')) {
			return view("/post/create");
		}

		// list($create_success, $post_id, $errors) =
		// 	PostService::factory()
		// 	->create(
		// 		$this->request->getPost(),
		// 		LoginHelper::memberId()
		// 	);
		// if ($create_success) {
		// 	return $this->response->redirect("/post/show/$post_id");
		// }

		// $postEntity = new PostEntity();
		// $postEntity->fill($this->request->getPost());
		// return view("/post/create", [
		// 	'post_data' => $postEntity,
		// 	'errors' => $errors
		// ]);
		$model = new PostsModel();
		// $post_id = $model->insert($this->request->getPost());
		$data = $this->add_input_markdown();
		$data['author'] = LoginHelper::memberId();
		$post_id = $model->insert($data);
		if ($post_id) {
			$this->response->redirect("/post/show/$post_id");
		} else {
			return view("/post/create", [
				'post_data' => $this->request->getPost(),
				'errors' => $model->errors()
			]);
		}
	}

	// 조회
	public function show($post_id)
	{
		$model = new PostsModel();
		$post = $model->find($post_id); // 1
		if (!$post) { // 2
			return $this->response->redirect("post");
		}

		$isAuthor = LoginHelper::isLogin() && $post['author'] == LoginHelper::memberId(); // (1)
		return view('/post/show', [
			'post' => $post,
			'isAuthor' => $isAuthor
		]);
	}

	// 수정
	public function edit($post_id)
	{

		if (LoginHelper::isLogin() === false) {
			return $this->response->redirect("/post");
		}

		$model = new PostsModel();
		$post = $model->find($post_id); // 1
		if (!$post) { // 2
			return $this->response->redirect("post");
		}

		// 추가된 코드
		if ($post['author'] !== LoginHelper::memberId()) { // (1)
			return $this->response->redirect("/post");
		}

		if ($this->request->is('get')) {
			return view("/post/create", [
				'post_data' => $post
			]);
		}
		// $isSuccess = $model->update($post_id, $this->request->getPost());
		$data = $this->add_input_markdown();
		$isSuccess = $model->update($post_id, $data);

		if ($isSuccess) {
			$this->response->redirect("/post/show/$post_id");
		} else {
			return view("/post/create", [
				'post_data' => $this->request->getPost(),
				'errors' => $model->errors()
			]);
		}
	}

	// 삭제
	public function delete()
	{

		if (LoginHelper::isLogin() === false) {
			return $this->response->redirect("/post");
		}

		if (!$this->request->is('post')) {
			return $this->response->redirect("/post");
		}
		$post_id = $this->request->getPost('post_id'); // (2)
		$model = new PostsModel();
		$post = $model->find($post_id);
		if (!$post) {
			return $this->response->redirect("/post");
		}

		// 추가된 코드
		if ($post['author'] !== LoginHelper::memberId()) { // (1)
			return $this->response->redirect("/post");
		}

		$model->delete($post_id); // (3)
		return $this->response->redirect("/post"); // (4)

	}

	// 목록
	public function index()
	{
		$model = new PostsModel();
		$post_query = $model->orderBy("created_at", "desc");
		$post_list = $model->paginate(10); // (1)
		$pager = $post_query->pager;
		$pager->setPath("/post");
		return view("post/index", [
			'post_list' => $post_list,
			'pager' => $pager,
			'isLogin' => LoginHelper::isLogin() // 추가된 코드
		]);
	}

	// 마크다운으로 변환하기
	private function add_input_markdown()
	{ // (1)
		$data = $this->request->getPost();
		if (array_key_exists("content", $data)) { // (2)
			$content = $data['content'];
			$content = str_replace(PHP_EOL, "  " . PHP_EOL, $content); // (3)
			$data['html_content'] = Markdown::defaultTransform($content); // (4)
		}
		return $data;
	}
}
