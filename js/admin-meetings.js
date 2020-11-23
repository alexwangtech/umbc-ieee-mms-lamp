
// This array holds all meeting data
let meetingData = [];

// This is the id of the tbody
const tbodyId = 'tbody';

// FUNCTION: Gets all meeting data by making an AJAX
// call to 'actions/get-meetings.php'
// ==================================
function getData() {
    $.get('actions/get-meetings.php', function(res) {
        // Parse the data and call the render() method
        meetingData = JSON.parse(res);
        render();
    });
}

// FUNCTION: Renders all meeting data to the table body
// ====================================================
function render() {

    // Get the tbody element + reset inner HTML
    let tableBody = document.getElementById(tbodyId);
    tableBody.innerHTML = '';

    meetingData.forEach(function(row) {
        // Create a table row
        let tableRow = document.createElement('tr');

        for (const key in row) {
            // Create a table data item + append to table row
            let tableData = document.createElement('td');
            tableData.innerHTML = row[key];
            tableRow.append(tableData);
        }

        // Append the table row to the table body
        tableBody.append(tableRow);
    });
}

// Start everything off by fetching the data
getData();