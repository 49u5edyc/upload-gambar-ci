<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->model('m_home');
        $this->load->library(array('upload'/*'template','session',*/));
	}

	function index()
	{
		$this->load->view('home'); //menampilkan halaman upload
	}
	
	public function do_upload()
	{
		

		$config['upload_path'] = "./asset/image/"; //lokasi folder yang akan digunakan untuk menyimpan file
		$config['allowed_types'] = 'gif|jpg|png|JPEG'; //extension yang diperbolehkan untuk diupload
		$config['file_name'] = url_title($this->input->post('file_upload'));
		
		$this->upload->initialize($config); //meng set config yang sudah di atur

		if( !$this->upload->do_upload('file_upload'))
			{
				echo $this->upload->display_errors();
			}
		
		else
			{ 
				

				$data = array(
				'name'=>$this->upload->file_name
				);
				$this->m_home->insert($data,'table');
				
				redirect('home/view');
			}
	 
	}

	public function view()
	{
		$data['images'] = $this->m_home->show('table');
		$this->load->view('home',$data);

				
				
	}


}
/* End of file home.php */
/* Location: ./application/controllers/home.php */