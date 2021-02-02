<?php
class PostModel extends CI_Model
{
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
        $input['user_id'] = 1;
		$this->db->insert('post', $input);
	}

	public function edit_post($input)
	{
		$input['user_id'] = 1;
        $this->db->where('post_id', $input['post_id']);
        $this->db->update('post', $input);
	}

	public function destroy_post($post_id)
	{
        $input = [
			'deleted_at' => date('Y-m-d H:i:s'),
		];
		$this->db->where('post_id', $post_id);
		$this->db->update('post', $input);
	}
}
