<?php

class Project extends DataMapper {

    var $validation
      = array('name'        => array('label' => 'Name',
                                     'rules' => array('required')),
              'headerImage' => array('label' => 'Header Image',
                                     'rules' => array('required')),
              'section'     => array('label' => 'Section',
                                     'rules' => array('required')),
              'tag'         => array('label' => 'Tag',
                                     'rules' => array('required')),
              'content'     => array('label' => 'Content',
                                     'rules' => array('required')),
              'color'       => array('label' => 'Color'));

    // Optionally, don't include a constructor if you don't need one.
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

    function toArray($editing = false)
    {
      $screenshots = $this->getScreenshots();
      $videos = $this->getVideos();

      $this->load->library('parsedown');
      $Parsedown = new Parsedown();

      return array('id'          => $this->id,
                   'name'        => $this->name,
                   'headerImage' => $this->headerImage,
                   'section'     => $this->section,
                   'tag'         => $this->tag,
                   'content'     => ($editing ? $this->content : $Parsedown->text($this->content)),
                   'color'       => $this->color,
                   'hasScreenshots' => (count($screenshots) > 0),
                   'screenshots' => $screenshots,
                   'hasVideos'   => (count($videos) > 0),
                   'videos'      => $videos,
                   'downloads'   => array());
    }

    function getScreenshots()
    {
      $allShots = new Screenshot();
      $allShots->where('tag', $this->tag)->get();

      $shots = array();
      foreach ($allShots as $shot)
      {
        array_push($shots, $shot->toArray());
      }

      return $shots;
    }

    function getVideos()
    {
      $allVideos = new Video();
      $allVideos->where('tag', $this->tag)->get();

      $videos = array();
      foreach ($allVideos as $video)
      {
        array_push($videos, $video->toArray());
      }

      return $videos;
    }
}

?>
