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
  <div class="print-check">
  <table><thead>
  <tr>
  <th colspan="9" style="padding: 1rem; font-size: 1.1rem;">Deduction Data</th>
  </tr><tr>
  <th>ID</th>
  <th></th>
  <th>Code</th>
  <th>Name</th>
  <th>Type</th>
  <th>Minimum Loan</th>
  <th>Description</th>
  <th>Recorded Time</th>
  </tr></thead><tbody></div>`;

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
  printWindow.document.write('<html><head><title>Generated by: BFAR Payroll System</title></head><body>');
  printWindow.document.write(`
  <style>
  table {
    border-collapse: collapse;
    font-family: 'Roboto', sans-serif;
  } 
  td, th 
  {
    border: 1px solid black; 
    padding: 5px;
  }
  th {
    font-weight: bold;
  }
  td:nth-child(1), td:nth-child(8) {
    color: #2d6a4f;
  }
  td:nth-child(4) {
    font-weight: 600;
  }
  td:nth-child(2),
  th:nth-child(2) {
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
    const headers = ["Id", "Code", "Name", "Type", "Minimum Loan", "Description", "Date Recorded"];
  
    data.push(headers);
  
    selectedRows.forEach((row) => {
      const rowData = [];
      const tableRow = row.closest("tr");
      const id = tableRow.querySelector("td:nth-child(2)").textContent.trim();
      const code = tableRow.querySelector("td:nth-child(4)").textContent.trim();
      const name = tableRow.querySelector("td:nth-child(5)").textContent.trim();
      const type = tableRow.querySelector("td:nth-child(6)").textContent.trim();
      const min_loan = tableRow.querySelector("td:nth-child(7)").textContent.trim();
      const description = tableRow.querySelector("td:nth-child(8)").textContent.trim();
      const dateRecorded = tableRow.querySelector(".created_at").textContent.trim();
  
      rowData.push(id, code, name, type, min_loan, description, dateRecorded);
      data.push(rowData);
    });
    const worksheet = XLSX.utils.aoa_to_sheet(data);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");
    XLSX.writeFile(workbook, "Deduction_data.xlsx");
  }

  /* Search */
const searchInput = document.getElementById('search-input');
const tableRows = document.querySelectorAll('tbody tr');

searchInput.addEventListener('input', () => {
  const searchTerm = searchInput.value.toLowerCase();

  tableRows.forEach(row => {
    const id = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
    const code = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
    const name = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
    const type = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
    const min_loan = row.querySelector('td:nth-child(7)').textContent.toLowerCase();
    const description = row.querySelector('td:nth-child(8)').textContent.toLowerCase();
    const created_at = row.querySelector('td:nth-child(9)').textContent.toLowerCase();

    if (id.includes(searchTerm) || code.includes(searchTerm)
      || name.includes(searchTerm)
      || type.includes(searchTerm)
      || min_loan.includes(searchTerm)
      || description.includes(searchTerm)
      || created_at.includes(searchTerm)
      ) {
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
        columnIndex_pos_main = 1;
        break;
      case "code":
        columnIndex_pos_main = 3;
        break;
      case "name":
        columnIndex_pos_main = 4;
        break;
      case "type":
        columnIndex_pos_main = 5;
        break;
      case "min_loan":
        columnIndex_pos_main = 6;
        break;
      case "created_at":
        columnIndex_pos_main = 7;
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

/* Changetable */
function openTable(tableId) {
    const tables = document.querySelectorAll('.table-change');
    const allBtn = document.getElementById('all-btn');
    const archiveBtn = document.getElementById('archive-button');
    tables.forEach(table => {
      table.classList.remove('active');
    });
    allBtn.classList.remove('active');
    archiveBtn.classList.remove('active');
    const tableToShow = document.getElementById(tableId);
    tableToShow.classList.add('active');
    if (tableId === 'table-all') {
      allBtn.classList.add('active');
    } else if (tableId === 'table-archived') {
      archiveBtn.classList.add('active');
    }
  }

  /* View Modal */
function showModal(rowv) {
    const id = rowv.cells[1].textContent;
    const code = rowv.cells[3].textContent;
    const name = rowv.cells[4].textContent;
    const type = rowv.cells[5].textContent;
    const min_loan = rowv.cells[6].textContent;
    const description = rowv.cells[7].textContent;
    const created_at = rowv.cells[8].textContent;
    const modalContent = `
    <div class="eye-modal">
    <h2 class="eye-header">Allowance Active</h2>
      <p><strong>ID: </strong>${id}</p>
      <p><strong>Code: </strong> ${code}</p>
      <p><strong>Name: </strong> ${name}</p>
      <p><strong>Type: </strong> ${type}</p>
      <p><strong>Min loan: </strong> ${min_loan}</p>
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
      const rowe = event.target.closest('tr');
      showModal(rowe);
    });
  });