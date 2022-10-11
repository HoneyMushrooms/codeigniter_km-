<?php

defined('BASEPATH') or exit('No direc script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct(); //вызов конструктора родителя, могли по идее ничего не прописывать
		$this->load->model('news_model');
	}

	public function index() {
		$data['title'] = "Все новости";
		$data['news'] = $this->news_model->getNews();

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}
}