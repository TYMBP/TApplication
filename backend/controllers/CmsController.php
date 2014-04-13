<?php

class CmsController extends Controller 
{

	protected $login_action = array('index');
	
	public function indexAction()
	{
		if (!$this->session->isAuthenticated()) {
			return $this->redirect('/account/signin');
		}

		$user = $this->session->get('user');
		$articles = $this->db_manager->get('Article')
			->fetchAllArticleArchives($user);
		
		return $this->render(array(
			'articles' => $articles,
			'user'     => $user,
			'_token'   => $this->generateCsrfToken('cms'),	
		));
	}
	
	public function editAction()
	{
		return $this->render(array(
			'title'  => '',
			'body'   => '',
			'action' => 'post',
			'_token' => $this->generateCsrfToken('cms/post'),	
		));
	}
	
	public function postAction()
	{
		if (!$this->request->isPost()) {
			$this->forward404();
		}
		
		$token = $this->request->getPost('_token');
		if (!$this->checkCsrfToken('cms/post', $token)) {
			return $this->redirect('/cms');
		}
		$title = $this->request->getPost('title');
		$body = $this->request->getPost('body');
		$category = $this->request->getPost('category');
		$errors = array();
		
		if (!strlen($title)) {
			$errors[] = 'タイトルが入力されてません';
		} elseif (mb_strlen($title) > 30) {
			$errors[] = 'タイトルは30文字以内で入力してください'; 	
		}
		if ($category == 0) {
			$errors[] = 'カテゴリが選択されてません';
		}
		if (!strlen($body)) {
			$errors[] = '本文が入力されてません';
		} elseif (mb_strlen($title) > 10000) {
			$errors[] = 'タイトルは10,000文字以内で入力してください'; 	
		}
		if (count($errors) === 0) {
			$user = $this->session->get('user');
			$this->db_manager->get('Article')->insert($user['id'], $title, $category, $body);
			
			return $this->redirect('/cms');
		}
		
		return $this->render(array(
			'title'    => $title,
			'category' => $category,
			'body'     => $body,
			'errors'   => $errors,
			'action'   => 'post',
			'_token'   => $this->generateCsrfToken('cms/post'),
		), 'edit');
	}
	
	public function editorAction($params)
	{
		$editor = $this->db_manager->get('Article')
			->fetchArticleById($params['id']);

		if (!$editor) {
			$this->forward404();
		}
		
		return $this->render(array(
			'id'       => $params['id'],
			'title'    => $editor['title'],
			'category' => $editor['category'],
			'body'  => $editor['body'],
			'action' => 'update',
			'_token' => $this->generateCsrfToken('cms/update'),	
		),'edit');
	}
	public function updateAction($params)
	{
		if (!$this->request->isPost()) {
			$this->forward404();
		}
		
		$token = $this->request->getPost('_token');
		if (!$this->checkCsrfToken('cms/update', $token)) {
			return $this->redirect('/cms');
		}
		$title = $this->request->getPost('title');
		$body = $this->request->getPost('body');
		$category = $this->request->getPost('category');
		$errors = array();
		
		if (!strlen($title)) {
			$errors[] = 'タイトルが入力されてません';
		} elseif (mb_strlen($title) > 30) {
			$errors[] = 'タイトルは30文字以内で入力してください'; 	
		}
		if ($category == 0) {
			$errors[] = 'カテゴリが選択されてません';
		}
		if (!strlen($body)) {
			$errors[] = '本文が入力されてません';
		} elseif (mb_strlen($title) > 10000) {
			$errors[] = 'タイトルは10,000文字以内で入力してください'; 	
		}
		if (count($errors) === 0) {
			$user = $this->session->get('user');
			$this->db_manager->get('Article')->update($params['id'], $user['id'], $title, $category, $body);
			
			return $this->redirect('/cms');
		}
		
		return $this->render(array(
			'id'       => $params['id'],
			'title'    => $title,
			'category' => $category,
			'body'     => $body,
			'errors'   => $errors,
			'action'   => 'update',
			'_token'   => $this->generateCsrfToken('cms/update'),
		), 'edit');
	}

	public function deleteAction()
	{
		if (!$this->request->isPost()) {
			$this->forward404();
		}
		$a_id = $this->request->getPost('id');
		$token = $this->request->getPost('token');

		if (!$this->checkCsrfToken('cms', $token)) {
			return $this->redirect('/cms');
		}
		if ($a_id) {
			$this->db_manager->get('Article')->delete($a_id);
		}
		return true;
	}
}
