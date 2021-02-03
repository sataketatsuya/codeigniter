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
        $this->post_id = $this->next_id();
        $this->user_name = $input['user_name'];
        $this->title = $input['title'];
        $this->message = $input['message'];

        $this->db->insert('post', $this);
    }

    /**
     * herokuの環境用に手動autoincrement
     *
     * @return int
     */
    public function next_id(): int
    {
        $query = $this->db->query('SELECT post_id FROM post ORDER BY post_id DESC LIMIT 1');
        if ($query->num_rows() > 0) {
            $post = $query->result();
            return $post[0]->post_id + 1;
        } else {
            return 1;
        }
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
        $this->updated_at = date('Y-m-d H:i:s');

        $this->db->where('post_id', $input['post_id']);
        $this->db->update('post', $this);
    }

    /**
     * 投稿データ削除（論理削除）
     *
     * @param int $post_id
     * @return void
     */
    public function destroy_post(int $post_id): void
    {
        $input = [
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('post_id', $post_id);
        $this->db->update('post', $input);
    }
}
