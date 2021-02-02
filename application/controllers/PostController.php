<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use CodeIgniter\HTTP\IncomingRequest;

class PostController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('postmodel');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['posts'] = $this->postmodel->get_posts();

		$mode_success = $this->session->success;
		$mode_failure = $this->session->failure;
		$paramaters = $this->input->get();

		$edit_post = isset($paramaters['post_id']) ? $data['posts'][$paramaters['post_id']-1] : null;

		$this->load->view('post', [
			'posts' => $data['posts'],
			'mode_success' => $mode_success,
			'mode_failure' => $mode_failure,
			'edit_post' => $edit_post,
		]);
	}

	public function register()
	{
		$this->set_validation();
		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('failure', validation_errors());
			redirect('http://localhost:8000/postcontroller');
		} else {
			$input = $this->input->post();
			if (isset($input['post_id'])) {
				$this->postmodel->edit_post($input);
			} else {
				$this->postmodel->insert_post($input);
			}

			$this->session->set_flashdata('success', '登録完了しました');
			redirect('http://localhost:8000/postcontroller');
		}
	}

	public function destroy($post_id)
	{
		$this->postmodel->destroy_post($post_id);
		$this->session->set_flashdata('success', '削除しました');
		redirect('http://localhost:8000/postcontroller');
	}

	public function set_validation()
	{
		$this->form_validation->set_rules('title', '表示名', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('message', 'ひと言メッセージ', 'trim|required|max_length[99999]');
	}
}