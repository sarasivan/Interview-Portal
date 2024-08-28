

    processtypefilter();
    referencemodefilter();
    officelocationfilter();
    statusdatafilter();
    processrole();
    shittypes();
    //canditatescoredata();

//processtypefilter
function processtypefilter() {
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=processtypefilterdata',   
        dataType: 'json',
        success: function(response) {
            var select = $('.processtype');
            select.empty();
            select.append('<option value="">Process Type </option>');
            $.each(response, function(index, value) {
                if(value.options == ''){
                    select.append('<option value=""> Others</option>');
                } else {
                    select.append('<option value="' + value.options + '">' + value.options + '</option>');
                }
            });
        },
        error: function(xhr, response) {
            console.error("Error fetching data");
        }
    });
}



//referencemodefilter
function referencemodefilter() {
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=referencemodedata',
        dataType: 'json',
        success: function(response) {
            var select = $('#referencemode');
            select.empty();
            select.append('<option value="">Select Reference Mode </option>');
            $.each(response, function(index, value) {

                    select.append('<option value="' + value.options + '">' + value.options + '</option>');

              
                
            });
        },
        error: function(xhr, response) {
            console.error("Error fetching data");
        }
    });
}

//officelocationfilter

//referencemodefilter
function officelocationfilter() {

    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=officelocationdata',
        dataType: 'json',
        success: function(response) {
            var select = $('#officelocation');
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


function statusdatafilter() {
   
    var recev_stats = $('#receved_status_type').val();
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=evaluationstatusdata',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            
            var select = $('#status');
            select.empty();
            select.append('<option value=""> Status </option>');
            $.each(response, function(index, value) {
                    var selected = "";
                    if(value.options == recev_stats)
                    {
                        var selected = 'selected';
                    }

                    select.append('<option value="' + value.options + '" '+ selected +'>' + value.options + '</option>');      
                           
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
            var select = $('#processrole_evelaution');
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

//shittypes
function shittypes() {
    $.ajax({
        type: 'get',
        url: 'filter/filtersql.php?action=shiftdata',
        dataType: 'json',
        success: function(response) {
            var select = $('#shift');
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

