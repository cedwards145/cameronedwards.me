<?php

class Video extends DataMapper {

    var $validation
      = array('embedCode'  => array('label' => 'URL',
                               'rules' => array('required')),
              'tag'   => array('label' => 'Tag'));

    // Optionally, don't include a constructor if you don't need one.
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

    function toArray()
    {
      return array('id'        => $this->id,
                   'embedCode' => $this->embedCode,
                   'tag'       => $this->tag);
    }
}

?>
