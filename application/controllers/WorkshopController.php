<?php

class WorkshopController extends Controller 
{
	const RESULT_PAGE = 6;
	
	public function indexAction()
	{
		$limit = self::RESULT_PAGE;
		$articles = $this->db_manager->get('Workshop')
			->fetchArticleArchives($limit);
		
		return $this->render(array(
			'articles' => $articles,
// login機能は後で追加	
// 			'user'     => $user
		));
	}
	
	public function pagingAction()
	{
		if (!$this->request->isPost()) {
			$this->forward404();
		}
		$loading = array("hoge" => "loading");
		$hoge =json_encode($loading);
 	    return $hoge;
	}
}