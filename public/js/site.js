const menu = document.querySelector('.mobile-nav');
menu?.querySelectorAll('a').forEach(link => link.addEventListener('click', () => { menu.open = false; }));
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && menu?.open) {
        menu.open = false;
        menu.querySelector('summary').focus();
    }
});
document.addEventListener('click', event => {
    if (menu?.open && !menu.contains(event.target)) menu.open = false;
});
const errors = document.querySelector('.form-errors');
if (errors) {
    errors.scrollIntoView({ block: 'center' });
    errors.focus({ preventScroll: true });
}

const photoDialog = document.querySelector('.photo-dialog');
if (photoDialog && typeof photoDialog.showModal === 'function') {
    const photo = photoDialog.querySelector('img');
    const caption = photoDialog.querySelector('.photo-caption');
    document.querySelectorAll('.gallery-grid a').forEach(link => {
        link.addEventListener('click', event => {
            if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
            event.preventDefault();
            photo.src = link.href;
            photo.alt = link.querySelector('img').alt;
            caption.textContent = link.closest('figure').querySelector('figcaption').textContent;
            photoDialog.showModal();
        });
    });
    photoDialog.querySelector('.photo-close').addEventListener('click', () => photoDialog.close());
    photoDialog.addEventListener('click', event => {
        if (event.target !== photoDialog) return;
        const bounds = photoDialog.getBoundingClientRect();
        if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) photoDialog.close();
    });
}
