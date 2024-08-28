$(document).ready(function () {

  showdata();
  addnewtask();
  updatestatusdata();
  updatetrashdata();

  $('.taskdata_submit').on("click",function(){
    var fromdate =$('.fromdate').val();
    var todate =$('.todate').val();
    var taskstatus =$('.task-status').val();

    showdata(fromdate,todate,taskstatus);
    updatetrashdata();
    updatestatusdata();

  });



  function addnewtask(){

    $('.add-task').on('click',function(){

      var taskdata=$('.new-task').val();
      var username=$('.username').val();
      var empid=$('.empid').val();
      var role=$('.role').val();


      $.ajax({
        type:'post',
        url:'todo/todosql.php?action=newtaskdata',
        data:{
          taskdata:taskdata,
          username:username,
          empid:empid,
          role:role,
        },
        success: function(response) {
          // Parse the response to a JSON object if it's not already
          try {
              var jsonResponse = typeof response === "string" ? JSON.parse(response) : response;
              console.log(jsonResponse);
              var status = jsonResponse.status;
              console.log(status);
      
              if (status === 'success') {
                  Swal.fire({
                      icon: "success",
                      title: "New Task Added",
                      showConfirmButton: true
                  }).then((result) => {
                      if (result.isConfirmed) {
                          window.location.reload(); // Correct method to reload the page
                      }
                  });
              } else {
                  Swal.fire({
                      icon: "error",
                      title: "Error in data",
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


      });



    });


  }

  function showdata(fromdate, todate, taskstatus) {
    $.ajax({
        url: 'todo/todosql.php?action=fetchTasks', // Replace with your actual URL
        type: 'POST',
        data: {
            fromdate: fromdate,
            todate: todate,
            taskstatus: taskstatus
        },
        success: function(response) {
            try {
                var jsonResponse = typeof response === "string" ? JSON.parse(response) : response;

                console.log(jsonResponse.status);

                if (jsonResponse.status === 'success') {
                    var tasks = jsonResponse.data.tasks; // Adjusted to access the tasks data
                    var statusCounts = jsonResponse.data.counts; // Adjusted to access the status counts
                    var totalCount = jsonResponse.data.totalCount; // Adjusted to access the total count

                    console.log(tasks);
                    console.log(statusCounts);
                    console.log(totalCount);

                    var taskList = $('#todo-list'); // Assuming your task list has an ID "todo-list"
                    taskList.empty(); // Clear existing tasks

                    // Update status counts on the UI
                    $('.pending-count').text(statusCounts.Pending || 0);
                    $('.in-process-count').text(statusCounts['In Process'] || 0);
                    $('.completed-count').text(statusCounts.Completed || 0);
                    $('.trash-count').text(statusCounts.Trash || 0);
                    $('.total-count').text(totalCount);
                    tasks.forEach(function(task) {
                        var badgeColor = '';
                        if (task.status === 'Pending') {
                            badgeColor = 'badge-danger'; // Red color for Pending
                        } else if (task.status === 'In Process') {
                            badgeColor = 'badge-info'; // Info color for In Process
                        } else if (task.status === 'Completed') {
                          // $('.task-status-dropdown').hide();
                          // $('.update-status-btn').hide();
                            badgeColor = 'badge-primary'; // Primary color for Completed

                        }

                        var taskHtml = `
                            <li class="task">
                                <div class="task-container">
                                  <h4 class="task-label">${task.description}</h4>
                                  <div class="d-flex align-items-center gap-3">
                                    <span class="badge ${badgeColor}">${task.status}</span>
                                    <h5 class="assign-name m-0">${task.date}</h5>
                                    <select class="form-control task-status-dropdown" data-id="${task.id}">
                                        <option value="Pending" ${task.status === 'Pending' ? 'selected' : ''}>Pending</option>
                                        <option value="In Process" ${task.status === 'In Process' ? 'selected' : ''}>In Process</option>
                                        <option value="Completed" ${task.status === 'Completed' ? 'selected' : ''}>Completed</option>
                                    </select>
                                    <button class="btn btn-sm btn-primary update-status-btn" data-id="${task.id}">Update</button>
                                    <span class="task-action-btn">
                                      <span class="action-box large delete-btn" title="Delete Task" data-id="${task.id}">
                                        <i data-feather="trash-2"></i>
                                      </span>
                                    </span>
                                  </div>
                                </div>
                            </li>`;

                        taskList.append(taskHtml);
                    });

                    feather.replace(); // To update feather icons if using feather icons
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error in fetching data",
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
        error: function(xhr, status, error) {
            Swal.fire({
                icon: "error",
                title: "Request failed",
                text: error,
                showConfirmButton: true
            });
        }
    });
}



function updatestatusdata(){

  $(document).on('click', '.update-status-btn', function() {
    var taskId = $(this).data('id');
    var newStatus = $(this).siblings('.task-status-dropdown').val();

    $.ajax({
        url: 'todo/todosql.php?action=updatetaskstatusdata',
        type: 'POST',
        data: {
            taskId: taskId,
            newStatus: newStatus
        },
        success: function(response) {
            try {
                var jsonResponse = typeof response === "string" ? JSON.parse(response) : response;

                if (jsonResponse.status === 'success') {
                    Swal.fire({
                        icon: "success",
                        title: "Task status updated",
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error updating status",
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


function updatetrashdata(){

  $(document).on('click', '.delete-btn', function() {
    var taskId = $(this).data('id');
    var newStatus = 'Trash';

    $.ajax({
        url: 'todo/todosql.php?action=updatetrashstatusdata',
        type: 'POST',
        data: {
            taskId: taskId,
            newStatus: newStatus
        },
        success: function(response) {
            try {
                var jsonResponse = typeof response === "string" ? JSON.parse(response) : response;

                if (jsonResponse.status === 'success') {
                    Swal.fire({
                        icon: "success",
                        title: "Task Moved To Trash",
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error Moved To Trash",
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
