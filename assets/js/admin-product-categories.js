function initSelectsForm() {
    const form = document.querySelector('form:has(#category-select)');
    const categorySelect = form?.querySelector('#category-select');
    const subcategorySelect = form?.querySelector('#subcategory-select');
    
    if (!subcategorySelect) {
        return;
    }
    
    const subcategoryOptions = Array.from(subcategorySelect.options).filter((option) => option.dataset.parentCategory);
    
    const updateSubcategories = () => {
        const selectedCategory = categorySelect.value;
    
        subcategorySelect.disabled = selectedCategory === '';
    
        subcategoryOptions.forEach((option) => {
            const belongsToSelectedCategory = option.dataset.parentCategory === selectedCategory;
            option.hidden = !belongsToSelectedCategory;
            option.disabled = !belongsToSelectedCategory;
        });
    
        const selectedOption = subcategorySelect.selectedOptions[0];
        if (selectedOption?.dataset.parentCategory !== selectedCategory) {
            subcategorySelect.value = '';
        }
    };
    
    categorySelect.addEventListener('change', () => {
        subcategorySelect.value = '';
        updateSubcategories();
    });
    
    updateSubcategories();
}

initSelectsForm();
