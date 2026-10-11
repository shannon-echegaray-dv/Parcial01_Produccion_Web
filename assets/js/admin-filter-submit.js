const form = document.getElementById('admin-filter-form');

if (form) {
    form.querySelectorAll('select').forEach((select) => {
        select.addEventListener('change', () => form.requestSubmit());
    });
}
