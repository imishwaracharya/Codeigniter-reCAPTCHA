<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recaptcha_form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
		$this->load->library('session');
		$this->load->helper('url');
		
		
	}
	public function index()
	{
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
		$this->form_validation->set_rules('g-recaptcha-response', 'I\'m not a robot', 'required|callback_recaptcha_response_check');
		
		if ($this->form_validation->run() === TRUE)
		{
			$success_message = '<div class="form-response-box">';
			$success_message .= '<h2>Thank you for your response. We have recorded following details.</h2>';
			$success_message .= '<strong> Name: </strong>'. $this->input->post('name').'<br>';
			$success_message .= '<strong> E-Mail: </strong>'. $this->input->post('email').'<br>';
			$success_message .= '<strong> reCAPTCHA Response code: </strong>'. $this->input->post('g-recaptcha-response').'<br>';
			$success_message .= '</div>';
			
			$this->session->set_flashdata('message', $success_message);
			redirect('Recaptcha_form', 'refresh');
			
		}
		else
		{
			
			$this->load->view('form');
			
		}
	}
	public function recaptcha_response_check($recaptcha_response)
    {
		if (!empty($recaptcha_response)) {
			$response = $this->recaptcha->verifyResponse($recaptcha_response);
			if (isset($response['success']) and $response['success'] === true) 
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('recaptcha_check', '{field} must be veryfied.');
				return FALSE;
			}
		}
    }
}
