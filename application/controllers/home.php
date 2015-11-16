<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$allScreenshots = new Screenshot();
		$allScreenshots->limit(12)->get();

		$screenshots = array();
		foreach ($allScreenshots as $shot)
		{
			array_push($screenshots, $shot->toArray());
		}

		shuffle($screenshots);

		$this->parser->parse('home', array('images' => $screenshots));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
