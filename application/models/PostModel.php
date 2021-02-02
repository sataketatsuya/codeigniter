<?php
class PostModel extends CI_Model
{
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
	 * @return array|false
	 */
    public function get_posts(): array
    {
		$query = $this->db->get('post');

		if ($query->num_rows() > 0) {
			$result = $query->result_array();

            return $result;
		} else {
            return false;
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
		$this->db->insert('post', $input);
	}

	/**
	 * 投稿データ更新
	 *
	 * @param array $input
	 * @return void
	 */
	public function edit_post(array $input): void
	{
        $this->db->where('post_id', $input['post_id']);
        $this->db->update('post', $input);
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
