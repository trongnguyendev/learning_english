<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Base.php';

class Word extends Base {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('source_model');
		$this->load->model('type_model');
		$this->load->model('word_family_model');
		$this->load->model('words_english_model');
		$this->load->model('translation_vietnamese');
		$this->load->model('sentence_model');
		$this->load->model('word_translation');
		$this->load->model('word_type');

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('template');

	}

	public function index()
	{
		$sources = $this->source_model->get_source_word();
		$words = $this->words_english_model->get_words_family();
		$this->template->assign('sources', $sources);
		$this->template->assign('words', $words);
		$this->template->view('pages/words/index');
	}

	public function find($word) {
		$arr_all = array();
		$type = $this->type_model->get_type_by_family($word);
		$translation = $this->words_english_model->get_word_translation($word);
		array_push($arr_all, $type, $translation);
		echo json_encode($arr_all);
	}
	public function add() {
		$sources = $this->source_model->all();
		$types = $this->type_model->all();
		$this->template->assign('sources', $sources);
		$this->template->assign('types', $types);
		$this->template->view('pages/words/word-add');
	}
	public function get_family_word() {
		$data = $this->input->post('name');
		$word_relate = $this->words_english_model->get_word_translation_like($data);
		if($word_relate && !empty($data)) {
			echo json_encode($word_relate);
		}
		else {
			echo '';
		}
	}

	public function store_family_word($data) {
		$data_store = array(
			'name_family'=> $data
		);
		$check = $this->word_family_model->check_family_word($data);
		if($check === '') {
			return $this->word_family_model->store($data_store);
		} else {
			return $check;
		}
	}

	public function store_translation_vietnamese($data) {
		$getId = $this->translation_vietnamese->store($data);
		if($getId) {
			return $getId;
		}
		return false;
	}

	public function store_sentence($data) {
		$getIdSentence = $this->sentence_model->store($data);
		if($getIdSentence) {
			return $getIdSentence;
		}
		return false;
	}

	public function get_word_added_today() {
		$word_today = $this->words_english_model->get_infor_word_added_today();
		echo json_encode($word_today);
	}
	public function store_word() {


		$word = $this->input->post('word');
		$word_family = $this->input->post('word_family');

		$translations = $this->input->post('translation');
		$sentences = $this->input->post('sentence');
		$types = $this->input->post('type');

		$source = $this->input->post('source');

		$created_at = date('Y-m-d H-i-s', time());
		$user = 1;

		// add family_word
		$family_word_id = $this->store_family_word($word_family);

		$flag_status = false;

		foreach($translations as $key => $translation) {

			// add translation with type_id
			$data_translation = array(
				'content' => $translation,
				'type_id' => $types[$key],
				'created_at' => $created_at
			);
			$translation_id = $this->store_translation_vietnamese($data_translation);

			// add sentence with translation_id
			$data_sentence = array(
				'content' => $sentences[$key],
				'translation_id' => $translation_id
			);

			$sentence_id = $this->store_sentence($data_sentence);

			$data_word = array(
				'word' => $word,
				'word_family_id' => $family_word_id,
				'user_id' => '1',
				'source_id' => $source,
				'created_at' => $created_at,
			);
			// find word: new is create, exist is return id
			$is_word = $this->words_english_model->find_bool($word, 'word');
			if(!$is_word) {
				$word_id = $this->words_english_model->store($data_word);
			}else {
				$word_id = $is_word;
			}

			// sync relationship words & translation_vn
			$sync_word_translation = $this->word_translation->sync_many($word_id, $translation_id);

			// sync relationship words & type
			$sync_word_type = $this->word_type->sync_many($word_id, $types[$key]);


			if($sync_word_translation && $sync_word_type) {
				$flag_status = true;
			}else {
				$flag_status = false;
			}
		};


		if($flag_status) {
			echo 'success';
		}else {
			echo 'error';
		}
	}

	public function update_word($id) {
		$data_update = array(
			'word' => 'abcdef',
			'type' => '2',
			'category_id' => '1',
			'user_id' => '1',
			'family_word_id' => '2',
			'updated_at' => time()
		);
		$this->words_english_model->update_word($id, $data_update);
	}

	/* update translation and sentence by id - 06/05/2021 */
	public function update_translation_sentence_by_id($id_translation, $id_sentence) {
		$updated_at = date('Y-m-d H-i-s', time());
		$content_translation_update = $this->input->post('content_translation');
		$content_sentence_update = $this->input->post('content_sentence');
		$data_update_translation = array(
			'new_translation' => $content_translation_update,
			'updated_at' => $updated_at
		);

		$is_update_translation = $this->translation_vietnamese->update_translation($id_translation, $data_update_translation);

		$data_update_sentence = array(
			'new_sentence' => $content_sentence_update
		);

		$id_update_sentence = $this->sentence_model->update_sentence($id_sentence, $data_update_sentence);

		if($is_update_translation && $id_update_sentence) {
			echo 'updated';
		}
		else {
			echo 'error update';
		}
	}

	public function delete_translation_sentence_by_id($id_translation, $id_sentence) {
		$is_delete_translation = $this->translation_vietnamese->delete($id_translation);
		$is_delete_sentence = $this->sentence_model->delete($id_sentence);
		if($is_delete_translation && $is_delete_sentence) {
			echo "Deleted";
		}
		else {
			echo "Error";
		}
	}

	public function store_source() {
		$source = $this->input->post('name_source');
		$data_source = array(
			'name_source' => $source
		);
		$is_source = $this->source_model->store($data_source);
		if($is_source) {
			echo $is_source;
		}
		else {
			echo "Error add";
		}
	}

	public function delete_source($id_source) {
		$is_delete_source = $this->source_model->delete($id_source);
		if($is_delete_source) {
			echo "Deleted";
		}
		else {
			echo "Error";
		}
	}

	public function repeat() {
		$this->template->view('pages/words/write-repeat');
	}




}
