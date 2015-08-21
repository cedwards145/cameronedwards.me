<?php

class Screenshot extends DataMapper {

    var $validation
      = array('path'  => array('label' => 'Path',
                               'rules' => array('required')),
              'thumb' => array('label' => 'Thumbnail',
                               'rules' => array('required')),
              'tag'   => array('label' => 'Tag'));

    // Optionally, don't include a constructor if you don't need one.
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

    function toArray()
    {
      return array('id'    => $this->id,
                   'path'  => $this->path,
                   'thumb' => $this->thumb,
                   'tag'   => $this->tag);
    }
}

?>
