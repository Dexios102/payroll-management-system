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
  const archiveBtn = document.getElementById('archive-button');
  tables.forEach(table => {
    table.classList.remove('active');
  });
  generateSlip.classList.remove('active');
  allBtn.classList.remove('active');
  archiveBtn.classList.remove('active');
  const tableToShow = document.getElementById(tableId);
  tableToShow.classList.add('active');
  if (tableId === 'window-generate') {
    generateSlip.classList.add('active');
  } else if (tableId === 'table-all') {
    allBtn.classList.add('active');
  } else if (tableId === 'table-archived') {
    archiveBtn.classList.add('active');
  }
}