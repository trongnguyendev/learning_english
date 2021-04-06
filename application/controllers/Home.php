<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{


	}

	public function loadPage($data)
	{
		$this->load->view('templates/head', $data);
		$this->load->view($data['dir'], $data['content']);
		$this->load->view('templates/footer');
	}

	public function index()
	{
		$data['dir'] = 'pages/home';
		$data['content'] = 'content page';
		$data['title'] = 'Welcome';

		$this->loadPage($data);
	}
}
