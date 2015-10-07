$(document).ready(function()
{
  $('#login-form').on('submit', function(e)
  {
    e.preventDefault();
    $.ajax(
    {
      type: "POST",
      url: "admin/submit",
      data: $("#login-form").serialize(),
      success: function(data)
      {
        if (data == "success")
        {
          // Reload window to display admin panel
          if (window.location.hash != "#admin")
          {
            window.location.hash = "#admin";
          }
          else
          {
            $(window).hashchange();
          }
        }
        else
        {
          alert("Incorrect Username or Password");
        }
      }
    }); // ajax
  }); // onSubmit
}); // Ready
