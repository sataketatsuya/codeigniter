<?php
class PostModel extends CI_Model
{
	public $user_name = '';
	public $title = '';
	public $message = '';

	/**
	 * コンストラクタ
	 */
	public function __construct()
	{
        $this->load->database();
	}

	/**
	 * 投稿データ取得
	 *
	 * @return array
	 */
    public function get_posts(): array
    {
		$query = $this->db->get('post');

		if ($query->num_rows() > 0) {
			$result = $query->result_array();

            return $result;
		} else {
            return [];
		}
	}

	/**
	 * 投稿データ挿入
	 *
	 * @param array $input
	 * @return void
	 */
	public function insert_post(array $input): void
	{
		$this->user_name = $input['user_name'];
		$this->title = $input['title'];
		$this->message = $input['message'];

		$this->db->insert('post', $this);
	}

	/**
	 * 投稿データ更新
	 *
	 * @param array $input
	 * @return void
	 */
	public function edit_post(array $input): void
	{
		$this->user_name = $input['user_name'];
		$this->title = $input['title'];
		$this->message = $input['message'];

		$this->db->where('post_id', $input['post_id']);
        $this->db->update('post', $this);
	}

	/**
	 * 投稿データ削除（論理削除）
	 *
	 * @param array $post_id
	 * @return void
	 */
	public function destroy_post(array $post_id): void
	{
        $input = [
			'deleted_at' => date('Y-m-d H:i:s'),
		];
		$this->db->where('post_id', $post_id);
		$this->db->update('post', $input);
	}
}
