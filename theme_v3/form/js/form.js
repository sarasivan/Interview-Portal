$(document).ready(function () {

  registerationform();
// Reinitialize all select elements with the class 'select2' after appending them
$('.select2').select2();

$('#submitregisterdata').on("click", function() {
  var data = collectFormData();
  if (data) { // Ensure data is not false
      // Log the JSON string to ensure it's correct
      console.log(JSON.stringify(data));
      
      $.ajax({
          url: 'form/formsql.php?action=formsubmitted', // Replace with your backend endpoint
          type: 'POST',
          contentType: 'application/json',
          data: JSON.stringify(data),
          success: function(response) {
              try {
                  // Handle JSON response from the server
                  var parsedResponse = JSON.parse(response);
                  console.log(parsedResponse);
                  
                  if (parsedResponse.success) {
                      Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: parsedResponse.message,
                      }).then((result) => {
                          if (result.isConfirmed) {
                              location.reload(); // Reload the page if user confirms
                          }
                      });
                  } else {
                      Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: parsedResponse.message || 'An error occurred while submitting the form.',
                          confirmButtonText: 'OK'
                      });
                  }
                  
              } catch (e) {
                  console.error('Error parsing JSON response:', e);
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Invalid server response. Please try again.',
                      confirmButtonText: 'OK'
                  });
              }
          },
          error: function(error) {
              console.error('An error occurred:', error);
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'An error occurred while submitting the form.',
                  confirmButtonText: 'OK'
              });
          }
      });
  }
});


});


  function registerationform(){
    var formtype='registerform';
    $.ajax({

      type:'get',
      url:'form/formsql.php?action=getdataform',
      data:{
        formtype:formtype,
      },
      datatype:'json',
      success: function(response) {
        var parsedData = JSON.parse(response).json;
        var jsonData = JSON.parse(parsedData); 
        selectoption();
        loadStates();
        loadEducationLevels();
        // console.log(jsonData);
        $.each(jsonData, function(index, value) {
          var datainformation = value.information;
          var fields = value.fields;

          // console.log(value);

          if(datainformation==="process"){
  
            var formContainer = $('#process_type_two');

            $.each(fields, function(index, fieldsdata) {
              var fieldsid = fieldsdata.id;
              var fieldstype = fieldsdata.type;
              var fieldsclass = fieldsdata.class;
              var fieldslabel = fieldsdata.label.toUpperCase();
              var fieldsvalue = fieldsdata.value;
              var fieldsoptions = fieldsdata.options;
              var fieldsproperties=fieldsdata.properties;        
              var sectionDiv = $('<div class="form-section col-6"></div>');
              sectionDiv.append(`<label class="floatingInput" for="${fieldsid}">${fieldslabel}</label>`);
        
              if (fieldstype === "select") {
                var selectElement = $(`<select class="${fieldsclass}" id="${fieldsid}" ${fieldsproperties}></select>`);
                selectElement.append(`<option value="">Choose Options</option>`);
            
                sectionDiv.append(selectElement);
              } else {
                sectionDiv.append(`<input type="${fieldstype}" class="${fieldsclass}" id="${fieldsid}" value="${fieldsvalue}" ${fieldsproperties}>`);
              }
        
              formContainer.append(sectionDiv);
              
            });

          }

          else if(datainformation==="personalinformation"){

            var formContainer = $('#personal_information');

            $.each(fields, function(index, fieldsdata) {
              var fieldsid = fieldsdata.id;
              var fieldstype = fieldsdata.type;
              var fieldsclass = fieldsdata.class;
              var fieldslabel = fieldsdata.label.toUpperCase();
              var fieldsvalue = fieldsdata.value;
              var fieldsoptions = fieldsdata.options;

              console.log(fieldsid); 
              var sectionDiv = $('<div class="form-section col-6"></div>');
              sectionDiv.append(`<label class="floatingInput" for="${fieldsid}">${fieldslabel}</label>`);
        
              if (fieldstype === "select") {
                var selectElement = $(`<select class="${fieldsclass}" id="${fieldsid}"></select>`);
                selectElement.append(`<option value="">Choose Options</option>`);
              
                sectionDiv.append(selectElement);
              } else {
                sectionDiv.append(`<input type="${fieldstype}" class="${fieldsclass}" id="${fieldsid}" value="${fieldsvalue}">`);
              }
        
              formContainer.append(sectionDiv);
            });

          }
          else if (datainformation === "educational") {
            var formContainer = $('#educational');
            var indexData = 1;
        
            // Function to create a new form section
            function createFormSection(fields) {
                var sectionDiv = $('<div class="form-section row educationEntry"></div>').attr('data-index', indexData);
        
                // Loop through fields to create form elements
                $.each(fields, function(index, fieldData) {
                    var sectionFirstDiv = $('<div class="form-section col-3 p-2"></div>');
                    sectionFirstDiv.append(`<label class="floatingInput" for="${fieldData.id}-${indexData}">${fieldData.label.toUpperCase()}</label>`);
        
                    if (fieldData.type === "select") {
                        var selectElement = $('<select></select>')
                            .addClass(fieldData.class)
                            .attr({ 'data-index': indexData, id: `${fieldData.id}-${indexData}` });
        
                        selectElement.append('<option value="">Choose Options</option>');
        
                        // Append options to the select element
                        $.each(fieldData.options, function(optIndex, option) {
                            selectElement.append(`<option value="${option.value}">${option.label}</option>`);
                        });
        
                        sectionFirstDiv.append(selectElement);
                    } else {
                        sectionFirstDiv.append(`<input type="${fieldData.type}" class="${fieldData.class}" data-index="${indexData}" id="${fieldData.id}-${indexData}" value="${fieldData.value}">`);
                    }
        
                    sectionDiv.append(sectionFirstDiv);
                });
        
                indexData++;
        
                // Create action buttons
                var actionDiv = $('<div class="form-section col-3 mt-4"></div>');
                var addMoreButton = $('<button type="button" class="add-more btn btn-primary m-3">Add More</button>');
                var deleteButton = $('<button type="button" class="delete btn btn-danger m-3">Remove</button>');
        
                actionDiv.append(addMoreButton, deleteButton);
                sectionDiv.append(actionDiv);
                formContainer.append(sectionDiv);
        
                // Event handlers for Add More and Delete buttons
                addMoreButton.click(function() {
                    createFormSection(fields);
                });
        
                deleteButton.click(function() {
                    sectionDiv.remove();
                    // If there are no more sections, add a new empty one
                    if (formContainer.children('.form-section').length === 0) {
                        createFormSection(fields);
                    } else {
                        // Ensure the last row has an Add More button
                        formContainer.children('.form-section:last').find('.add-more').show();
                    }
                });
        
                // Hide Add More button for all but the last section
                formContainer.children('.form-section:not(:last)').find('.add-more').hide();
        
                // Load education levels for the newly created section
                loadEducationLevels1(`#educationaltype-${indexData - 1}`, `#educationalrole-${indexData - 1}`);
            }
        
            // Initialize the form with the first section
            createFormSection([
                { id: 'educationaltype', label: 'Education Level', type: 'select', class: 'form-control' },
                { id: 'educationalrole', label: 'Course', type: 'select', class: 'form-control' },
                { id: 'passingyear', label: 'Passing Year', type: 'number', class: 'form-control', value: '' } // New field added here
                // Add other fields as necessary
            ]);
        }
        
          else if(datainformation==="reference"){

            var formContainer = $('#reference');

            $.each(fields, function(index, fieldsdata) {
              var fieldsid = fieldsdata.id;
              var fieldstype = fieldsdata.type;
              var fieldsclass = fieldsdata.class;
              var fieldslabel = fieldsdata.label.toUpperCase();
              var fieldsvalue = fieldsdata.value;
              var fieldsoptions = fieldsdata.options;

    
        
              var sectionDiv = $('<div class="form-section col-6"></div>');
              sectionDiv.append(`<label class="floatingInput" for="${fieldsid}">${fieldslabel}</label>`);
        
              if (fieldstype === "select") {
                var selectElement = $(`<select class="${fieldsclass}" id="${fieldsid}"></select>`);
                selectElement.append(`<option value="">Choose Options</option>`);
              
                sectionDiv.append(selectElement);
              } else {
                sectionDiv.append(`<input type="${fieldstype}" class="${fieldsclass}" id="${fieldsid}" value="${fieldsvalue}">`);
              }
        
              formContainer.append(sectionDiv);
            });

          }
          
          else if(datainformation==="experience") {
            var indexdata=1;
              // alert('dtaa');
            var formContainer = $('#experience');
          
            function createFormSection(fields) {
    
              var sectionDiv = $('<div class="form-section row experienceEntry" data-index = "'+ indexdata +'" ></div>');
            
              $.each(fields, function(index, fieldsdata) {
               
                var fieldsid = fieldsdata.id;
                var fieldstype = fieldsdata.type;
                var fieldsclass = fieldsdata.class;
                var fieldslabel = fieldsdata.label.toUpperCase();
                var fieldsvalue = fieldsdata.value;
                var fieldsoptions = fieldsdata.options;

                console.log(fieldsid);
            
                var sectionfirstDiv = $('<div class="form-section col-2 p-2"></div>');
                sectionfirstDiv.append(`<label class="floatingInput" for="${fieldsid}">${fieldslabel}</label>`);
        
                if (fieldstype === "select") {
                  var selectElement = $(`<select class="${fieldsclass}" id="${fieldsid}" data-index="${indexdata}"></select>`);
                  selectElement.append(`<option value="">Choose Options</option>`);
                  if(fieldsoptions) {
                    $.each(fieldsoptions, function(optionIndex, optionValue) {
                      selectElement.append(`<option value="${optionValue}">${optionValue}</option>`);
                    });
                  }
                  sectionfirstDiv.append(selectElement);
                } else {
                  sectionfirstDiv.append(`<input type="${fieldstype}" class="${fieldsclass}" id="${fieldsid}" data-index="${indexdata}" value="${fieldsvalue}">`);
                }
            
                sectionDiv.append(sectionfirstDiv);
              });
              indexdata++;
              var actionDiv = $('<div class="form-section col-3 mt-4"></div>');
              var addMoreButton = $('<button type="button" class="add-more btn btn-primary m-2">Add More</button>');
              var deleteButton = $('<button type="button" class="delete btn btn-danger m-2">Remove</button>');
          
              actionDiv.append(addMoreButton);
              actionDiv.append(deleteButton);
              sectionDiv.append(actionDiv);
          
              formContainer.append(sectionDiv);
          
              addMoreButton.click(function() {
                createFormSection(fields); 
              });
          
              deleteButton.click(function() {
                sectionDiv.remove();
                // If there are no more sections, add a new empty one
                if (formContainer.children('.form-section').length === 0) {
                  createFormSection(fields);
                } else {
                  // Make sure the last row has an Add More button
                  formContainer.children('.form-section:last').find('.add-more').show();
                }
              });
          
              // Hide Add More button for all but the last section
              formContainer.children('.form-section:not(:last)').find('.add-more').hide();
            }
          
            // Assuming fields is defined somewhere with the required field data
            createFormSection(fields);
          }
        
        });
      },
      
      error:function(xhr,response){


      }


    });

  }

 // Function to load education levels
 function loadEducationLevels1(typeSelector, roleSelector) {
              $.ajax({
                  type: 'GET',
                  url: 'form/formsql.php?action=educationdata',
                  dataType: 'json',
                  success: function(response) {
                      var dropdown = $(typeSelector);
                      dropdown.empty();
                      dropdown.append($('<option>', {
                          value: '',
                          text: 'Choose an education level',
                          disabled: true,
                          selected: true
                      }));
      
                      $.each(response.educationLevels, function(index, item) {
                          dropdown.append(new Option(item.level_name, item.id));
                      });
      
                      dropdown.select2();
      
                      dropdown.on('change', function() {
                          var selectedLevelId = $(this).val();
                          if (selectedLevelId) {
                              updateCourses1(selectedLevelId, roleSelector);
                          }
                      });
                  },
                  error: function(xhr, status, error) {
                      console.error('AJAX Error: ' + status + ' ' + error);
                  }
              });
}
      
// Function to load courses based on selected education level
function updateCourses1(levelId, roleSelector) {
              $.ajax({
                  type: 'GET',
                  url: 'form/formsql.php?action=getcoursesdata',
                  data: { education_level_id: levelId },
                  dataType: 'json',
                  success: function(response) {
                      var courseDropdown = $(roleSelector);
                      courseDropdown.empty();
      
                      courseDropdown.append($('<option>', {
                          value: '',
                          text: 'Choose a course',
                          disabled: true,
                          selected: true
                      }));
      
                      $.each(response.courses, function(index, item) {
                          courseDropdown.append(new Option(item.course_name, item.id));
                      });
      
                      courseDropdown.select2();
                  },
                  error: function(xhr, status, error) {
                      console.error('AJAX Error: ' + status + ' ' + error);
                  }
              });
}
    // Function to load states
    function loadStates() {
        $.ajax({
            type: 'GET',
            url: 'form/formsql.php?action=getstatedata',
            dataType: 'json',
            success: function(response) {
                var dropdown = $('#state');
                dropdown.empty();

                dropdown.append($('<option>', {
                    value: '',
                    text: 'Choose a state',
                    disabled: true,
                    selected: true
                }));

                $.each(response, function(index, item) {
                    dropdown.append(new Option(item.state_name, item.state_id));
                });

                dropdown.select2();

                dropdown.on('change', function() {
                    var selectedStateId = $(this).val();
                    if (selectedStateId) {
                        updateCities(selectedStateId);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' ' + error);
            }
        });
    }

    // Function to load cities based on selected state
    function updateCities(stateId) {
        $.ajax({
            type: 'GET',
            url: 'form/formsql.php?action=getcitiesdata',
            data: { state_id: stateId },
            dataType: 'json',
            success: function(response) {
                var cityDropdown = $('#city');
                cityDropdown.empty();

                cityDropdown.append($('<option>', {
                    value: '',
                    text: 'Choose a city',
                    disabled: true,
                    selected: true
                }));

                $.each(response, function(index, item) {
                    cityDropdown.append(new Option(item.city_name, item.city_id));
                });

                cityDropdown.select2();
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' ' + error);
            }
        });
    }

    // Load states on page load
  function selectoption() {
    $.ajax({
      type: 'GET',
      url: 'form/formsql.php?action=getoptionform',
      dataType: 'json',
      success: function(response) {
        // Assuming response is already parsed as JSON due to `dataType: 'json'`
        console.log(response);
        $.each(response, function(index, value) {
          var selectionOptionName = value.selectionoptionname;
          var optionsValue = value.optionsvalue.split(',');
            $.each(optionsValue, function(index, fieldOptionsValue) {
              $('#' + selectionOptionName).append(`<option value="${fieldOptionsValue}">${fieldOptionsValue}</option>`).select2();
            });
           
        });
      },
      error: function(xhr, status, error) {
        console.error('Error loading options:', error);
      }
    });
  }

  function selectionoptiontwo(){
    $('#educationaltype').on('change',function(){
      var educationaltype = $('#educationaltype').val();
      $.ajax({
        type: 'post',
        url: 'form/formsql.php?action=geteducationform',
        data:educationaltype,
        dataType: 'json',
        success: function(response) {
          // Assuming response is already parsed as JSON due to `dataType: 'json'`
          console.log(response);
          $.each(response, function(index, value) {
            var selectionOptionName = value.selectionoptionname;
            var optionsValue = value.optionsvalue.split(',');
              $.each(optionsValue, function(index, fieldOptionsValue) {
                $('#' + selectionOptionName).append(`<option value="${fieldOptionsValue}">${fieldOptionsValue}</option>`).select2();
              });
             
          });
        },
        error: function(xhr, status, error) {
          console.error('Error loading options:', error);
          showToaster('An error occurred while submitting the form.');
        }
      });
      
    })
  }

  // Function to load education levels
function loadEducationLevels() {
  $.ajax({
      type: 'GET',
      url: 'form/formsql.php?action=educationdata',
      dataType: 'json',
      success: function(response) {
          var dropdown = $('#educationaltype');
          dropdown.empty();
          dropdown.append($('<option>', {
              value: '',
              text: 'Choose an education level',
              disabled: true,
              selected: true
          }));

          $.each(response.educationLevels, function(index, item) {
              dropdown.append(new Option(item.level_name, item.id));
          });

          dropdown.select2();

          dropdown.on('change', function() {
              var selectedLevelId = $(this).val();
              if (selectedLevelId) {
                  updateCourses(selectedLevelId);
              }
          });
      },
      error: function(xhr, status, error) {
          console.error('AJAX Error: ' + status + ' ' + error);
      }
  });
}

// Function to load courses based on selected education level
function updateCourses(levelId) {
  $.ajax({
      type: 'GET',
      url: 'form/formsql.php?action=getcoursesdata',
      data: { education_level_id: levelId },
      dataType: 'json',
      success: function(response) {
          var courseDropdown = $('#educationalrole');
          courseDropdown.empty();

          courseDropdown.append($('<option>', {
              value: '',
              text: 'Choose a course',
              disabled: true,
              selected: true
          }));

          $.each(response.courses, function(index, item) {
              courseDropdown.append(new Option(item.course_name, item.id));
          });

          courseDropdown.select2();
      },
      error: function(xhr, status, error) {
          console.error('AJAX Error: ' + status + ' ' + error);
      }
  });
}
function collectFormData() {
  var formData = {}; // Initialize once

  // Collect general form data
  if (!validateField('#processtype', 'Process Type is required')) return false;
  formData.processType = $('#processtype').val();

  if (!validateField('#processrole', 'Process Role is required')) return false;
  formData.processRole = $('#processrole').val();

  // Personal Information
  if (!validateField1('#firstname', 'First Name is required for Personal Information')) return false;
  formData.firstName = $('#firstname').val();

  if (!validateField1('#lastname', 'Last Name is required for Personal Information')) return false;
  formData.lastName = $('#lastname').val();

  if (!validateField('#dob', 'Date of Birth is required for Personal Information')) return false;
  formData.dob = $('#dob').val();

  if (!validateField('#martialstatus', 'Marital Status is required for Personal Information')) return false;
  formData.maritalStatus = $('#martialstatus').val();  // Fixed spelling to 'maritalStatus'

  if (!validateField('#gender', 'Gender is required for Personal Information')) return false;
  formData.gender = $('#gender').val();

  // Primary Contact Number
  if (!validateField('#primarycontactnumber', 'Primary Contact Number is required for Personal Information')) return false;
  var primaryContactNumber = $('#primarycontactnumber').val();
  var phoneNumberPattern = /^\d{10}$/;
  if (!phoneNumberPattern.test(primaryContactNumber)) {
      showToaster('Primary Contact Number must be a 10-digit number ');
      return false;
  }
  formData.primaryContactNumber = primaryContactNumber;

  // Secondary Contact Number
  if (!validateField('#secondarycontactnumber', 'Secondary Contact Number is required for Personal Information')) return false;
  var secondaryContactNumber = $('#secondarycontactnumber').val();
  if (!phoneNumberPattern.test(secondaryContactNumber)) {
      showToaster('Secondary Contact Number must be a 10-digit number');
      return false;
  }
  formData.secondaryContactNumber = secondaryContactNumber;

  // Email
  if (!validateField('#email', 'Email is required for Personal Information')) return false;
  var email = $('#email').val();
  var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailPattern.test(email)) {
      showToaster('Please enter a valid email address');
      return false;
  }
  formData.email = email;

  // Remaining personal information
  formData.physicallyChallenged = $('#physicallychallanged').val();
  formData.bloodGroup = $('#bloodgroup').val();

  if (!validateField('#doorno', 'Door No is required for Personal Information')) return false;
  formData.doorNo = $('#doorno').val();

  if (!validateField1('#area', 'Area is required for Personal Information')) return false;
  formData.area = $('#area').val();

  if (!validateField1('#city', 'City is required for Personal Information')) return false;
  formData.city = $('#city').val();

  if (!validateField('#state', 'State is required for Personal Information')) return false;
  formData.state = $('#state').val();

  // Pincode
  if (!validateField('#pincode', 'Pincode is required for Personal Information')) return false;
  var pincode = $('#pincode').val();
  var pincodePattern = /^\d{6}$/;
  if (!pincodePattern.test(pincode)) {
      showToaster('Pincode must be a 6-digit number');
      return false;
  }
  formData.pincode = pincode;

  // Educational Data
  formData.education = [];
  var educationValid = true;
  $('.educationEntry').each(function() {
      var index = $(this).data('index');
      var educationalType = $(`#educationaltype-${index}`).val();
      var educationalRole = $(`#educationalrole-${index}`).val();
      var passingYear = $(`#passingyear-${index}`).val();

      // Validate each education entry
      if (!validateEntry([educationalType, educationalRole, passingYear], `All education fields are required for index ${index}`)) {
          educationValid = false;
          return false; // Exit loop if validation fails
      }

      // Validate passingYear to ensure it's not a future year
      var currentYear = new Date().getFullYear();
      if (isNaN(passingYear) || passingYear > currentYear) {
          alert(`Invalid passing year for index ${index}. Please enter a valid year.`);
          educationValid = false;
          return false; // Exit loop if validation fails
      }

      formData.education.push({
          educationalType: educationalType,
          educationalRole: educationalRole,
          passingYear: passingYear
      });
  });
  if (!educationValid) return false;

  // Experience Data
  formData.experience = [];
  $('.experienceEntry').each(function() {
      var index = $(this).data('index');
      var companyName = $(`.companyname[data-index="${index}"]`).val();
      var designation = $(`.designation[data-index="${index}"]`).val();
      var joiningDate = $(`.joiningdate[data-index="${index}"]`).val();
      var relievingDate = $(`.relievingdate[data-index="${index}"]`).val();

      formData.experience.push({
          companyName: companyName,
          designation: designation,
          joiningDate: joiningDate,
          relievingDate: relievingDate
      });
  });

  // Output the collected data (for debugging)
  console.log(formData);

  return formData;
}
function validateEntry(fields, message) {
    for (var i = 0; i < fields.length; i++) {
        if (!fields[i]) {
            showToaster(message);
            return false;
        }
    }
    return true;
}

function validateField(selector, message) {
    if (!$(selector).val()) {
        showToaster(message);
        return false;
    }
    return true;
}

function showToaster(message) {
    var toaster = document.getElementById("toaster");
    toaster.innerText = message;
    toaster.className = "toaster show";
    setTimeout(function() { 
        toaster.className = toaster.className.replace("show", ""); 
    }, 3000);
}
function validateField1(selector, errorMessage) {
  var value = $(selector).val();
  var regex = /^[a-zA-Z]+$/; // Regular expression to allow only alphabetic characters

  if (!value) {
      showToaster(errorMessage);
      return false;
  }
  return true;
}

