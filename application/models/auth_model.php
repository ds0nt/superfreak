<?php

class Auth_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function create($username, $password, $data)
    {
        return $this->db->insert([
            'username' => $username,
            'password' => md5($password),
            'data' => json_encode($data)
        ]);
    }

    public function login($username, $password)
    {
        return $this->db->query('SELECT username, id FROM users WHERE username = ? AND password = ?', [$username, $password])->row_array();
    }

    public function get_token($app_id, $user_id)
    {
        return $this->db->query('SELECT token FROM tokens WHERE app_id = ? AND user_id = ?', [$app_id, $user_id]);
    }

    public function get_data($app_id, $token)
    {
        return $this->db->query('SELECT data from users INNER JOIN tokens on tokens.user_id = users.id WHERE app_id = ? AND token = ?' [$app_id, $token]);
    }

    function update_entry()
    {
        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}