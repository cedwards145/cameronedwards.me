<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index($startIndex = 0)
	{
		$allPosts = new Post();
		$numPosts = $allPosts->count();

		$perPage = 12;

		$allPosts->order_by('id', 'desc')->
		           limit($perPage, $startIndex)->
							 get();

		$posts = array();

		$this->load->library('pagination');
		$config['base_url'] = base_url() . '#blog/';
		$config['total_rows'] = $numPosts;
		$config['per_page'] = $perPage;
		$config['num_links'] = 5;
		$config["cur_page"] = $startIndex;

		$this->pagination->initialize($config);

		foreach ($allPosts as $post)
		{
			array_push($posts, $post->toArray());
		}

		$this->parser->parse('blog-home',
	                       array('posts' => $posts,
											         'pagination' => $this->pagination->create_links()));
	}

	public function post($id)
	{
		$post = new Post($id);

		$this->parser->parse('blog-post', $post->toArray());
	}

	public function edit($id = 0)
	{
		if (!$this->session->userdata('loggedIn'))
		{
			redirect('/admin');
		}

		$data;
		if ($id == 0)
		{
			$data = array('id' => 0,
		                'title' => '',
									  'content' => '');
		}
		else
		{
			$post = new Post($id);
			$data = $post->toArray(true);
		}

		$this->parser->parse('edit-post', $data);
	}

	public function submitPost($id)
	{
		if (!$this->session->userdata('loggedIn'))
		{
			redirect('/admin');
		}

		$post;
		if ($id == 0)
		{
			$post = new Post();
		}
		else
		{
			$post = new Post($id);
		}

		$post->title   = $this->input->post('title');
		$post->content = $this->input->post('content');

		$post->save();

		echo $post->id;
	}

	public function delete($id)
	{
		if (!$this->session->userdata('loggedIn'))
		{
			redirect('/admin');
		}

		$post = new Post($id);
		$post->delete();

		redirect('/blog/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
