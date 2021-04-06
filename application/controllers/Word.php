<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Word extends Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('wordsEnglish_model');
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$page['dir'] = 'pages/words';
		$page['title'] = 'Words';
		$data['content'] = 'content page';
		$data['words'] = $this->wordsEnglish_model->get();

		$this->set_title_page($page);
		$this->set_dir_page($page);
		$this->set_parameter_page($data);
		$this->load_page();
	}
}
