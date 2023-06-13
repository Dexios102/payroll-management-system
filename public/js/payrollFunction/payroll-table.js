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

/* Changetable */
function openTable(tableId) {
  const tables = document.querySelectorAll('.table-change');
  const generateSlip = document.getElementById('generate-btn');
  const allBtn = document.getElementById('all-btn');
  tables.forEach(table => {
    table.classList.remove('active');
  });
  generateSlip.classList.remove('active');
  allBtn.classList.remove('active');
  const tableToShow = document.getElementById(tableId);
  tableToShow.classList.add('active');
  if (tableId === 'window-generate') {
    generateSlip.classList.add('active');
  } else if (tableId === 'table-all') {
    allBtn.classList.add('active');
  }
}

/* All Count */
const table_count_pos_main = document.getElementById("table-main");
const countSpans_count_pos_main = document.querySelector(".count");
const rowCounts_count_pos_main = table_count_pos_main.querySelectorAll(".primary-table-row").length;
countSpans_count_pos_main.textContent = rowCounts_count_pos_main;

/* Full Screen */
function openFullscreen(maxHeight) {
  const div = document.querySelector('.all-table-container');
  const table = div.querySelector('.table-container-wrapper');
  table.style.height = '90vh';
  if (div.requestFullscreen) {
    div.requestFullscreen();
  } else if (div.webkitRequestFullscreen) {
    div.webkitRequestFullscreen();
  } else if (div.msRequestFullscreen) {
    div.msRequestFullscreen();
  }
}

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
  <table><thead>
  <tr>
  <th colspan="8" style="padding: 1rem; font-size: 1.1rem;">Payroll Data</th>
  </tr>
  <tr class="header-print-tr">
  <th></th>
  <th>Employee ID</th>
  <th>Name</th>
  <th>Department</th>
  <th>Monthly Salary</th>
  <th>Bonus/Allowance</th>
  <th>Total Deduction</th>
  <th>Net Amount Received</th>
  </tr></thead><tbody>`;

  for (var i = 0; i < selectedRows.length; i++) {
    var rowCells = selectedRows[i].querySelectorAll('td');
    tableData += '<tr>';
    for (var j = 1; j < rowCells.length; j++) {
      tableData += '<td>' + rowCells[j].textContent + '</td>';
    }
    tableData += '</tr>';
  }
  tableData += '</tbody></table>';
  var printWindow = window.open('', '', 'height=500,width=800');
  printWindow.document.write('<html><head><title>Payroll Data Record</title></head><body>');
  printWindow.document.write(`
  <style>
  table {
    border-collapse: collapse;
    font-family: 'Outfit', sans-serif;
  } 
  td, th 
  {
    border: 1px solid black; 
    padding: 2px;
    font-size: .8rem;
    text-align: center;
  }
  .header-print-tr th {
    font-weight: bold;
    padding: .2rem .4rem;
    background-color: #023047;
    color: white;
  }
  td:nth-child(7) {
    color: #9d0208;
  }
  td:nth-child(8) {
    color: #2d6a4f;
  }
  td:nth-child(4) {
    font-weight: 600;
  }

  th:nth-child(1),
  td:nth-child(1) {
    display: none;
  }
  </style>`);
  printWindow.document.write(tableData);
  printWindow.document.write('</body></html>');
  printWindow.print();
});

/* Export to excel */
function exportToExcel() {
  const tableBody = document.getElementById("table-body");
  const selectedRows = tableBody.querySelectorAll('input[type="checkbox"]:checked');
  if (selectedRows.length === 0) {
    alert("Please select at least one row to export.");
    return;
  }

  const data = [];
  const headers = ["Id", "Name", "Department", "Monthly Salary",
   "Bonus/Allowance", "Total Deduction", "Net Amount Received"];

  data.push(headers);

  selectedRows.forEach((row) => {
    const rowData = [];
    const tableRow = row.closest("tr");
    const id = tableRow.querySelector("td:nth-child(3)").textContent.trim();
    const name = tableRow.querySelector("td:nth-child(4)").textContent.trim();
    const department = tableRow.querySelector("td:nth-child(5)").textContent.trim();
    const monthlySalary = tableRow.querySelector("td:nth-child(6)").textContent.trim();
    const bonus = tableRow.querySelector("td:nth-child(7)").textContent.trim();
    const totalDeduction = tableRow.querySelector("td:nth-child(8)").textContent.trim();
    const netAmountReceived = tableRow.querySelector("td:nth-child(9)").textContent.trim();

    rowData.push(id, name, department, monthlySalary, bonus, totalDeduction, netAmountReceived);
    data.push(rowData);
  });
  const worksheet = XLSX.utils.aoa_to_sheet(data);
  const workbook = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");
  XLSX.writeFile(workbook, "Payroll_data.xlsx");
}

/* Search */
const searchInput_search = document.getElementById('search-input');
const tableRows_search = document.querySelectorAll('tbody tr');

searchInput_search.addEventListener('input', () => {
  const searchTerm_search = searchInput_search.value.toLowerCase();

  tableRows_search.forEach(row => {
    const id_main = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
    const name_main = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

    if (id_main.includes(searchTerm_search) || name_main.includes(searchTerm_search)) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
});

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
        columnIndex_pos_main = 3;
        break;
      case "department":
        columnIndex_pos_main = 4;
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