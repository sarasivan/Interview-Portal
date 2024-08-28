$(document).ready(function () {
  showtabledata();


  function showtabledata() {
    $.ajax({
      type: 'get',
      url: 'settings/sidebarsettingsql.php?action=showtabledata',
      datatype: 'json',
      success: function(response) {
        console.log(response);
        var data = JSON.parse(response);
  
        // Destroy the existing DataTable if it exists
        if ($.fn.DataTable.isDataTable('#multilevel-btn-five')) {
          $('#multilevel-btn-five').DataTable().destroy();
        }
  
        // Clear existing headers and body
        $('#multilevel-btn-five thead').empty();
        $('#multilevel-btn-five tbody').empty();
  
        // Create table headers dynamically based on the keys in the first object
        var headers = Object.keys(data[0]);
        var theadHtml = '<tr>';
        headers.forEach(function(header) {
          theadHtml += '<th>' + header.replace(/_/g, ' ').toUpperCase() + '</th>';
        });
        theadHtml += '</tr>';
        $('#multilevel-btn-five thead').append(theadHtml);
  
        // Create table rows dynamically
        data.forEach(function(row, rowIndex) {
          var rowHtml = '<tr>';
          headers.forEach(function(header, headerIndex) {
            if (row[header] === 'yes' || row[header] === 'no') {
              rowHtml += `<td>
                <div class="checkbox-wrapper-12">
                  <div class="cbx">
                    <input data-id="${row.id}" data-header="${row[header]}" data-column="${header}" class="changecheckbox"type="checkbox" id="cbx-12-${rowIndex}-${headerIndex}" ${row[header] === 'yes' ? 'checked' : ''}>
                    <label for="cbx-12-${rowIndex}-${headerIndex}"></label>
                    <svg fill="none" viewBox="0 0 15 14" height="14" width="15">
                      <path d="M2 8.36364L6.23077 12L13 2"></path>
                    </svg>
                  </div>
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                      <filter id="goo-12-${rowIndex}-${headerIndex}">
                        <feGaussianBlur result="blur" stdDeviation="4" in="SourceGraphic"></feGaussianBlur>
                        <feColorMatrix result="goo-12" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -7" mode="matrix" in="blur"></feColorMatrix>
                        <feBlend in2="goo-12" in="SourceGraphic"></feBlend>
                      </filter>
                    </defs>
                  </svg>
                </div>
              </td>`;
            } else {
              rowHtml += '<td>' + row[header] + '</td>';
            }
          });
          rowHtml += '</tr>';
          $('#multilevel-btn-five tbody').append(rowHtml);
        });
  
        // Initialize DataTable
        $('#multilevel-btn-five').DataTable();
        changedata();
      },
      error: function(xhr, response) {
        console.error('Error fetching data:', response);
      }
    });
  }




  function changedata() {
    $('#multilevel-btn-five').on('change', '.changecheckbox', function() {
      var dataId = $(this).data('id');
      var headerColumndata = $(this).data('header');
      var headerColumn = $(this).data('column');
  
      $.ajax({
        type: 'POST',
        url: 'settings/sidebarsettingsql.php?action=uptabledata',
        data: {
          dataId: dataId,
          headerColumndata: headerColumndata,
          headerColumn: headerColumn
        },
        success: function(response) {
          var result = JSON.parse(response);
          if (result.status === 'success') {
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
        },
        error: function(xhr, response) {
          alert('An error occurred while updating the data');
        }
      });
    });
  }
  
  

  
  

});
