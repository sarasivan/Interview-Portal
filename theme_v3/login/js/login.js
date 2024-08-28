$("#submit").click(function() {
  var isValid = true;
  var employee_id = $("#employee_id").val();
  var password = $("#password").val();

  if (employee_id === "") {
      $("#employeeid-error").text("Enter employee id.").show();
      isValid = false;
  } else {
      $("#employeeid-error").hide();
  }

  if (password === "") {
      $("#password-error").text("Enter password.").show();
      isValid = false;
  } else {
      $("#password-error").hide();
  }

  if (isValid) {
      validation_login(employee_id, password);
  } else {
      Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Please fill the required fields'
      });
  }
});

function validation_login(employee_id, password) {
    $.ajax({
        type: "POST",
        url: 'login/login_sql.php?action=Get_login_value',
        data: {
            employee_id: employee_id,
            password: password
        },
        success: function(response) {
            response = JSON.parse(response);
            console.log(response);
            if (response.status === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: 'Incorrect Employee Id or Password!'
                });
            } else if (response.status === 'error') {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: response.message
                });
            } else if (response.status === 'success') {
                window.location.replace("interview_tracker.php");
            }
        }
    });
}

