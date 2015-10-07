<?php

class Post extends DataMapper
{
  var $validation
    = array('title'     => array('label' => 'Title'),
            'content'   => array('label' => 'Content'),
            'date'      => array('label' => 'Date'));

  // Optionally, don't include a constructor if you don't need one.
  function __construct($id = NULL)
  {
      parent::__construct($id);
  }

  function toArray($editing = false)
  {
    $this->load->library('parsedown');
    $parsedown = new Parsedown();

    return array('id'      => $this->id,
                 'title'   => $this->title,
                 'snippet' => $this->truncate($this->content),
                 'content' => ($editing ? $this->content : $parsedown->text($this->content)),
                 'date'    => $this->dateFormat($this->date));
  }

  function dateFormat($date)
  {
    return date("l, F j, Y", strtotime($date));
  }

  function truncate($text, $chars = 200)
  {
    if (strlen($text) > $chars)
    {
      $text = $text." ";
      $text = substr($text,0,$chars);
      $text = substr($text,0,strrpos($text,' '));
      $text = $text."...";
      return $text;
    }

    return $text;
  }
}

?>
