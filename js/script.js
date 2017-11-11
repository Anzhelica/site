var checkFormResult = false;
var checkName = false;
var checkSurname = false;
var regex = /^[a-zA-Zа-яА-ЯёЁіІ'][a-zA-Z-а-яА-ЯёЁіІ' ]+[a-zA-Zа-яА-ЯёЁіІ']?$/;

function checkForm(form) {

  var result = true;
  checkFormResult = checkName && checkSurname;
  var err = document.getElementById('err_name');
  if (document.getElementById('name').value == "") {
    err.hidden = false;
    result = false;
  } else {
    err.hidden = true;

  }
  err = document.getElementById('err_surname');
  if (document.getElementById('surname').value.trim() == "") {
    err.hidden = false;
    result = false;
  } else {
    err.hidden = true;

  }

  err = document.getElementById('err_email');
  var email = document.getElementById('email');
  if (email.value == "") {
    err.hidden = false;
    result = false;
  } else {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    result = re.test(email.value);
    if (result) {
      err.hidden = true;
    } else {
      err.hidden = false;
    }
  }


  err = document.getElementById('err_avatar');
  if (document.getElementById('avatar').value == '') {
    err.hidden = false;
    result = false;
  } else {
    err.hidden = true;
    var err2 = document.getElementById('err_avatar_confirmation');
    if (document.getElementById('avatar').files[0].size > 10485760) {
      err2.hidden = false;
      result = false;
    } else {
      err2.hidden = true;
    }
  }

  return result && checkFormResult;
};

$(document).ready(function () {
  $("#name").blur(function () {
    $("#errbox_name").removeClass().addClass('messagebox').text('Check...').fadeIn("slow");
    $("#exmark_name").hide();
    if ($(this).val().indexOf(' ') >= 0) {
      $("#err_name").show();
      $("#errbox_name").fadeTo(200, 0.1, function () {
        $("#exmark_name").show();
        $(this).html('Name can\'t сontain spaces.').addClass('err').fadeTo(900, 1);
        checkName = false;
      });
    }
    else if ($(this).val().trim().length <= 0) {
      $("#err_name").show();
      $("#errbox_name").fadeTo(200, 0.1, function () {
        $("#exmark_name").show();
        $(this).html('Name can\'t be empty.').addClass('err').fadeTo(900, 1);
        checkName = false;
      });
    }
    else if ($(this).val().trim().length > 40) {
      $("#err_name").show();
      $("#errbox_name").fadeTo(200, 0.1, function () {
        $("#exmark_name").show();
        $(this).html('Name is too big').addClass('err').fadeTo(900, 1);
        checkName = false;
      });
    }
    else if (!regex.test($(this).val().trim())) {
      $("#err_name").show();
      $("#errbox_name").fadeTo(200, 0.1, function () {
        $("#exmark_name").show();
        $(this).html('Enter valid name').addClass('err').fadeTo(900, 1);
        checkName = false;
      });
    }
    else {
      $("#err_name").hide();
      checkName = true;
    }
  });
  $("#surname").blur(function () {
    $("#errbox_surname").removeClass().addClass('messagebox').text('Check...').fadeIn("slow");
    $("#exmark_surname").hide();
    if ($(this).val().indexOf(' ') >= 0) {
      $("#err_surname").show();
      $("#errbox_surname").fadeTo(200, 0.1, function () {
        $("#exmark_surname").show();
        $(this).html('Surname can\'t сontain spaces.').addClass('err').fadeTo(900, 1);
        checkSurname = false;
      });
    }
    else if ($(this).val().trim().length <= 0) {
      $("#err_surname").show();
      $("#errbox_surname").fadeTo(200, 0.1, function () {
        $("#exmark_surname").show();
        $(this).html('Surname can\'t be empty').addClass('err').fadeTo(900, 1);
        checkSurname = false;
      });
    }
    else if ($(this).val().trim().length > 40) {
      $("#err_surname").show();
      $("#errbox_surname").fadeTo(200, 0.1, function () {
        $("#exmark_surname").show();
        $(this).html('Surname is too big').addClass('err').fadeTo(900, 1);
        checkSurname = false;
      });
    }
    else if (!regex.test($(this).val().trim())) {
      $("#err_surname").show();
      $("#errbox_surname").fadeTo(200, 0.1, function () {
        $("#exmark_surname").show();
        $(this).html('Enter valid surname').addClass('err').fadeTo(900, 1);
        checkSurname = false;
      });
    }
    else {
      $("#err_surname").hide();
      checkSurname = true;
    }
  });
});