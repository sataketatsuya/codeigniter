<?php
class PostModel extends CI_Model
{
	public $title;
	public $message;
	public $user_id;

	public function __construct()
	{
        $this->load->database();
	}

    public function get_posts()
    {
		$query = $this->db->get('post');

		if ($query->num_rows() > 0) {
			$result = $query->result_array();

            return $result;
		} else {
            return false;
		}
	}

	public function insert_post($input)
	{
		$this->title = $input['title'];
        $this->message = $input['message'];
        $this->user_id = 1;
		$this->db->insert('post', $this);
	}
}
