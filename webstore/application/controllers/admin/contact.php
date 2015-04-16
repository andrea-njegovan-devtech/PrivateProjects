<?php
class Contact extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		
		//Access Control
		if (!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}
    }
	
	public function index() {
		//Get Contact
		$data['contact'] = $this->Settings_model->get_contact_data('id', 'ASC', 10);
		
		//Load View
		$data['main_content'] = 'admin/contact/index';
		$this->load->view('admin/layouts/main', $data);
	}
	
	//Edit Contact
	public function edit($id){
			//Upload Image
			$config = array(
				'upload_path' => 'assets/images',
				'allowed_types' => 'gif|jpg|jpeg|png'
			);
			$this->load->library('upload', $config);
			$this->upload->do_upload('userfile');
		
		//Validation Rules
		$this->form_validation->set_rules('value','Value','trim|required|min_length[4]|xss_clean');
		
		$data['contact'] = $this->Settings_model->get_single_contact_data($id);
	
		if($this->form_validation->run() == FALSE){
			//Views
			$data['main_content'] = 'admin/contact/edit';
			$this->load->view('admin/layouts/main', $data);
		} else {
			if ($id == 7) {
				$w = $this->upload->data();
				$data = array(
						'value'         =>  $w['file_name']
				);
			} else {
				//Create contact Data Array
				$data = array(
						'value'         => $this->input->post('value')
				);
			}
				
			//contact Table Insert
			$this->Settings_model->update_contact_data($data, $id);
				
			//Create Message
			$this->session->set_flashdata('contact_saved', 'Your contact details has been saved');
				
			//Redirect to pages
			redirect('admin/contact/index');
	}
}
}