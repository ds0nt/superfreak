<?php

class Auth_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function create($username, $password, $data)
    {
        $exists = $this->db->query('SELECT * FROM users WHERE username = ?', $username)->row_array();
        if ($exists)
            return false;

        $this->db->set([
            'username' => $username,
            'password' => md5($password),
            'data' => json_encode($data)
        ]);
        return $this->db->insert('users');
    }

    public function login($username, $password)
    {
        return $this->db->query('SELECT username, id FROM users WHERE username = ? AND password = ?', [$username, md5($password)])->row_array();
    }

    public function get_token($app_id, $user_id)
    {
        return $this->db->query('SELECT token FROM tokens WHERE app_id = ? AND user_id = ?', [$app_id, $user_id])->row_array();
    }

    public function get_data($app_token, $user_token)
    {
        return $this->db->query('SELECT username, data from users as u
            INNER JOIN app_users as au on au.user_id = u.id
            INNER JOIN apps as a on a.id = au.app_id
            WHERE a.token = ? AND au.token = ?', [$app_token, $user_token])->row_array();
    }

    function update_entry()
    {
        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }


    /**
     * Create a token for storage
     */
    public function gen_token($len = 64)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        for ($i=0; $i<$len; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
        }
        return $token;
    }

    public function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range == 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes, $s)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    public function app_create($name) {

        $exists = $this->db->query('SELECT * FROM apps WHERE name = ?', $name)->row_array();

        if ($exists)
            return false;

        $token = $this->gen_token();

        $this->db->set([
            'token' => $token,
            'name' => $name
        ]);

        return $this->db->insert('apps') ? $token : false;
    }

    public function get_app_by_token($token) {
        return $this->db->query('SELECT * from apps where token = ?', [$token])->row_array();
    }

    public function app_auth($token, $username, $password) {
        $user = $this->login($username, $password);

        if (empty($user)) {
            return false;
        }

        $app = $this->get_app_by_token($token);

        if (empty($app)) {
            return false;
        }

        $exists = $this->db->query('SELECT token FROM app_users WHERE user_id = ? AND app_id = ?', [$user['id'], $app['id']])->row_array();
        die($exists);

        if (!empty($exists)) {
            return $exists['token'];
        }

        $token = $this->gen_token();

        $this->db->set([
            'app_id' => $app['id'],
            'user_id' => $user['id'],
            'token' => $token
        ]);

        $success = $this->db->insert('app_users');
        if (!$success)
            return false;

        return $token;
    }
}