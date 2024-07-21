document.addEventListener('DOMContentLoaded', function () {
  const editBtn = document.getElementById('editBtn');
  const deleteBtn = document.getElementById('deleteBtn');
  const checkboxes = document.querySelectorAll('.checkbox');
  const deleteForm = document.getElementById('deleteForm');

  editBtn.addEventListener('click', function () {
    deleteForm.classList.toggle('edit-mode');
  });

  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      const anyChecked = Array.from(checkboxes).some(c => c.checked);
      if (anyChecked) {
        deleteBtn.classList.add('active');
      } else {
        deleteBtn.classList.remove('active');
      }
    });
  });

  deleteBtn.addEventListener('click', function () {
    deleteForm.submit();
  });
});
