const menuButton = document.querySelector('[data-admin-menu]');
if (menuButton) {
    const sidebar = menuButton.closest('.sidebar');
    const navigation = document.getElementById(menuButton.getAttribute('aria-controls'));
    const mobile = window.matchMedia('(max-width: 900px)');
    const setMenu = open => {
        navigation.hidden = !open;
        sidebar.classList.toggle('menu-open', open);
        menuButton.setAttribute('aria-expanded', String(open));
    };
    menuButton.addEventListener('click', () => setMenu(navigation.hidden));
    mobile.addEventListener('change', () => setMenu(!mobile.matches));
    sidebar.addEventListener('keydown', event => {
        if (event.key === 'Escape' && mobile.matches) {
            setMenu(false);
            menuButton.focus();
        }
    });
    setMenu(!mobile.matches);
}

const uploadForm = document.querySelector('.admin-document-form');
if (uploadForm) {
    const inputs = [...uploadForm.querySelectorAll('input[type="file"]')];
    const validateUploads = () => {
        inputs.forEach(input => input.setCustomValidity(''));
        const selected = inputs.filter(input => input.files.length);
        selected.forEach(input => {
            if (input.files[0].size > 2 * 1024 * 1024) {
                input.setCustomValidity('Please select a file no larger than 2 MB.');
            }
        });
        const total = selected.reduce((sum, input) => sum + input.files[0].size, 0);
        if (total > 6 * 1024 * 1024) {
            selected[0].setCustomValidity('Please keep the combined document size within 6 MB per upload.');
        }
        if (!selected.length) inputs[0].setCustomValidity('Select at least one document to upload.');
    };
    inputs.forEach(input => input.addEventListener('change', validateUploads));
    window.addEventListener('pageshow', validateUploads);
    validateUploads();
}
