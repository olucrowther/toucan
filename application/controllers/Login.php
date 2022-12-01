<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){

        Header('Access-Control-Allow-Origin: *'); 

        parent::__construct();
        
    }
	public function index()
	{
        if(!$this->session->has_userdata('loggedIn')){
        
            //$this->load->view('templates/header');

            $this->load->view('login');

            //$this->load->view('templates/footer');

        }else{

            redirect( base_url('member-list') ,'refresh');

        }
	}

    public function login_user(){

        $email = $this->input->post('email');

        $password = md5($this->input->post('password'));

        $result = $this->login_model->login_user($email, $password);

        if($result){

            $userdata = array('loggedIn' => 1, 'email' => $result['email'], 'id' => $result['adminID']);

            $this->session->set_userdata($userdata);

            echo 1;

        }else{

            echo "Username or Password incorrect";

            exit;

        }
    }

    public function logout(){

        $this->session->unset_userdata('userdata');

		$this->session->sess_destroy();

		redirect( base_url() ,'refresh');

    }
}
