<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Home extends Base
{

	public function __construct()
	{
		parent::__construct();

	}

//	public function loadPage($data)
//	{
//		$this->load->view('templates/head', $data);
//		$this->load->view($data['dir'], $data);
//		$this->load->view('templates/footer');
//	}

	public function index()
	{
		$page['dir'] = 'pages/home';
		$page['title'] = 'Words';
		$data['content'] = 'content page';

		$this->set_title_page($page);
		$this->set_dir_page($page);
		$this->set_parameter_page($data);
		$this->load_page();

		$this->load->model('words_english_model');
	}

	public function store() {
		// tao family_word
		// lấy id từ family_word vừa tạo
		// gọi WordEnglish_model
		// trong hàm sync(), truyền cho id family_word và table

		// them family_word va lay id
		$id_family = '1';

		// them word_english va lay id
		$id = '2';


	}
}
