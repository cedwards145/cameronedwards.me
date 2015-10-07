$(document).ready(function()
{
  $('#blog-form').on('submit', function(e)
  {
    e.preventDefault();

    var id = $('#idField').val();
    $.ajax(
    {
      type: "POST",
      url: "blog/submitPost/" + id,
      data: $("#blog-form").serialize(),
      success: function(data)
      {
        window.location.hash = "#blog/post/" + data;
      }
    }); // ajax
  }); // onSubmit
}); // Ready
