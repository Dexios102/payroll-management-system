/* Border Bottom - Status */
const listItems = document.querySelectorAll('.position-status-windows li');
listItems[0].classList.add('active');
listItems.forEach(function (listItem) {
  listItem.addEventListener('click', function () {
    listItems.forEach(function (item) {
      item.classList.remove('active');
    });
    this.classList.add('active');
  });
});


/* Search */
const searchInput = document.getElementById('search-input');
const tableRows = document.querySelectorAll('tbody tr');

searchInput.addEventListener('input', () => {
  const searchTerm = searchInput.value.toLowerCase();

  tableRows.forEach(row => {
    const id = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
    const name = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
    const division = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

    if (id.includes(searchTerm) || name.includes(searchTerm)
      || division.includes(searchTerm)) {
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
      case "name":
        columnIndex_pos_main = 2;
        break;
      case "division":
        columnIndex_pos_main = 3;
        break;
      case "description":
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

/* CheckBox and Printing*/
var checkboxes = document.querySelectorAll('tbody.tbody-main input[type="checkbox"]');
var selectAll = document.querySelector('thead.thead-main input[type="checkbox"]');
var rowst = document.querySelectorAll('tbody.tbody-main tr');

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
  var tableData = '<table><thead><tr><th>ID</th><th>Name</th><th>Division</th><th>Description</th></tr></thead><tbody>';
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


/* All Count */
const table_count_pos_main = document.getElementById("table-main");
const countSpans_count_pos_main = document.querySelector(".count");
const rowCounts_count_pos_main = table_count_pos_main.getElementsByTagName("tr").length - 1;
countSpans_count_pos_main.textContent = rowCounts_count_pos_main;


/* View Modal */
function showModal(row) {
  const id = row.cells[1].textContent;
  const name = row.cells[2].textContent;
  const division = row.cells[3].textContent;
  const description = row.cells[4].textContent;
  const modalContent = `
  <div style="background-color: white; color: black; padding: 10px;">
    <p><strong>ID: </strong>${id}</p>
    <br>
    <p><strong>Name: </strong> ${name}</p>
    <p><strong>Division: </strong> ${division}</p>
    <p><strong>Description: </strong> ${description}</p>
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

/* Status Color */
const rowss = document.querySelectorAll("#table-main tbody tr");
rowss.forEach(row => {
  const status = row.querySelector("td:nth-child(5)").textContent.toLowerCase();
  if (status === "paid") {
    row.querySelector("td:nth-child(5) span").style.backgroundColor = "#95d5b2";
  } else if (status === "unpaid") {
    row.querySelector("td:nth-child(5) span").style.backgroundColor = "RGBA(186,24,27,0.31)";
  }
});

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

/* Full Screen */
function openFullscreen() {
  const elem = document.querySelector(".position-table-container");

  if (document.fullscreenElement) {
    document.exitFullscreen();
  } else {
    elem.requestFullscreen();
  }
}





