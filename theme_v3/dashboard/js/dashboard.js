$(document).ready(function(){
    dashboardcarddata();
    process_types_count();
    reference_type_count();
    alljoing_status();
    //hrwisecount();
    $('#submit').on('click',function(){
        var start_date=$('#startdate').val();
        var end_date=$('#enddate').val();
        dashboardcarddata(start_date,end_date);
        process_types_count(start_date,end_date)
        reference_type_count(start_date,end_date)
        alljoing_status(start_date,end_date);
        //hrwisecount(start_date,end_date);
    });

    $('.selectlistall').on('click', function() {
        // Get values from input fields
        var start_date = $('#startdate').val();
        var end_date = $('#enddate').val();
        var status_type = $(this).data('value'); // Get value from the status select field
        window.location.href="interview_tracker.php?fromdate="+start_date+"&end_date="+end_date+"&status_type="+status_type;
        // // Construct the URL with query parameters
        // var url = 'interview_tracker.php?fromdate=' + encodeURIComponent(start_date) + 
        //           '&todate=' + encodeURIComponent(end_date) + 
        //           '&status_type=' + encodeURIComponent(status_type);
        
        // // Trigger form submission
        // $.post('interviewtrcaker/interviewtrackersql.php?action=interviewtrackerdata', {
        //     start_date: start_date,
        //     end_date: end_date,
        //     status_type: status_type
        // }, function(response) {
        //     alert(response);
        //     // Optionally handle the response if needed
        //     console.log(response);
            
        //     // Automatically trigger the submit button click
        //     $('#interview_data_submit').click();
            
        //     // Optionally, you might want to redirect after posting data
        //     // window.location.href = url;
        // }).fail(function() {
        //     // Handle errors if the POST request fails
        //     alert('An error occurred while submitting the data.');
        // });
    });
    

  
    
    
    // & dashboard  all count
    function dashboardcarddata(start_date,end_date){
        $.ajax({
            type:'post',
            url:'dashboard/dashboard_sql.php?action=dashboardcarddata',
            data:{
                start_date:start_date,
                end_date:end_date,
            },
            success:function(response){
                var data = JSON.parse(response);
                console.log(data);
                var registeration_count=data.REGISTERATION_count;
                var interview_count =data.INTERVIEW_count;
                var hold_count=data.HOLD_count;
                var reject_count=data.REJECTED_count;
                var selected_count=data.SELECTED_count;
                var training_count =data.TRAINING_count;
                $('#pending_count').text(registeration_count);
                $('#interviewed_count').text(interview_count);
                $('#selected_count').text(selected_count);
                $('#hold_count').text(hold_count);
                $('#Training_count').text(training_count);
                $('#rejected_count').text(reject_count);
            },
            error:function(xhr,response){

            }
        });
    }

    //& process type count
    function process_types_count(start_date, end_date) {
        $.ajax({
            type: 'POST',
            url: 'dashboard/dashboard_sql.php?action=process_types_count',
            data: {
                start_date: start_date,
                end_date: end_date,
            },
            dataType: 'json',
            success: function (data) {
                console.log(data); // Verify data received in console
    
                // Clear existing table rows
                $('#recent-order tbody').empty();
    
                // Initialize index for row numbering
                var index = 0;
    
                // Iterate through each data item and append to table
                $.each(data, function (key, value) {
                    index++; // Increment index for each row
    
                    // Append a new row with data to the table body
                    $('#recent-order tbody').append('<tr>' +
                        '<td>' + index + '</td>' + // Display index as the first column
                        '<td>' + key + '</td>' + // Display the key (process type)
                        '<td><button class="btn">In-Progress</button></td>' +
                        '<td>' + value + '</td>' + // Display the value (count)
                        '</tr>');
                });
    
                // Initialize DataTables
                $('#recent-order').DataTable();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
    
       //& All reference type count
       function reference_type_count(start_date, end_date){
        $.ajax({
            url: 'dashboard/dashboard_sql.php?action=All_reference_type',
            type: 'POST',
            data: { 
                start_date: start_date,
                end_date: end_date,
            },
            success: function(data) {
                console.log(data);
                try {
                    var datasuccess = JSON.parse(data);
        
                    // Check if data is an array and has at least one element
                    if (Array.isArray(datasuccess) && datasuccess.length > 0) {
                        var user = datasuccess[0];  // Access the first element of the array
        
                        // Update counts for each process type
                        $("#campus_count").text(user["CAMPUS-PLACEMENTS"] || 0);
                        $("#consultant_count").text(user["CONSULTANCY"] || 0);
                        $("#walkins_count").text(user["DIRECT-WALK-INS"] || 0);
                        $("#referral_count").text(user["EMPLOYEE-REFERRAL"] || 0);
                        $("#hr_count").text(user["HR-REFERENCE"] || 0);
                        $("#portal_count").text(user["PORTALS"] || 0);
                        $("#referother_count").text(user["OTHERS"] || 0);
        
                        // Calculate total count
                        var total = 0;
                        $("#campus_count, #consultant_count, #walkins_count, #referral_count, #hr_count, #portal_count, #referother_count").each(function() {
                            var count = parseInt($(this).text()) || 0;
                            total += count;
                        });
        
                        // Update total count in #totalcount1 element
                        $("#totalcount1").text(total);
                    } else {
                        alert('No data found.');
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                    alert('Error parsing JSON data.');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('Error occurred while counting records.');
            }
        });
    }
     // & All joining status count
     function alljoing_status(start_date, end_date) {
        $.ajax({
            type: 'POST',
            url: 'dashboard/dashboard_sql.php?action=all_joining_status',
            data: {
                start_date: start_date,
                end_date: end_date
            },
            success: function(response) {
                try {
                    var data = JSON.parse(response);
                    console.log(data);
    
                    // If the response is an array with one object, access the first element
                    if (Array.isArray(data) && data.length > 0) {
                        data = data[0]; // Access the first (and only) object in the array
                    }
    
                    var On_Training_count = data.On_Training || 0; // Default to 0 if undefined
                    var Not_Joined_count = data.Not_Joined || 0;   // Default to 0 if undefined
                    var PENDING_count = data.PENDING || 0;         // Default to 0 if undefined
    
                    $('#Trainingcount').text(On_Training_count);
                    $('#Pending_Status_count').text(PENDING_count);
                    $('#Not_Joined_count').text(Not_Joined_count);
                } catch (e) {
                    console.error("Error parsing JSON response: ", e);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error: ", status, error);
            }
        });
    }

    

    //hr wise reference count
    // function hrwisecount(start_date,end_date){

    //     $.ajax({
    //         type:'post',
    //         url:'dashboard/dashboard_sql.php?action=hrwisecount',
    //         data:{
    //             start_date:start_date,
    //             end_date:end_date,
    //         },
    //         success:function(response){
    //             var data = JSON.parse(response);
   
    //         },
    //         error:function(xhr,response){

    //         }
    //     });




        





    // }

});