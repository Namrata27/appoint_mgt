    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
      <a href='#' onclick='show();'>Show form</a>
      <div id='form_reg' style='display:none;'>
        <form method="POST">
    Name:<input type="text" name='name' id='n'>
    
    last name:<input type="text" name='lname' id='ln'>
  
    <div id='DivReply'></div>
    <input type="submit" onclick='save();'>
  </form>
      </div>
  <script>
  function show()
  {
$("#form_reg").show('bottom');
  }
  
  </script>