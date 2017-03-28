<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	
	public function __construct() {
		
		parent::__construct();
		//load DB
		$this->load->database();

		//load helpers and libraries
		$this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        //load model
        $this->load->model('signup_model');

        //config for form validaiton
        $config = array(
	        array(
                'field' => 'name',
                'label' => 'Full name',
                'rules' => 'required'
	        ),
	        array(
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required|unique[users.email]',
                'errors' => array(
                        'required' => 'You must provide a %s.',
                ),
	        ),
	        array(
                'field' => 'birth',
                'label' => 'Birth Date',
                'rules' => 'trim|required|valid_date[Y-m-d]'
	        )
		);
		//set the above configuration rules
		$this->form_validation->set_rules($config);
	}

	public function index()	{

        if ($this->form_validation->run() == FALSE){
            //$this->load->view('success');
            $this->load->view('signup');
        } else {
            
            //get form inputs and send them to add_user model function
            $data = array(
            	'name'  => $this->input->post('name'),
            	'email' => $this->input->post('email'),
            	'phone' => $this->input->post('phone'),
            	'birth' => $this->input->post('birth')
            );
            if($this->signup_model->add_user($data)) {
            	//display succes page
            	$this->load->view('success', array('name' => $this->input->post('name')));
            }
        }
	}

	/**
	* Function which checks if the input email already exists into DB
	* Return status code - this is how jquery bootstrap server side validation works
	* @return Header 
	*/
	public function check_unique_email () {

		//input email
		$email = $this->input->get('email');
		$same_emails_count = $this->signup_model->check_email($email);

		if( $same_emails_count == 0){
			header("HTTP/1.0 200");
		} else {
			header("HTTP/1.0 400 The email address already exists.");
		}
	}
}
