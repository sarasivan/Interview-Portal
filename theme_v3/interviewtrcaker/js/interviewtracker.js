

    evaluationofficelocation();
    canditatescoredata();
    shittypes();
    processrole();
    $('.Updated').hide();

     

    $("body").on("click", "#interview_data_submit", function () {
       
            var start_date = $("#fromdate").val();
            var end_date = $("#todate").val();
            var process_type = $("#processtype").val();
            var reference_mode = $("#referencemode").val();
            var status_type = $("#status").val();
            var office_location = $("#officelocation").val();
            var shifttype = $("#shift").val();
            var processrole = $("#processrole").val();
            var teamsname = $("#teamsname").val();
           console.log(status_type);
         
     
      interviewdatashow(start_date, end_date, process_type, reference_mode, status_type, office_location, shifttype, processrole, teamsname);
 
    });
    showingadvanceoption();
    $('#processtype').on('change', function() {
        var process_type = $(this).val(); // Get the selected process type
        
        // Perform an AJAX call to fetch the corresponding teams based on the process type
        $.ajax({
            url: 'filter/filtersql.php?action=teamnamefilterdata', // Server endpoint
            type: 'POST', // Or 'POST' if needed
            data: { process_type: process_type }, // Send the selected process type to the server
            success: function(response) {
                // Parse the JSON response
                var data = JSON.parse(response);
                
                // Clear the existing options in the teamsname dropdown
                $('#teamsname').empty();
                
                // Check if response contains teams data
                if (data.teams && data.teams.length > 0) {
                    // Populate the teamsname dropdown with the new options
                    $('#teamsname').append('<option value="">Select Team</option>');
                    $.each(data.teams, function(index, team) {
                        $('#teamsname').append('<option value="' +  team.name+ '">' + team.name + '</option>');
                    });
                } else {
                    $('#teamsname').append('<option value="">No teams available</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + status + " - " + error);
                toastr.error("There was an error fetching the teams.");
            }
        });
    });
//    $('#interview_data_submit').trigger('click');

    function showingadvanceoption(){
        $('.advanceoptionbutton').on('click',function(){
          $('.advanceoption').toggleClass('hidden');;
        })
      }

      function interviewdatashow(start_date, end_date, process_type, reference_mode, status_type, office_location, shifttype, processrole, teamsname) {
        $.ajax({
            type: "POST",
            url: "interviewtrcaker/interviewtrackersql.php?action=interviewtrackerdata",
            data: {
                start_date: start_date,
                end_date: end_date,
                process_type: process_type,
                reference_mode: reference_mode,
                status_type: status_type,
                office_location: office_location,
                shifttype: shifttype,
                processrole: processrole,
                teamsname: teamsname,
            },
            success: function(response) {
                // console.log(response); // For debugging
                var data;
                try {
                    data = JSON.parse(response);
                } catch (e) {
                    console.error('Parsing error:', e);
                    toastr.error('Unexpected response format.');
                    return;
                }
    
                var table = $(".interviewtracker_table");
    
                // Clear the existing DataTable if it exists
                if ($.fn.DataTable.isDataTable("#multilevel-btn")) {
                    $("#multilevel-btn").DataTable().clear().destroy();
                    
                }
    
                table.empty();
                var serialnumber = 1;
    
                $.each(data, function(index, value) {
                    var actionButton = '';
                    var statusBadge = '';
                    // Update action button and status badge based on status
                    switch (value.status) {
                        case 'New':
                        actionButton = `<button class='btn btn-secondary' onclick='evaluation(${JSON.stringify(value)})' data-bs-toggle="modal" data-bs-target="#evaludatemodal">Evaluation</button>`;
                        statusBadge = '<span class="badge bg-primary">New</span>';
                        break;
                        case 'Selected':
                        actionButton = `<button class='btn btn-success' onclick='joining(${JSON.stringify(value)})' data-bs-toggle="modal" data-bs-target="#joiningmodal">Joining</button>`;
                        statusBadge = '<span class="badge bg-success">Selected</span>';
                        break;
                        case 'Rejected':
                        statusBadge = '<span class="badge bg-danger">Rejected</span>';
                        break;
                        case 'Hold':
                        actionButton = `<button class='btn btn-secondary' onclick='evaluation(${JSON.stringify(value)})' data-bs-toggle="modal" data-bs-target="#evaludatemodal">Evaluation</button>`;
                        statusBadge = '<span class="badge bg-warning text-dark">Hold</span>';
                        break;
                        case 'On Training':
                        statusBadge = '<span class="badge bg-orange text-white">On Training</span>';
                        break;
                        case 'Not Joined':
                        statusBadge = '<span class="badge bg-danger text-white">Not Joined</span>';
                        break;
                        case 'Pending':
                        actionButton = `<button class='btn btn-success' onclick='joining(${JSON.stringify(value)})' data-bs-toggle="modal" data-bs-target="#joiningmodal">Joining</button>`;
                        statusBadge = '<span class="badge bg-secondary text-white">Pending</span>';
                        break;
                        default:
                        statusBadge = '<span class="badge bg-secondary">Others</span>';
                        break;
                    }
    
                    table.append(
                        `<tr data-status="${value.status}" data-id="${value.id}" data-uic-code="${value.uic_code}">
                            <td>${serialnumber}</td>
                            <td>${value.status === 'On Training' ? `<input type="checkbox" value="yes" data-row-id="${value.id}" data-uic-code="${value.uic_code}">` : ''}</td>
                            <td>${value.uic_code}</td>
                            <td>${value.first_name} ${value.last_name}</td>
                            <td>${value.primary_no}</td>                       
                            <td>${value.reference_type}</td>                           
                            <td>${value.process_type}</td>
                            <td>${value.process_role}</td>
                            <td>${statusBadge}</td>
                            <td>${value.office_location}</td>
                            <td>${value.shift_process}</td>
                            <td>${actionButton}</td>
                            <td>${value.seconday_no}</td>
                             <td>${value.reference_role}</td>
                            <td>${value.register_date}</td>
                            <td>${value.joining_date}</td>
                             <td>${value.training_date}</td>
                            <td>
                            <span class="badge ${value.offer_release === 'Released' ? 'badge-success' : 'badge-warning'}">
                                ${value.offer_release}
                            </span>
                            </td>
                            <td>
                            <span class="badge ${value.document_status === 'Submitted' ? 'badge-success' : value.document_status === 'Pending' ? 'badge-warning' : 'badge-danger'}">
                                ${value.document_status}
                            </span>
                            </td>
                            <td>${value.team}</td>
                            <td>${value.contact_modes}</td>
                        </tr>`
                    );
                   
                   
    
                    serialnumber++;
                });
    
                $(document).ready(function() {
                    $("#multilevel-btn").DataTable({
                        dom: "Bfrtip",
                        buttons: [ "excel", "print"], // Enable export buttons
                        responsive: true, // Enable responsive behavior
                        pageLength: 10,    // Number of rows to display per page
                        columnDefs: [
                            {
                                targets: [13,14,15,16,17,18,19,20], // Columns beyond the first 12
                                visible: true,   // Hide these columns initially
                              
                            }
                        ]
                    });
                });
                
                
                // Handle the change event on the 'checkAll' checkbox
                $(document).on('change', '#checkAll', function() {
                    var isChecked = $(this).is(':checked');
    
                    // Check or uncheck all checkboxes in rows with data-status="On Training"
                    $('tr[data-status="On Training"]').each(function() {
                        $(this).find('input[type="checkbox"]').prop('checked', isChecked);
                    });
    
                    // Validate required select fields when the checkbox is checked
                    if (isChecked) {
                        var missingFields = [];
    
                        if ($('#processtype').val() === "") {
                            missingFields.push('Process Type');
                        }
                        if ($('#processrole').val() === "") {
                            missingFields.push('Process Role');
                        }
                        if ($('#teamsname').val() === "") {
                            missingFields.push('Team');
                        }
    
                        if (missingFields.length > 0) {
                            // Uncheck the #checkAll checkbox since validation failed
                            $(this).prop('checked', false);
    
                            // Uncheck all the checkboxes in "On Training" rows
                            $('tr[data-status="On Training"]').each(function() {
                                $(this).find('input[type="checkbox"]').prop('checked', false);
                            });
    
                            // Show error message with missing fields
                            toastr.error("Please fill in fields: " + missingFields.join(", "));
                        } else {
                            $('.Updated').show();
                        }
                    }
                });
    
                // Handle the click event on the 'Updated' button
                $(document).on('click', '.TeamUpdated', function() {
                    teamsname= $('#teamsname').val();
                    //alert(teamsname);
                    var selectedData = [];
    
                    // Gather data from selected rows
                    $('tr[data-status="On Training"] input[type="checkbox"]:checked').each(function() {
                        var row = $(this).closest('tr');
                        var rowData = {
                            uic_code: row.data('uic-code'),
                            processtype: $('#processtype').val(),
                            processrole: $('#processrole').val(),
                            teamsname: $('#teamsname').val(),
                        };
                        console.log(rowData); // For debugging
                        selectedData.push(rowData);
                    });
    
                    $.ajax({
                        url: 'interviewtrcaker/interviewtrackersql.php?action=checkallteamupdated', // Ensure this is the correct path
                        type: 'POST',
                        contentType: 'application/json', // Set content type to JSON
                        data: JSON.stringify({ data: selectedData }), // Send data as JSON
                        success: function(response) {
                            console.log('Server response:', response); // For debugging
                            
                            // Assuming the response is already an object
                            var resultdata = response;
                    
                            // If for some reason it's still a string, you can check and parse it:
                            if (typeof response === 'string') {
                                try {
                                    resultdata = JSON.parse(response);
                                } catch (e) {
                                    console.error('Parsing error:', e);
                                    toastr.error('Unexpected response format.');
                                    return;
                                }
                            }
                    
                            if (resultdata.status === 'success') {
                                Swal.fire({
                                    icon: "success",
                                    title: resultdata.message,
                                    showConfirmButton: true
                                }).then((result) => {
                                    if (result.isConfirmed) {                                     
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: resultdata.message,
                                    showConfirmButton: true
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("An error occurred: " + status + " - " + error);
                            console.error("Response text:", xhr.responseText); // Log the response text
                            toastr.error("There was an error submitting the data.");
                        }
                    });
                    
                });
    
                // Handle the change event on individual checkboxes
                $(document).on('change', 'tr[data-status="On Training"] input[type="checkbox"]', function() {
                    var rowCheckbox = $(this);
                    var isChecked = rowCheckbox.is(':checked');

                    // Validate required select fields when the checkbox is checked
                    if (isChecked) {
                        var missingFields = [];
    
                        if ($('#processtype').val() === "") {
                            missingFields.push('Process Type');
                        }
                        if ($('#processrole').val() === "") {
                            missingFields.push('Process Role');
                        }
                        if ($('#teamsname').val() === "") {
                            missingFields.push('Team');
                        }
    
                        if (missingFields.length > 0) {
                            // Uncheck the checkbox since validation failed
                            rowCheckbox.prop('checked', false);
    
                            // Show error message with missing fields
                            toastr.error("Please fill in fields: " + missingFields.join(", "));
                        }
                        else {
                            $('.Updated').show();
                        }
                    } 
                });
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + status + " - " + error);
                console.error("Response text:", xhr.responseText); // Log the response text
            }
        });
    }
    
  //shittypes
  function shittypes() {
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=shiftdata',
        dataType: 'json',
        success: function(response) {
            var select = $('#evalution_shift');
            select.empty();
            select.append('<option value="">Select Shift Type </option>');
            $.each(response, function(index, value) {
  
                    select.append('<option value="' + value.options + '">' + value.options + '</option>');
  
              
                
            });
        },
        error: function(xhr, response) {
            console.error("Error fetching data");
        }
    });
  }
  
//processrolefilter
function processrole() {
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=processroledata',
        dataType: 'json',
        success: function(response) {
            var select = $('#processrole');
            select.empty();
            select.append('<option value="">Select Process Role </option>');
            $.each(response, function(index, value) {

                    select.append('<option value="' + value.options + '">' + value.options + '</option>');

              
                
            });
        },
        error: function(xhr, response) {
            console.error("Error fetching data");
        }
    });

    
}
  //referencemodefilter
  function evaluationofficelocation() {
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=officelocationdata',
        dataType: 'json',
        success: function(response) {
            var select = $('#evaluationofficelocation');
            select.empty();
            select.append('<option value="">Select Office Location </option>');
            $.each(response, function(index, value) {
                    select.append('<option value="' + value.options + '">' + value.options + '</option>');
            });
        },
        error: function(xhr, response) {
            console.error("Error fetching data");
        }
    });
  }
  
  //canditatescoredata
  function canditatescoredata() {
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=canditatescoredata',
        dataType: 'json',
        success: function(response) {
            var select = $('#canditate_score');
            select.empty();
            select.append('<option value="">Select Score </option>');
            $.each(response, function(index, value) {
                    select.append('<option value="' + value.options + '">' + value.options + '</option>');                       
            });
        },
        error: function(xhr, response) {
            console.error("Error fetching data");
        }
    });
  }
  
  
  function evaluation(data) {
    var value = typeof data === "string" ? JSON.parse(data) : data;
    $register_joiningdate=value.joining_date;
    $("#row_id").val(value.id);
    $("#uic_code").val(value.uic_code);
    $("#candidate_name").val(value.first_name);
    $("#last_name").val(value.last_name);
    $("#primary_contact_number").val(value.primary_no);
    $("#secondary_contact_number").val(value.seconday_no);
    $("#more_reference_details_1").val(value.reference_role);
    $("#processs").val(value.process_type);
    $("#reference_mode").val(value.reference_type);
    $("#placess").val(value.office_location);
    $("#interview_date").val(value.register_date);
  
    $(".showdata").hide();
  
    $("#result1").on("change", function () {
        var result = $("#result1").val();
       // alert(result);
        if (result === "Selected") {
            $(".hidedata").show();
            $(".showdata").hide();
        } else {
            $(".hidedata").hide();
            $(".showdata").show();
        }
    });
  
  
    $(".saveelevautiondata").on("click", function () {
      var process_type = $("#processs").val();
      var change_process = $("#processtypetwo").val() || process_type;  // Assigns process_type if processtypetwo is empty
      var office_location= $("#placess").val();
      var evaluationofficelocation= $("#evaluationofficelocation").val() || office_location;
      var joining_date=$("#joining_date").val() || $register_joiningdate;
      var data = {
          row_id: $("#row_id").val(),
          uic_code: $("#uic_code").val(),
          candidate_name: $("#candidate_name").val(),
          last_name: $("#last_name").val(),
          primary_contact_number: $("#primary_contact_number").val(),
          secondary_contact_number: $("#secondary_contact_number").val(),
          reference_details: $("#more_reference_details_1").val(),
          process_type: process_type,
          reference_mode: $("#reference_mode").val(),
          office_location: office_location,
          interview_date: $("#interview_date").val(),
          
          result: $("#result1").val(),
          score: $("#canditate_score").val(),
          change_process: change_process,  // Updated to handle empty value
          shift_process: $("#evalution_shift").val(),
          joining_date: joining_date,
          reason: $("#reason").val(),
          processrole: $("#processrole_evelaution").val(),
          evaluationofficelocation: evaluationofficelocation,
      };
      
      // Add any AJAX or form submission logic here
  
        if (data.result === "Selected") {
          if (!data.evaluationofficelocation) {
            toastr.error("Please fill in fields: Location");
            return;
             }
            if (!data.result) {
                toastr.error("Please fill in fields: result");
                return;
            }
  
            if (!data.score) {
                toastr.error("Please fill in Score");
                return;
            }
  
            if (!data.change_process) {
                toastr.error("Please fill in Change Process");
                return;
            }
  
            if (!data.shift_process) {
                toastr.error("Please fill in Shift Process");
                return;
            }
  
            if (!data.joining_date) {
                toastr.error("Please fill in Joining Date");
                return;
            }
  
            if (data.reason) {
              delete data.reason; // Remove the 'reason' field from the 'data' object
              toastr.error("Please fill in fields: Reason"); // Display an error message using Toastr
          }
          
            
        } else {
            delete data.location;
            delete data.score;
            delete data.change_process;
            delete data.shift_process;
            delete data.joining_date;
            if (data.joining_date) {
              delete data.joining_date; // Remove the 'reason' field from the 'data' object
              toastr.error("Please fill in Joining Date"); // Display an error message using Toastr
             }
            if (data.shift_process) {
              delete data.shift_process; // Remove the 'reason' field from the 'data' object
              toastr.error("Please fill in Shift Process"); // Display an error message using Toastr
             }
            if (data.change_process) {
              delete data.change_process; // Remove the 'reason' field from the 'data' object
              toastr.error("Please fill in Change Process"); // Display an error message using Toastr
             }
            if (data.location) {
              delete data.location; // Remove the 'reason' field from the 'data' object
              toastr.error("Please fill in fields: Location"); // Display an error message using Toastr
             }
            if (data.score) {
            delete data.score; // Remove the 'reason' field from the 'data' object
            toastr.error("Please fill in Score"); // Display an error message using Toastr
            }
            if (!data.reason) {
                toastr.error("Please fill in fields: Reason");
                return;
            }
        }
  
        $.ajax({
            type: "post",
            url: "interviewtrcaker/interviewtrackersql.php?action=evaluationinsertdata",
            data: data,
            success: function (response) {
                var resultdata = JSON.parse(response);
                if (resultdata.status === 'success') {
                    Swal.fire({
                        icon: "success",
                        title: resultdata.message,
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#evaludatemodal').hide();
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: resultdata.message,
                        showConfirmButton: true
                    });
                }
            },
        });
    });
  }
  
  
  
  function joining(data) {
    var value = typeof data === "string" ? JSON.parse(data) : data;
    $("#row_id1").val(value.id);
    $("#uic_code1").val(value.uic_code);
    $("#candidate_name1").val(value.first_name);
    $("#last_name1").val(value.last_name);
    $("#primary_contact_number1").val(value.primary_no);
    $("#secondary_contact_number1").val(value.seconday_no);
    $("#more_reference_details_11").val(value.reference_role);
    $("#processs1").val(value.process_type);
    $("#reference_mode1").val(value.reference_type);
    $("#placess1").val(value.office_location);
    $("#interview_date1").val(value.register_date);
    $(".showdata").hide();
    $("#joining_status").on("change", function () {
        var joining_status = $("#joining_status").val();
       // alert(joining_status);
       // alert(result);
        if (joining_status === "On Training") {
            $(".hidedata").show();
            $(".showdata").show();
        } else {
            $(".hidedata").show();
            $(".showdata").hide();
        }
    });
  
    $(".saveelevautiondata1").on("click", function () {
        var data = {
            row_id: $("#row_id1").val(),
            uic_code: $("#uic_code1").val(),
            candidate_name: $("#candidate_name1").val(),
            last_name: $("#last_name1").val(),
            primary_contact_number: $("#primary_contact_number1").val(),
            secondary_contact_number: $("#secondary_contact_number1").val(),
            reference_details: $("#more_reference_details_11").val(),
            process_type: $("#processs1").val(),
            reference_mode: $("#reference_mode1").val(),
            office_location: $("#placess1").val(),
            interview_date: $("#interview_date1").val(),
            contactmodes: $("#contactmodes").val(),
            description: $("#description").val(),
            joining_status: $("#joining_status").val(),
            offerstatus: $("#offerstatus").val(),
            documentstatus: $("#documentstatus").val(),
  
        };
        if (!data.contactmodes) {
          toastr.error("Please fill in fields: Contact Modes");
          return;
           }
           if (!data.description) {
            toastr.error("Please fill in fields: Description");
            return;
             }
             if (!data.joining_status) {
              toastr.error("Please fill in fields: Joining Status");
              return;
               }
              if (data.joining_status === "On Training") {
                if (!data.offerstatus) {
                  toastr.error("Please fill in fields: Offer Status");
                  return;
                 }
                  if (!data.documentstatus) {
                      toastr.error("Please fill in fields: Document status");
                      return;
                  }
              } else {
                  
                delete data.documentstatus;
                delete data.offerstatus;
              
                if (data.documentstatus) {
                  delete data.documentstatus; // Remove the 'reason' field from the 'data' object
                  toastr.error("Please fill in Document status"); // Display an error message using Toastr
                }
                if (data.offerstatus) {
                  delete data.offerstatus; // Remove the 'reason' field from the 'data' object
                  toastr.error("Please fill in Offer Status"); // Display an error message using Toastr
                }           
        }
  
        $.ajax({
            type: "post",
            url: "interviewtrcaker/interviewtrackersql.php?action=joiningdata",
            data: data,
            success: function (response) {
                var resultdata = JSON.parse(response);
                if (resultdata.status === 'success') {
                    Swal.fire({
                        icon: "success",
                        title: resultdata.message,
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#evaludatemodal').hide();
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: resultdata.message,
                        showConfirmButton: true
                    });
                }
            },
        });
    });
  }
  function statusupdated(data) {
    var value = typeof data === "string" ? JSON.parse(data) : data;
    $("#row_id2").val(value.id);
    $("#uic_code2").val(value.uic_code);
    $("#candidate_name2").val(value.first_name);
    $("#last_name2").val(value.last_name);
    $("#primary_contact_number2").val(value.primary_no);
    $("#secondary_contact_number2").val(value.seconday_no);
    $("#more_reference_details_12").val(value.reference_role);
    $("#processs2").val(value.process_type);
    $("#reference_mode2").val(value.reference_type);
    $("#placess2").val(value.office_location);
    $("#interview_date2").val(value.register_date);
    $("#contactmodes2").val(value.contact_modes);
    $("#description2").val(value.description);
    $("#joining_status2").val(value.status);
    $offerstatus1=value.offer_release;
    $documentstatus1=value.document_status;
    $(".saveelevautiondata2").on("click", function () {
      var offerstatus2 = $("#offerstatus2").val();
      var documentstatus2 = $("#documentstatus2").val();
  
      // Determine the values based on the conditions
      var offerstatusFinal = offerstatus2 !== "" ? offerstatus2 :  $offerstatus1;
      var documentstatusFinal = documentstatus2 !== "" ? documentstatus2 : $documentstatus1;
  
      var data = {
          row_id: $("#row_id2").val(),
          uic_code: $("#uic_code2").val(),
          candidate_name: $("#candidate_name2").val(),
          last_name: $("#last_name1").val(),
          primary_contact_number: $("#primary_contact_number2").val(),
          secondary_contact_number: $("#secondary_contact_number2").val(),
          reference_details: $("#more_reference_details_12").val(),
          process_type: $("#processs2").val(),
          reference_mode: $("#reference_mode2").val(),
          office_location: $("#placess2").val(),
          interview_date: $("#interview_date2").val(),
          contactmodes: $("#contactmodes2").val(),
          description: $("#description2").val(),
          joining_status: $("#joining_status2").val(),
          offerstatus: offerstatusFinal,
          documentstatus: documentstatusFinal,
      };
        $.ajax({
            type: "post",
            url: "interviewtrcaker/interviewtrackersql.php?action=updatetraingdata",
            data: data,
            success: function (response) {
                var resultdata = JSON.parse(response);
                if (resultdata.status === 'success') {
                    Swal.fire({
                        icon: "success",
                        title: resultdata.message,
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#evaludatemodal').hide();
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: resultdata.message,
                        showConfirmButton: true
                    });
                }
            },
        });
    });
  }

