document.querySelectorAll('[data-password-toggle]').forEach(button => {
    button.hidden = false;
    button.addEventListener('click', () => {
        const input = document.getElementById(button.dataset.passwordToggle);
        const showing = input.type === 'password';
        input.type = showing ? 'text' : 'password';
        button.setAttribute('aria-pressed', String(showing));
        button.setAttribute('aria-label', showing ? 'Hide password' : 'Show password');
    });
});

const form = document.querySelector('[data-partner-registration]');
if (form) {
    const agencyField = form.querySelector('[data-agency-field]');
    const agencyInput = form.elements.agency_name;
    const password = form.elements.password;
    const confirmation = form.elements.password_confirmation;
    const submit = form.querySelector('[type=submit]');
    const feedback = form.querySelector('[data-registration-feedback]');
    const update = () => {
        const agency = form.elements.partner_type.value === 'agency';
        agencyField.hidden = !agency;
        agencyInput.disabled = !agency;
        agencyInput.required = agency;
        confirmation.setCustomValidity(confirmation.value && confirmation.value !== password.value ? 'Passwords must match.' : '');
        // Keep the action available so validation can explain what needs fixing.
        submit.disabled = false;
        feedback.hidden = true;
    };
    // Validate on submission, including fields populated by browser autofill.
    form.noValidate = true;
    form.addEventListener('submit', event => {
        update();
        if (!form.reportValidity()) {
            event.preventDefault();
            const invalid = Array.from(form.elements).find(input => input.willValidate && !input.validity.valid);
            const label = invalid?.labels?.[0]?.textContent.trim().replace(/\s*\*\s*$/, '');
            feedback.textContent = `${label ? label + ': ' : ''}${invalid?.validationMessage || 'Please complete all required fields and accept the terms.'}`;
            feedback.hidden = false;
        }
    });
    form.addEventListener('input', update);
    form.addEventListener('change', update);
    window.addEventListener('pageshow', update);
    update();
}

const termsDialog = document.querySelector('.terms-dialog');
if (termsDialog && typeof termsDialog.showModal === 'function') {
    const consent = form.elements.terms;
    const status = document.querySelector('[data-terms-status]');
    const openTerms = () => {
        termsDialog.showModal();
        termsDialog.querySelector('.terms-scroll').scrollTop = 0;
    };
    const updateTermsStatus = () => {
        status.textContent = consent.checked ? 'Terms accepted. Your acceptance will be saved when you create your account.' : 'Read the terms and select Accept & Continue before creating your account.';
    };
    document.querySelector('[data-open-terms]').addEventListener('click', event => {
        event.preventDefault();
        openTerms();
    });
    consent.addEventListener('click', event => {
        if (consent.checked) {
            event.preventDefault();
            openTerms();
        }
    });
    consent.addEventListener('change', updateTermsStatus);
    termsDialog.querySelectorAll('[data-close-terms]').forEach(button => button.addEventListener('click', () => termsDialog.close()));
    termsDialog.querySelector('[data-accept-terms]').addEventListener('click', () => {
        consent.checked = true;
        consent.dispatchEvent(new Event('change', { bubbles: true }));
        termsDialog.close();
        form.querySelector('[type=submit]').focus();
    });
    updateTermsStatus();
}
document.querySelector('.errors')?.focus();
