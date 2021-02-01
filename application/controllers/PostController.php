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
		$this->load->helper('url');
	}

	public function index()
	{
		$data['posts'] = $this->postmodel->get_posts();

		$mode_success = $this->session->success;
		$post_id = $this->session->post_id;

		if ($this->session->post_id) {

		}

		$this->load->view('post', [
			'posts' => $data['posts'],
			'mode_success' => $mode_success,
			'post_id' => $post_id
		]);
	}

	public function create()
	{
		$input = $this->input->post();
		$this->postmodel->insert_post($input);

		$this->session->set_flashdata('success', true);
		redirect('http://localhost:8000/postcontroller');
	}

	public function edit($post_id)
	{
		$this->session->set_flashdata('post_id', $post_id);
		redirect('http://localhost:8000/postcontroller');
	}
}
