const menu = document.querySelector('.mobile-nav');
const enquiryType = document.querySelector('#enquiry_type');
if (enquiryType) {
    const documentInputs = [...document.querySelectorAll('.land-documents input[type="file"]')];
    const validateDocuments = () => {
        documentInputs.forEach(input => input.setCustomValidity(''));
        const selected = documentInputs.filter(input => !input.disabled && input.files.length);
        selected.forEach(input => {
            if (input.files[0].size > 2 * 1024 * 1024) {
                input.setCustomValidity('Please select a file no larger than 2 MB.');
            }
        });
        const totalBytes = selected.reduce((total, input) => total + input.files[0].size, 0);
        if (totalBytes > 6 * 1024 * 1024) {
            selected[0].setCustomValidity('Please keep the combined document size within 6 MB.');
        }
    };
    documentInputs.forEach(input => input.addEventListener('change', validateDocuments));
    const updateEnquiryFields = () => {
        document.querySelectorAll('[data-enquiry-panel]').forEach(panel => {
            const active = panel.dataset.enquiryPanel === enquiryType.value;
            panel.hidden = !active;
            panel.querySelectorAll('input').forEach(input => { input.disabled = !active; });
        });
        document.querySelector('#land_location').required = enquiryType.value === 'land_registration';
        validateDocuments();
    };
    enquiryType.addEventListener('change', updateEnquiryFields);
    window.addEventListener('pageshow', updateEnquiryFields);
    updateEnquiryFields();
}
const connectivity = document.querySelector('.connectivity-carousel');
if (connectivity) {
    const track = connectivity.querySelector('.connectivity-cards');
    const cards = [...track.children];
    const status = document.querySelector('.connectivity-status');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const visibleCount = () => window.matchMedia('(max-width: 650px)').matches ? 1 : 2;
    const currentIndex = () => Math.round(track.scrollLeft / (cards[1].offsetLeft - cards[0].offsetLeft));
    const move = direction => {
        const last = cards.length - visibleCount();
        let next = currentIndex() + direction * visibleCount();
        if (next > last) next = 0;
        if (next < 0) next = last;
        track.scrollTo({ left: cards[next].offsetLeft - cards[0].offsetLeft, behavior: reducedMotion.matches ? 'instant' : 'smooth' });
    };
    connectivity.querySelectorAll('[data-connectivity-direction]').forEach(button => {
        button.hidden = false;
        button.addEventListener('click', () => move(Number(button.dataset.connectivityDirection)));
    });
    track.addEventListener('keydown', event => {
        if (event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') return;
        event.preventDefault();
        move(event.key === 'ArrowRight' ? 1 : -1);
    });
    const updateStatus = () => {
        const first = Math.max(0, Math.min(currentIndex(), cards.length - visibleCount()));
        status.textContent = `Destinations ${first + 1}–${Math.min(first + visibleCount(), cards.length)} of ${cards.length}`;
    };
    track.addEventListener('scroll', updateStatus, { passive: true });
    window.addEventListener('resize', updateStatus);
    updateStatus();
}
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
