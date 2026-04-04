document.addEventListener('DOMContentLoaded', function () {
    const toast = document.querySelector('.toast');
    if (toast) {
        setTimeout(() => {
            toast.classList.add('hide');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }

    const deleteButtons = document.querySelectorAll('.btn-delete');
    const modal = document.getElementById('deleteModal');
    const cancelBtn = document.getElementById('cancelBtn');
    const confirmBtn = document.getElementById('confirmBtn');
    let deleteId = null;

    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            deleteId = this.getAttribute('data-id');
            modal.classList.add('show');
        });
    });

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function () {
            modal.classList.remove('show');
        });
    }

    if (confirmBtn) {
        confirmBtn.addEventListener('click', function () {
            if (deleteId) {
                window.location.href = `delete.php?id=${deleteId}`;
            }
        });
    }

    // Close modal on outside click
    if (modal) {
        window.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });
    }
});