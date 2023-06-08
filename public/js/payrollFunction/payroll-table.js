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