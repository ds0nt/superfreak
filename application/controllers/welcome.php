<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
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

        $this->load->model('auth_model')
        $this->auth_model->get_data($app_id, $token);

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */