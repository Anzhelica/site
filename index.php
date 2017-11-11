<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>Add User</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<form onsubmit="return checkForm(this);" action="add_user.php" method="post"
      enctype="multipart/form-data">
  <table class="table">
    <tr class="reg">
      <td colspan="2"><h2>Add User</h2></td>
    </tr>
    <tr>
      <td class="input-r"><label for="surname">Name:</label></td>
      <td class="input-l">
        <input id="name" name="name" placeholder="Your surname" type="text" autofocus/>
        <span id="err_name" hidden="true">
				   <img id="exmark_name" src="images/exmark.png" alt="exclamation mark" width="16" height="16"/>
				   <span id="errbox_name" class="err">Enter Name.</span>
			    </span>
      </td>
    </tr>
    <tr>
    <tr>
      <td class="input-r"><label for="surname">Surname:</label></td>
      <td class="input-l">
        <input id="surname" name="surname" placeholder="Your surname" type="text"/>
        <span id="err_surname" hidden="true">
				   <img id="exmark_surname" src="images/exmark.png" alt="exclamation mark" width="16" height="16"/>
				   <span id="errbox_surname" class="err">Enter Surname.</span>
			    </span>
      </td>
    </tr>
    <tr>
      <td class="input-r"><label for="surname">Email:</label></td>
      <td class="input-l">
        <input id="email" name="email" placeholder="Your email" type="email"/>
        <span id="err_email" hidden="true">
				   <img id="exmark_email" src="images/exmark.png" alt="exclamation mark" width="16" height="16"/>
				   <span id="errbox_email" class="err">This field	is required. Please enter a valid Email.</span>
			    </span>
      </td>

    </tr>
    <tr>
      <td class="input-r"><label for="comment">Comment:</label></td>
      <td class="input-l">
        <textarea name="comment" id="comment" class="comment"></textarea>
      </td>
    </tr>
    <tr>
      <td class="input-r"><label for="avatar">Avatar:</label></td>
      <td class="input-l">
        <input type="file" id="avatar" name="avatar" placeholder="avatar"/>
        <span id="err_avatar" hidden="true">
					<img src="images/exmark.png" alt="exclamation mark" width="16" height="16">
					<label class="err" id="err_file" for="file">Avatar cannot be Empty</label>
				  </span>
        <span id="err_avatar_confirmation" hidden="true">
					<img src="images/exmark.png" alt="exclamation mark" width="16" height="16">
					<label class="err" id="err_file_confirmation" for="file">Avatar cannot be more than 10MB</label>
				  </span>
      </td>
    </tr>
    <tr class="reg">
      <td></td>
      <td class="input-l" colspan="2">
        <input name="send_form" type="submit" id="submit" value="Create"/>
      </td>
    </tr>
  </table>
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"
        type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
</body>


</html>