<?php

class WorkshopRepository extends DbRepository
{

	public function fetchAllArticleArchives()
	{
		
		$sql = "SELECT * FROM cms_article";
		
		return $this->fechAll($sql);
	}
}

