<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if ($this->session->userdata('loggedIn'))
		{
			redirect('/admin/panel');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function panel()
	{
		if ($this->session->userdata('loggedIn'))
		{
			$allProjects = new Project();
			$allProjects->get();
			$projects = array();
			foreach ($allProjects as $project)
			{
				array_push($projects, $project->toArray());
			}

			$allScreenshots = new Screenshot();
			$allScreenshots->order_by('tag')->get();
			$screenshots = array();
			foreach ($allScreenshots as $screenshot)
			{
				array_push($screenshots, $screenshot->toArray());
			}

			$this->parser->parse('admin-panel',
		                       array('projects'    => $projects,
												         'screenshots' => $screenshots,
															   'downloads'   => array()));
	  }
		else {
			redirect('/admin');
		}
	}

  //========== PROJECT FUNCTIONS =====================
	public function project($tag)
	{
		if ($this->session->userdata('loggedIn'))
		{
			$project = new Project();
			$project->where('tag', $tag)->get();

			$this->parser->parse('edit-project', $project->toArray());
		}
		else
		{
			redirect('/admin');
		}
	}

	public function submitProject()
	{
		if ($this->session->userdata('loggedIn'))
		{
			$project = new Project($this->input->post('id'));

			$project->name    = $this->input->post('name');
			$project->section = $this->input->post('section');
			$project->tag     = $this->input->post('tag');
			$project->color   = $this->input->post('color');
			$project->content = $this->input->post('content');

			print_r($project->toArray());
			$project->save();
		}
		else
		{
			redirect('#admin');
		}
	}

	//========== SCREENSHOT FUNCTIONS =====================
	public function screenshot($id)
	{
		if ($this->session->userdata('loggedIn'))
		{
			$screenshot = new Screenshot($id);

			$this->parser->parse('edit-screenshot', $screenshot->toArray());
		}
		else
		{
			redirect('/admin');
		}
	}

	public function submitScreenshot()
	{
		$screenshot = new Screenshot($this->input->post('id'));
		$screenshot->tag = $this->input->post('tag');

		$screenshot->save();
	}

	public function uploadScreenshot()
	{
		echo 'Start ';
		if (!empty($_FILES))
    {
			$screenshot = new Screenshot();

			$data = $this->do_upload();
			if ($data['success'])
			{
				echo 'Uploaded ';
				$screenshot->path = $data['filename'];

				echo 'Saved to: ' . $data['filename'] . ' ';

				$this->create_thumb($data['filename']);

				echo 'created thumb ';
				$screenshot->thumb = $data['name'] . '_thumb' . $data['type'];

				$screenshot->save();

				echo 'success';
			}
			else
			{
				echo $data['error'];
			}
	  }
		else
		{
			echo 'No file found';
		}
	}

	function do_upload()
   {
     $config['upload_path'] = './assets/img/';
     $config['allowed_types'] = 'gif|jpg|jpeg|bmp|png';
     $config['max_size']	= '0';
     $config['max_width']  = '0';
     $config['max_height']  = '0';

     $this->load->library('upload', $config);

		 $returnData = array();

     if (!$this->upload->do_upload())
     {
			 $returnData['success'] = false;
			 $returnData['error'] = $this->upload->displayErrors();
     }
     else
     {
       $data = $this->upload->data();
			 $returnData['success'] = true;
			 $returnData['filename'] = $data['file_name'];
			 $returnData['name'] = $data['raw_name'];
			 $returnData['type'] = $data['file_ext'];
     }

		 return $returnData;
   }

	 function create_thumb($filename)
	 {
		 $config['source_image'] = './assets/img/' . $filename;
     $config['create_thumb'] = true;
		 $config['maintain_ratio'] = true;
		 $config['width'] = 200;
		 $config['height'] = 200;

		 $this->load->library('image_lib', $config);

		 $this->image_lib->resize();
	 }

	 public function deleteScreenshot($id)
	 {
		 if ($this->session->userdata('loggedIn'))
     {
			 $screenshot = new Screenshot($id);
       unlink('./assets/img/' . $screenshot->path);
       unlink('./assets/img/' . $screenshot->thumb);
       $screenshot->delete();
		 }
		 else
		 {
		 }
		 redirect('/admin');	
	 }

	//========== LOGIN FUNCTIONS =====================
	public function submit()
	{
		$email = $this->input->post('username');
    $password = $this->input->post('password');

    $u = new User();
    $u->email = $email;
    $u->password = $password;

    $success = $u->login();

		if ($success)
		{
			$this->session->set_userdata(array('loggedIn' => true));
			echo "success";
		}
		else
		{
			echo "fail";
		}
	}

	public function logout()
	{
		$this->session->set_userdata(array('loggedIn' => false));
		redirect('/admin');
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
