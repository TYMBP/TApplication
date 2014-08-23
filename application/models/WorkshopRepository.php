<?php

class WorkshopRepository extends DbRepository
{
	// workshop page
	public function fetchArticleArchives($limit)
	{
		$sql = "SELECT * FROM cms_article  ORDER BY created_at DESC LIMIT $limit";
		
		return $this->execute($sql);		
		
	}


}

