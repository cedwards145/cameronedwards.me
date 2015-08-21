<?php

class User extends DataMapper {

    var $validation
      = array('email'    => array('label' => 'Email',
                                  'rules' => array('required', 'trim')),
              'password' => array('label' => 'Password',
                                  'rules' => array('required', 'trim', 'encrypt')),
              'salt'     => array('label' => 'Salt'));

    // Optionally, don't include a constructor if you don't need one.
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }

    function login()
    {
      // The instance of User that this method is called from will have it's email
      // and password fields from a form. Password will be unencrypted.
      // To validate, the user's hash must be found from the database
      $u = new User();
      $u->where('email', $this->email)->get();
      $this->salt = $u->salt;

      // Now encrypt the supplied password with the correct salt
      $this->validate()->get();

      // Check if the login was successful
      return $this->exists();
    }

    function register()
    {
      $this->validate();
      $this->save();
    }

    // Encrypts fields with a salt
    function _encrypt($field)
    {
      if (!empty($this->{$field}))
      {
        // If the user doesn't already have a salt, assign it a random one
        if (empty($this->salt))
        {
          $this->salt = md5(uniqid(rand(), true));
        }

        $this->{$field} = sha1($this->salt . $this->{$field});
      }
    }
}

?>
