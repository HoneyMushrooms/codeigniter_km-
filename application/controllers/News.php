<?php

defined('BASEPATH') OR exit('No direc script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct(); //вызов конструктора родителя, могли по идее ничего не прописывать
		$this->load->model('news_model'); //подгружаем model
	}

	public function index() {
		$data['title'] = "Все новости";
		$data['news'] = $this->news_model->getNews();

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}

	public function	view($slug = NULL) {
		$data['news_item'] = $this->news_model->getNews($slug); //обращаемся к методу 
		
		print_r($data['news_item']);

		if(empty($data['news_item'])) {                 //проверка 
			show_404();
		}

		$data['title'] = $data['news_item']['title'];
		$data['content'] = $data['news_item']['text'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}
}