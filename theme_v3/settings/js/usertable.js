$(document).ready(function () {
  showuserdata();
  updateuserdata();
  createnewdata();

  function showuserdata() {
    $.ajax({
      type: "get",
      url: "settings/usertablesql.php?action=showuserdata",
      datatype: "json",
      success: function (response) {
        var data = JSON.parse(response);
  
        var table = $(".user_details_table");
        $("#multilevel-btn-four").DataTable().destroy();
        table.empty();
        var serialnumber = 1;
        $.each(data, function (index, value) {
          table.append(
            `<tr>
              <td>` +
                serialnumber +
                `</td>
              <td>` +
                value.id +
                `</td>
              <td>` + value.employee_id
                 +
                `</td>
              <td>` +
                value.username +
                `</td>
              <td>` +
                value.email +
                `</td>
              <td>` +
                value.password +
                `</td>
              <td>` +
                value.role +
                `</td>
              <td>` +
                value.division +
                `</td>
              <td>` +
                value.status +
                `</td>
              <td>
                <button class="btn btn-info edituserbutton" data-value='${JSON.stringify(value)}' data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="color:white;width:100px;border-radius:5px">Edit</button>
              </td>
            </tr>`
          );
          serialnumber++;
        });
  
        // Attach click event to edit buttons
        $('.edituserbutton').on('click', function () {
          var value = $(this).data('value');
          console.log(value);
          var row_id=$('.rowid').val(value.id);
          var employee_id= $('.employeeid').val(value.employee_id);
          var employeename= $('.employeename').val(value.username);
          var employeeemail= $('.employeeemail').val(value.email);
          var employeepassowrd= $('.employeepassowrd').val( value.password);
          var employeerole= $('.employeerole').val(value.role);
          var employeedivsion= $('.employeedivsion').val(value.division);
          var employeestatus= $('.employeestatus').val(value.status);

        });


      },
      error: function (xhr, response) {
        console.error("Error fetching user data:", response);
      },
    });
  }

  function updateuserdata(){

    $('.updatebutton').on('click',function(){
      // alert();       
      var row_id=$('#rowid').val();
      var employee_id= $('#employeeid').val();
      var employeename= $('#employeename').val();
      var employeeemail= $('#employeeemail').val();
      var employeepassowrd= $('#employeepassowrd').val();
      var employeerole= $('#employeerole').val();
      var employeedivsion= $('#employeedivsion').val();
      var employeestatus= $('#employeestatus').val();

      if(!employeename){

        toastr.error('The employee name is empty');
        return
      }
      if(!employeeemail){

        toastr.error('The employee email is empty');
        return
      }
      if(!employeepassowrd){

        toastr.error('The employee passowrd is empty');
        return
      }
      if(!employeerole){

        toastr.error('The employee role is empty');
        return
      }
      if(!employeedivsion){

        toastr.error('The employee division is empty');
        return
      }

      if(!employeestatus){

        toastr.error('The employee status is empty');
        return
      }


      $.ajax({
        type:'post',
        url:'settings/usertablesql.php?action=updateuserdata',
        data:{
          row_id:row_id,
          employee_id:employee_id,
          employeename:employeename,
          employeeemail:employeeemail,
          employeepassowrd:employeepassowrd,
          employeerole:employeerole,
          employeedivsion:employeedivsion,
          employeestatus:employeestatus
        },
        success:function(response){
          try {
            // Parse JSON response if it's a string
            var jsonResponse = typeof response === "string" ? JSON.parse(response) : response;
            
            console.log(jsonResponse);
    
            // Check the status from the parsed response
            if (jsonResponse.status === 'success') {
                Swal.fire({
                    icon: "success",
                    title: "Data Updated Successfully",
                    showConfirmButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload(); 
                    }
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error in updating Data",
                    showConfirmButton: true
                });
            }
        } catch (e) {
            console.error("Parsing error:", e);
            Swal.fire({
                icon: "error",
                title: "Response parsing failed",
                text: "An error occurred while parsing the server response.",
                showConfirmButton: true
            });
        }


        },
        error:function(xhr,response){


        }



      })

    })
  }

  function createnewdata() {
    $('#createnewbutton').on('click', function() {
      var newemployeeid = $('#newemployeeid').val();
      var newemployeename = $('#newemployeename').val();
      var newemployeeemail = $('#newemployeeemail').val();
      var newemployeepassowrd = $('#newemployeepassowrd').val();
      var newemployeerole = $('#newemployeerole').val();
      var newemployeedivsion = $('#newemployeedivsion').val();
      var newemployeestatus = $('#newemployeestatus').val();
  
      if (!newemployeeid) {
        toastr.error('The employee ID is empty');
        return;
      }
      if (!newemployeename) {
        toastr.error('The employee name is empty');
        return;
      }
      if (!newemployeeemail) {
        toastr.error('The employee email is empty');
        return;
      }
      if (!newemployeepassowrd) {
        toastr.error('The employee password is empty');
        return;
      }
      if (!newemployeerole) {
        toastr.error('The employee role is empty');
        return;
      }
      if (!newemployeedivsion) {
        toastr.error('The employee division is empty');
        return;
      }
      if (!newemployeestatus) {
        toastr.error('The employee status is empty');
        return;
      }
  
      $.ajax({
        type: "POST",
        url: "settings/usertablesql.php?action=createnewuser",
        data: {
          employee_id: newemployeeid,
          username: newemployeename,
          email: newemployeeemail,
          password: newemployeepassowrd,
          role: newemployeerole,
          division: newemployeedivsion,
          status: newemployeestatus
        },
        success: function(response) {
          var data = JSON.parse(response);
          if (data.status === 'success') {
            Swal.fire({
              icon: "success",
              title: data.message,
              showConfirmButton: true
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.reload();
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Error in creating user",
              text: data.message,
              showConfirmButton: true
            });
          }
        },
        error: function(xhr, status, error) {
          Swal.fire({
            icon: "error",
            title: "Request failed",
            text: error,
            showConfirmButton: true
          });
        }
      });
    });
  }
});
