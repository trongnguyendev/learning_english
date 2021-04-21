<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
	private $dir_page;
	private  $title_page;
	private  $parameter_page;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Ho_Chi_Minh");
	}

	protected  function set_dir_page($page) {
		$this->dir_page = $page['dir'];
	}

	protected  function set_title_page($page) {
		$this->title_page = $page;
	}

	protected  function set_parameter_page($data) {
		$this->parameter_page = $data;
	}

	protected function load_page() {
		$this->load->view('templates/head', $this->title_page);
		$this->load->view($this->dir_page, $this->parameter_page);
		$this->load->view('templates/footer');
	}


}
