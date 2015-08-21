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

    function toArray()
    {
      $screenshots = $this->getScreenshots();

      return array('id'          => $this->id,
                   'name'        => $this->name,
                   'headerImage' => $this->headerImage,
                   'section'     => $this->section,
                   'tag'         => $this->tag,
                   'content'     => $this->content,
                   'color'       => $this->color,
                   'hasScreenshots' => (count($screenshots) > 0),
                   'screenshots' => $screenshots,
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
}

?>
