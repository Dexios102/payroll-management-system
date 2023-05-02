/* Status Color */
const rowss_archived = document.querySelectorAll("#table-second tbody tr");
rowss_archived.forEach(row_archived => {
  const status = row_archived.querySelector("td:nth-child(5)").textContent.toLowerCase();
  if (status === "floor - 1") {
    row_archived.querySelector("td:nth-child(5) span").style.backgroundColor = "#ffc300";
    row_archived.querySelector("td:nth-child(5) span").style.fontWeight = "500";
  } else if (status === "floor - 2") {
    row_archived.querySelector("td:nth-child(5) span").style.backgroundColor = "RGBA(184,24,27,0.31)";
    row_archived.querySelector("td:nth-child(5) span").style.fontWeight = "500";
  } else if (status === "floor - 3") {
    row_archived.querySelector("td:nth-child(5) span").style.backgroundColor = "#83c5be";
    row_archived.querySelector("td:nth-child(5) span").style.fontWeight = "500";
  } else if (status === "floor - 4") {
    row_archived.querySelector("td:nth-child(5) span").style.backgroundColor = "#48cae4";
    row_archived.querySelector("td:nth-child(5) span").style.fontWeight = "500";
  }
});

/* Counting Archive */
const tableArchiveds = document.getElementById("table-second");
const countSpans = document.querySelector(".countArchive");
const rowCounts = tableArchiveds.getElementsByTagName("tr").length - 1;
countSpans.textContent = rowCounts;

/* Full Screen */
function openFullscreen() {
  const elem_archived = document.querySelector(".all-table-container");

  if (document.fullscreenElement) {
    document.exitFullscreen();
  } else {
    elem_archived.requestFullscreen();
  }
}

/* CheckBox and Printing*/
var checkboxes_arpos = document.querySelectorAll('tbody.tbody_second input[type="checkbox"]');
var selectAll_arpos = document.querySelector('thead.thead_second input[type="checkbox"]');
var rowst_arpos = document.querySelectorAll('tbody.tbody_second tr');

function selectAllRows_arpos() {
  for (var i = 0; i < checkboxes_arpos.length; i++) {
    checkboxes_arpos[i].checked = selectAll_arpos.checked;
    if (checkboxes_arpos[i].checked) {
      rowst_arpos[i].classList.add('selected');
    } else {
      rowst_arpos[i].classList.remove('selected');
    }
  }
}

for (var i = 0; i < checkboxes_arpos.length; i++) {
  checkboxes_arpos[i].addEventListener('click', function () {
    var isChecked_arpos = this.checked;
    var row_arpos = this.parentNode.parentNode;
    if (isChecked_arpos) {
      row_arpos.classList.add('selected');
    } else {
      row_arpos.classList.remove('selected');
    }
    if (document.querySelectorAll('tbody.tbody_second input[type="checkbox"]:checked').length === checkboxes_arpos.length) {
      selectAll_arpos.checked = true;
    } else {
      selectAll_arpos.checked = false;
    }
  });
}
selectAll_arpos.addEventListener('click', selectAllRows_arpos);

var printBtn_arpos = document.getElementById('print-btn2');
printBtn_arpos.addEventListener('click', function () {
  var selectedRows_arpos = [];
  for (var i = 0; i < checkboxes_arpos.length; i++) {
    if (checkboxes_arpos[i].checked) {
      selectedRows_arpos.push(rowst_arpos[i]);
    }
  }
  var tableData_arpos = '<table><thead><tr><th>ID</th><th>Name</th><th>Division</th><th>Description</th></tr></thead><tbody>';
  for (var i = 0; i < selectedRows_arpos.length; i++) {
    var rowCells_arpos = selectedRows_arpos[i].querySelectorAll('td');
    tableData_arpos += '<tr>';
    for (var j = 1; j < rowCells_arpos.length - 1; j++) {
      tableData_arpos += '<td>' + rowCells_arpos[j].textContent + '</td>';
    }
    tableData_arpos += '</tr>';
  }
  tableData_arpos += '</tbody></table>';
  var printWindow_arpos = window.open('', '', 'height=500,width=800');
  printWindow_arpos.document.write('<html><head><title>Selected Rows</title></head><body>');
  printWindow_arpos.document.write(tableData_arpos);
  printWindow_arpos.document.write('</body></html>');
  printWindow_arpos.print();
});

/* Sorting */
const table_arpos = document.getElementById("table-second");
const rows_arpos = table_arpos.getElementsByTagName("tr");
const headerRow_arpos = rows_arpos[0];
const sortButtons_arpos = headerRow_arpos.getElementsByClassName("sort-btn_archived");
for (let i = 0; i < sortButtons_arpos.length; i++) {
  const sortButton_arpos = sortButtons_arpos[i];

  sortButton_arpos.addEventListener("click", function () {
    const sortBy_arpos = sortButton_arpos.dataset.sortby;

    const sortDirection_arpos = sortButton_arpos.classList.contains("desc") ? "asc" : "desc";

    for (let j = 0; j < sortButtons_arpos.length; j++) {
      sortButtons_arpos[j].classList.remove("asc");
      sortButtons_arpos[j].classList.remove("desc");
    }
    sortButton_arpos.classList.add(sortDirection_arpos);

    let columnIndex_arpos;
    switch (sortBy_arpos) {
      case "id":
        columnIndex_arpos = 1;
        break;
      case "code":
        columnIndex_arpos = 2;
        break;
      case "division":
        columnIndex_arpos = 3;
        break;
      case "floor_number":
        columnIndex_arpos = 4;
        break;
      case "description":
        columnIndex_arpos = 5;
        break;
      case "date_deleted":
        columnIndex_arpos = 6;
        break;
      default:
        columnIndex_arpos = 0;
        break;
    }

    const rowsArray_arpos = Array.from(rows_arpos).slice(1);
    rowsArray_arpos.sort(function (a_arpos, b_arpos) {
      const aValue_arpos = a_arpos.getElementsByTagName("td")[columnIndex_arpos].textContent.trim();
      const bValue_arpos = b_arpos.getElementsByTagName("td")[columnIndex_arpos].textContent.trim();
      return sortDirection_arpos === "asc" ? aValue_arpos.localeCompare(bValue_arpos) : bValue_arpos.localeCompare(aValue_arpos);
    });
    rowsArray_arpos.forEach(function (row_arpos) {
      table_arpos.appendChild(row_arpos);
    });
  });
}

/* Search */
const searchInput_ar = document.getElementById('search-input2');
const tableRows_ar = document.querySelectorAll('tbody tr');

searchInput_ar.addEventListener('input', () => {
  const searchTerm_ar = searchInput_ar.value.toLowerCase();

  tableRows_ar.forEach(row_ar => {
    const id_ar = row_ar.querySelector('td:nth-child(2)').textContent.toLowerCase();
    const code_ar = row_ar.querySelector('td:nth-child(3)').textContent.toLowerCase();
    const division_ar = row_ar.querySelector('td:nth-child(4)').textContent.toLowerCase();
    const floor_number_ar = row_ar.querySelector('td:nth-child(5)').textContent.toLowerCase();
    const description_ar = row_ar.querySelector('td:nth-child(6)').textContent.toLowerCase();
    const deleted_at_ar = row_ar.querySelector('td:nth-child(7)').textContent.toLowerCase();

    if (id_ar.includes(searchTerm_ar) || code_ar.includes(searchTerm_ar)
      || division_ar.includes(searchTerm_ar) || floor_number_ar.includes(searchTerm_ar)
      || description_ar.includes(searchTerm_ar) || deleted_at_ar.includes(searchTerm_ar)) {
      row_ar.style.display = '';
    } else {
      row_ar.style.display = 'none';
    }
  });
});

/* View Modal */
function showModal_arpos_view(row_arpos_view) {
  const id_arpos_view = row_arpos_view.cells[1].textContent;
  const code_arpos_view = row_arpos_view.cells[2].textContent;
  const division_arpos_view = row_arpos_view.cells[3].textContent;
  const floor_number_arpos_view = row_arpos_view.cells[4].textContent;
  const description_arpos_view = row_arpos_view.cells[5].textContent;
  const deleted_at_arpos_view = row_arpos_view.cells[6].textContent;
  const modalContent_arpos_view = `
  <div class="eye-modal-archive">
  <h2 class="eye-header-archive">Department Archived</h2>
    <p><strong>ID: </strong>${id_arpos_view}</p>
    <p><strong>Status: </strong><span>Inactive</span></p>
    <p><strong>Code: </strong> ${code_arpos_view}</p>
    <p><strong>Division: </strong> ${division_arpos_view}</p>
    <p><strong>Floor Number: </strong> ${floor_number_arpos_view}</p>
    <p><strong>Description: </strong> ${description_arpos_view}</p>
    <p><strong>Deleted at: </strong><span> ${deleted_at_arpos_view}<span></p>
  </div>
`;
  const modal_arpos_view = document.createElement('div');
  modal_arpos_view.classList.add('modalview');
  modal_arpos_view.innerHTML = modalContent_arpos_view;
  document.body.appendChild(modal_arpos_view);
  modal_arpos_view.addEventListener('click', (event) => {
    if (event.target === modal_arpos_view) {
      modal_arpos_view.remove();
    }
  });
}
const eyeIcons_arpos_view = document.querySelectorAll('.view_pos_archived');
eyeIcons_arpos_view.forEach((icon_arpos_view) => {
  icon_arpos_view.addEventListener('click', (event) => {
    const row_arpos_view = event.target.closest('tr');
    showModal_arpos_view(row_arpos_view);
  });
});

