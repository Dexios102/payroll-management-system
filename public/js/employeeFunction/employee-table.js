

/* Border Bottom - Status */
const listItems = document.querySelectorAll('.all-status-windows li');
listItems[0].classList.add('active');
listItems.forEach(function (listItem) {
  listItem.addEventListener('click', function () {
    listItems.forEach(function (item) {
      item.classList.remove('active');
    });
    this.classList.add('active');
  });
});

/* All Count */
const table_count_pos_main = document.getElementById("table-main");
const countSpans_count_pos_main = document.querySelector(".count");
const rowCounts_count_pos_main = table_count_pos_main.querySelectorAll(".primary-table-row").length;
countSpans_count_pos_main.textContent = rowCounts_count_pos_main;

/* Full Screen */
function openFullscreen() {
    const elem = document.querySelector(".all-table-container");
  
    if (document.fullscreenElement) {
      document.exitFullscreen();
    } else {
      elem.requestFullscreen();
    }
  }

/* Status Effect */
function changeStatusColor() {
  const wrapperStatus = document.querySelectorAll('.wrapper-status');

  wrapperStatus.forEach(status => {
    if (status.innerText === 'active') {
      status.parentElement.style.backgroundColor = '#013a63';
      status.parentElement.style.borderRadius = '50px';
      status.parentElement.style.color = '#fff';
    } else if (status.innerText === 'inactive') {
      status.parentElement.style.backgroundColor = '#a4161a';
      status.parentElement.style.borderRadius = '50px';
      status.parentElement.style.color = '#fff';
    }
  });
}
document.addEventListener('DOMContentLoaded', () => {
  changeStatusColor();
});
/* CheckBox and Printing*/
var checkboxes = document.querySelectorAll('tbody.tbody-main input[type="checkbox"]');
var selectAll = document.querySelector('thead.thead-main input[type="checkbox"]');
var rowst = document.querySelectorAll('tbody.tbody-main .primary-table-row');

function selectAllRows() {
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = selectAll.checked;
    if (checkboxes[i].checked) {
      rowst[i].classList.add('selected');
    } else {
      rowst[i].classList.remove('selected');
    }
  }
}

for (var i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener('click', function () {
    var isChecked = this.checked;
    var row = this.parentNode.parentNode;
    if (isChecked) {
      row.classList.add('selected');
    } else {
      row.classList.remove('selected');
    }
    if (document.querySelectorAll('tbody.tbody-main input[type="checkbox"]:checked').length === checkboxes.length) {
      selectAll.checked = true;
    } else {
      selectAll.checked = false;
    }
  });
}
selectAll.addEventListener('click', selectAllRows);

var printBtn = document.getElementById('print-btn');
printBtn.addEventListener('click', function () {
  var selectedRows = [];
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      selectedRows.push(rowst[i]);
    }
  }
  var tableData = `
  <div class="print-check">
  <table><thead><tr>
  <th>ID</th>
  <th>Status</th>
  <th></th>
  <th>Name</th>
  <th>Division</th>
  <th>Daily Rate</th>
  <th>Position</th>
  <th>Recorded Date</th>
  </tr></thead><tbody></div>`;

  for (var i = 0; i < selectedRows.length; i++) {
    var rowCells = selectedRows[i].querySelectorAll('td');
    tableData += '<tr>';
    for (var j = 1; j < rowCells.length - 1; j++) {
      tableData += '<td>' + rowCells[j].textContent + '</td>';
    }
    tableData += '</tr>';
  }
  tableData += '</tbody></table>';
  var printWindow = window.open('', '', 'height=500,width=800');
  printWindow.document.write('<html><head><title>Selected Rows</title></head><body>');
  printWindow.document.write(tableData);
  printWindow.document.write('</body></html>');
  printWindow.print();
});

function changeRowMoneyColor() {
  const moneyElements = document.querySelectorAll('.wrapper-money');
  moneyElements.forEach(element => {
    const dailyRate = parseFloat(element.textContent);
    element.textContent = `₱ ${dailyRate.toFixed(2)}`;
    if (dailyRate >= 1000) {
      element.style.backgroundColor = '#ced4da';
      element.style.borderRadius = '10px';
      element.style.color = '#3a5a40';
      element.style.fontWeight = 'bold';
      element.style.fontSize = '1.1rem';
    } else if (dailyRate >= 500) {
      element.style.backgroundColor = '#ced4da';
      element.style.borderRadius = '10px';
      element.style.color = '#003049';
      element.style.fontWeight = 'bold';
      element.style.fontSize = '1.1rem';
    } else {
      element.style.backgroundColor = '#ced4da';
      element.style.borderRadius = '10px';
      element.style.color = '#c1121f';
      element.style.fontWeight = 'bold';
      element.style.fontSize = '1.1rem';
    }
  });
}
window.onload = function() {
  changeRowMoneyColor();
}

/* Search */
  // Listen for input in the search box
  $('#search-box').on('input', function() {
    var query = $(this).val().toLowerCase();

    // Loop through all table rows and hide/show them based on the search query
    $('#table-body tr').each(function() {
      var fullName = $(this).find('#full_name').text().toLowerCase();
      var division = $(this).find('td:nth-child(6)').text().toLowerCase();

      if (fullName.includes(query) || division.includes(query)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });


// Add event listener to the search box
var searchInput = document.getElementById("search-input");
searchInput.addEventListener("input", searchTable);


/* Sorting */
const table_pos_main = document.getElementById("table-main");
const rows_pos_main = table_pos_main.getElementsByTagName("tr");
const headerRow_pos_main = rows_pos_main[0];
const sortButtons_pos_main = headerRow_pos_main.getElementsByClassName("sort-btn");
for (let i = 0; i < sortButtons_pos_main.length; i++) {
  const sortButton_pos_main = sortButtons_pos_main[i];

  sortButton_pos_main.addEventListener("click", function () {
    const sortBy_pos_main = sortButton_pos_main.dataset.sortby;

    const sortDirection_pos_main = sortButton_pos_main.classList.contains("desc") ? "asc" : "desc";

    for (let j = 0; j < sortButtons_pos_main.length; j++) {
      sortButtons_pos_main[j].classList.remove("asc");
      sortButtons_pos_main[j].classList.remove("desc");
    }
    sortButton_pos_main.classList.add(sortDirection_pos_main);

    let columnIndex_pos_main;
    switch (sortBy_pos_main) {
      case "id":
        columnIndex_pos_main = 2;
        break;
      case "name":
        columnIndex_pos_main = 5;
        break;
      case "division":
        columnIndex_pos_main = 6;
        break;
      case "position":
        columnIndex_pos_main = 8;
        break;
      case "created_at":
        columnIndex_pos_main = 9;
        break;
      default:
        columnIndex_pos_main = 0;
        break;
    }

    const rowsArray_pos_main = Array.from(rows_pos_main).slice(1);
    rowsArray_pos_main.sort(function (a_pos_main, b_pos_main) {
      const aValue_pos_main = a_pos_main.getElementsByTagName("td")[columnIndex_pos_main].textContent.trim();
      const bValue_pos_main = b_pos_main.getElementsByTagName("td")[columnIndex_pos_main].textContent.trim();
      return sortDirection_pos_main === "asc" ? aValue_pos_main.localeCompare(bValue_pos_main) : bValue_pos_main.localeCompare(aValue_pos_main);
    });
    rowsArray_pos_main.forEach(function (row_pos_main) {
      table_pos_main.appendChild(row_pos_main);
    });
  });
}

/* View Modal */
function showModal(row) {
  const id = row.cells[1].textContent;
  const status = row.cells[2].textContent;
  const name = row.cells[3].textContent;
  const division = row.cells[4].textContent;
  const d_rate = row.cells[5].textContent;
  const position = row.cells[6].textContent;
  const created_at = row.cells[7].textContent;
  const modalContent = `
  <div class="eye-modal">
  <h2 class="eye-header">Department Active</h2>
    <p><strong>ID: </strong>${id}</p>
    <p><strong>Status: </strong><span class="active-status">Active</span></p>
    <p><strong>Code: </strong> ${code}</p>
    <p><strong>Division: </strong> ${division}</p>
    <p><strong>Floor Number: </strong> ${floor_number}</p>
    <p><strong>Description: </strong> ${description}</p>
    <p><strong>Created at: </strong><span class="created"> ${created_at}<span></p>
  </div>
`;
  const modal = document.createElement('div');
  modal.classList.add('modalview');
  modal.innerHTML = modalContent;
  document.body.appendChild(modal);
  modal.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.remove();
    }
  });
}
const eyeIcons = document.querySelectorAll('.eye-main-pos');
eyeIcons.forEach((icon) => {
  icon.addEventListener('click', (event) => {
    const row = event.target.closest('tr');
    showModal(row);
  });
});
