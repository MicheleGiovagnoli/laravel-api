import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.form_delete_post button[type="submit"]');
deleteButtons.forEach(button => {
    button.addEventListener('click', event => {
        event.preventDefault();
        const modal = document.getElementById('confirmDeleteModal');
        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
        const confirmDeleteBtn = modal.querySelector('.btn.btn-danger')
        confirmDeleteBtn.addEventListener('click', () => {
            button.parentElement.submit();
        });
    })
});
