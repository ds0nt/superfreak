<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function userauth()
    {
        $this->load->view('userauth', [
            'apptoken' => $this->input->get('token'),
            'redirect' => $this->input->get('redirect')
        ]);
    }


    public function register_post()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = $this->input->post('data');

        $this->load->model('auth_model');

        $success = $this->auth_model->create($username, $password, $data);

        $result = [
            'success' => $success
        ];

        echo json_encode($result);
    }

    public function app_register_post()
    {
        $name = $this->input->post('name');
        $this->load->model('auth_model');

        $token = $this->auth_model->app_create($name);

        $result = ['success' => false];

        if ($token) {
            $result = [
                'success' => true,
                'token' => $token
            ];
        }


        echo json_encode($result);
    }

    public function token_get()
    {
        $username = $this->input->get('username');
        $password = $this->input->get('password');
        $app_id = $this->input->get('app_id');

        $this->load->model('auth_model');

        $user = $this->auth_model->login($username, $password);

        $result = ['success' => false];

        if (!empty($user)) {
            $token = $this->auth_model->get_token($user['id']);
            $result = [
                'success' => $user,
                'token' => $token
            ];
        }

        echo json_encode($result);
    }

    public function data_get()
    {
        $app_id = $this->input->get('app_id');
        $token = $this->input->get('token');

        $this->load->model('auth_model');
        $data = $this->auth_model->get_data($app_id, $token);

        echo json_encode($data);
    }

    public function app_auth_post()
    {
        $apptoken = $this->input->post('app_token');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $redirect = $this->input->post('redirect');

        $this->load->model('auth_model');

        $authed_token = $this->auth_model->app_auth($apptoken, $username, $password);

        $result = ['success' => false];

        if ($authed_token) {
            $result = [
                'success' => true,
                'token' => $authed_token
            ];
        }
        return;

        $this->load->helper('url');
        redirect($redirect . "?token=" . $authed_token, 'location');
    }
}