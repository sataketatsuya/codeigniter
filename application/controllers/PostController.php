<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use CodeIgniter\HTTP\IncomingRequest;

class PostController extends CI_Controller
{
	/**
	 * コンストラクタ
	 */
	public function __construct()
	{
		parent::__construct();
        $this->load->dbforge();
		$this->load->library('session');
		$this->load->model('PostModel');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->dbforge->create_database('post_app');
		$this->dbforge->create_table('post', TRUE);
	}

	/**
	 * 一覧画面表示
	 *
	 * @return void
	 */
	public function index(): void
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

	/**
	 * データベース登録
	 *
	 * @return void
	 */
	public function register(): void
	{
		$this->set_validation();
		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('failure', validation_errors());
			redirect('https://codeigniter-post-app.herokuapp.com/postcontroller');
		} else {
			$input = $this->input->post();
			if (isset($input['post_id'])) {
				$this->postmodel->edit_post($input);
			} else {
				$this->postmodel->insert_post($input);
			}

			$this->session->set_flashdata('success', '登録完了しました');
			redirect('https://codeigniter-post-app.herokuapp.com/postcontroller');
		}
	}

	/**
	 * データベース削除
	 *
	 * @param int $post_id
	 * @return void
	 */
	public function destroy(int $post_id)
	{
		$this->postmodel->destroy_post($post_id);
		$this->session->set_flashdata('success', '削除しました');
		redirect('https://codeigniter-post-app.herokuapp.com/postcontroller');
	}

	/**
	 * バリデーションセット
	 *
	 * @return void
	 */
	public function set_validation(): void
	{
		$this->form_validation->set_rules('user_name', 'ユーザ名', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('title', '表示名', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('message', 'ひと言メッセージ', 'trim|required|max_length[99999]');
	}
}
