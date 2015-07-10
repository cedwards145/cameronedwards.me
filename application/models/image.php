<?php

class Image extends DataMapper {

    var $validation
      = array('path'      => array('label' => 'Image Path',
                                   'rules' => array('required')),
              'thumbPath' => array('label' => 'Thumbnail Path'));

    // Optionally, don't include a constructor if you don't need one.
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}

?>
