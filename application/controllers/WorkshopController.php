<?php

class WorkshopController extends Controller 
{

	public function indexAction()
	{

		$articles = $this->db_manager->get('Article')
			->fetchAllArticleArchives($user);
		
		return $this->render(array(
			'articles' => $articles,
			'user'     => $user,
			'_token'   => $this->generateCsrfToken('cms'),	
		));
	}
	
}