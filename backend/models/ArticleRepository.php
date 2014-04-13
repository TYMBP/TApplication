<?php

class ArticleRepository extends DbRepository
{
	const ARTICLE_STATUS = 0;
	
	public function insert($user, $title, $category, $body, $image_path = null)
	{
		$now = new DateTime();
		$sql = "INSERT INTO cms_article(user_id, category, image_path, title, body, created_at, update_at)
					VALUES(:user_id, :category, :image_path, :title, :body, :created_at, :update_at)";
		
		$stmt = $this->execute($sql, array(
			':user_id'    => $user,
			':category'   => $category,
			':image_path' => $image_path,
			':title'      => $title,
			':body'       => $body,
			':created_at' => $now->format('Y-m-d H:i:s'),
			':update_at'  => $now->format('Y-m-d H:i:s'),
		));
	}
	
	public function fetchAllArticleArchives($user_id)
	{
		$sql = "SELECT a.* FROM cms_article a WHERE status = 1 ORDER BY a.update_at DESC";	
		
		return $this->fetchAll($sql);
	}
	
	public function fetchArticleById($id)
	{
		$sql = "SELECT a.* FROM cms_article a WHERE a.id = :id";
		
		return $this->fetch($sql, array(
			':id'   => $id
		));
	}

	public function update($id, $user, $title, $category, $body, $image_path = null)
	{
		$now = new DateTime();
		$sql = "UPDATE cms_article 
					SET user_id = :user_id, category = :category, image_path = :image_path, title = :title, body = :body, update_at = :update_at
					WHERE id = :id";	

		$stmt = $this->execute($sql, array(
			':user_id'    => $user,
			':category'   => $category,
			':image_path' => $image_path,
			':title'      => $title,
			':body'       => $body,
			':update_at'  => $now->format('Y-m-d H:i:s'),
			':id'         => $id
		));
	}
	
	public function delete($id)
	{
		$sql = "UPDATE cms_article
					SET status = :status
					WHERE id = :id;";		

		$stmt = $this->execute($sql, array(
			':id'     => $id,
			':status' => self::ARTICLE_STATUS
		));
	}
}
