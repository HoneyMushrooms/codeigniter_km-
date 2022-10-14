<?php

class News_model extends CI_Model { //имя класса должно совпадать с названием файла

	public function __construct() {
		$this->load->database();  //загрузили бд, теперь можем обращаться
	}

	public function getNews($slug = FALSE) {
		if($slug === FALSE){
			$query = $this->db->get('news');
			return $query->result_array();
		}

		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

}