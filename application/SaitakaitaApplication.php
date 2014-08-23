<?php

class SaitakaitaApplication extends Application 
{
	protected $login_action = array('account', 'signin');
	
	public function getRootDir()
	{
		return dirname(__FILE__);
	}
	
	protected function registerRoutes()
	{
		return array(
			'/'
				=> array('controller' => 'top', 'action' => 'index'),
			'/workshop'
				=> array('controller' => 'workshop', 'action' => 'index'),
			'/workshop/pagingApi'
				=> array('controller' => 'workshop', 'action' => 'paging'),
			'/cms'
				=> array('controller' => 'cms', 'action' => 'index'),
			'/cms/edit'
				=> array('controller' => 'cms', 'action' => 'edit'),
			'/cms/post'
				=> array('controller' => 'cms', 'action' => 'post'),
			'/cms/update/:id'
				=> array('controller' => 'cms', 'action' => 'update'),
			'/cms/edit/:id'
				=> array('controller' => 'cms', 'action' => 'editor'),
			'/deleteApi'
				=> array('controller' => 'cms', 'action' => 'delete'),
			'/account/:action'
				=> array('controller' => 'account'),
		);
	}
	
	protected function configure()
	{
		$this->db_manager->connect('master', array(
			'dsn'      => 'mysql:dbname=saitakaita;host=localhost',
			'user'     => 'root',
			'password' => 'root',
		));
	}
}