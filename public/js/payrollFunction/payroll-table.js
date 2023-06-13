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
  <div class="print-check">
  <table><thead>
  <tr>
  <th colspan="9" style="padding: 1rem; font-size: 1.1rem;">Payroll Data</th>
  </tr><tr>
  <th></th>
  <th>Employee ID</th>
  <th>Name</th>
  <th>Department</th>
  <th>Name</th>
  <th>Monthly Salary</th>
  <th>Bonus/Allowance</th>
  <th>Total Deduction</th>
  <th>Net Amount Received</th>
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
  printWindow.document.write('<html><head><title>Payroll Data</title></head><body>');
  printWindow.document.write(`
  <style>
  table {
    border-collapse: collapse;
    font-family: 'Roboto', sans-serif;
  } 
  td, th 
  {
    border: 1px solid black; 
    padding: 2px;
    font-size: .8rem;
    text-align: center;
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
  td:nth-child(1),
  th:nth-child(1) {
    display: none;
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