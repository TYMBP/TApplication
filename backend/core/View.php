<?php

class  View
{
	protected $base_dir;
	protected $defaults; //共通で使いたい変数を設定する際に使用
	protected $layout_variables = array();
	protected $layout_resouce = array();
	protected $script_resouce = array();
	
	public function __construct($base_dir, $defaults = array())
	{
		$this->base_dir = $base_dir;
		$this->defaults = $defaults;
	}
	
	public function setLayoutVar($name, $value)
	{
		$this->layout_variables[$name] = $value;
	}
	
	public function setLayoutResourceVar($name, $value)
	{
		$this->layout_resouce[$name] = $value;		
	}
	
	public function setScriptResourceVar($scripts = array())
	{
		$this->script_resouce = array('script' => $scripts);
	}
	
	public function render($_path, $_variables = array(), $_layout = false)
	{
		$_file = $this->base_dir . '/' . $_path . '.php';
		
		extract(array_merge($this->defaults, $_variables));
		
		ob_start();
		ob_implicit_flush(0);
		
		require $_file;
		
		$content = ob_get_clean();

		if ($_layout) {
			$content = $this->render($_layout,
				array_merge($this->layout_variables, $this->layout_resouce, $this->script_resouce, array(
					'_content' => $content,
				)
			));
		}
	
		return $content;
	}
	
	public function escape($string)
	{
		return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	}
}