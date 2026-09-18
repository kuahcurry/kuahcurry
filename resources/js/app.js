// Material Design 3 Web Components
import '@material/web/button/filled-button.js';
import '@material/web/button/outlined-button.js';
import '@material/web/button/text-button.js';
import '@material/web/button/elevated-button.js';
import '@material/web/iconbutton/icon-button.js';
import '@material/web/icon/icon.js';
import '@material/web/chips/chip-set.js';
import '@material/web/chips/assist-chip.js';
import '@material/web/chips/filter-chip.js';
import '@material/web/textfield/outlined-text-field.js';
import '@material/web/divider/divider.js';
import '@material/web/elevation/elevation.js';

// Interactive UI enhancements: Project filtering, Contact Form AJAX, Smooth scrolling
document.addEventListener('DOMContentLoaded', () => {
    // 1. Project Category Filter
    const filterChips = document.querySelectorAll('.project-filter-chip');
    const projectCards = document.querySelectorAll('.project-card');

    if (filterChips.length && projectCards.length) {
        filterChips.forEach(chip => {
            chip.addEventListener('click', () => {
                const category = chip.getAttribute('data-category');
                
                filterChips.forEach(c => c.removeAttribute('selected'));
                chip.setAttribute('selected', '');

                projectCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (category === 'all' || cardCategory === category) {
                        card.classList.remove('hidden');
                        card.classList.add('flex');
                    } else {
                        card.classList.add('hidden');
                        card.classList.remove('flex');
                    }
                });
            });
        });
    }

    // 2. Interactive Contact Form Handler (handles Material Web inputs + JSON response)
    const contactForm = document.getElementById('work-together-form');
    const formAlert = document.getElementById('form-feedback-alert');
    const submitBtn = document.getElementById('submit-inquiry-btn');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Extract values from md-outlined-text-field or standard inputs
            const nameEl = document.getElementById('contact-name');
            const emailEl = document.getElementById('contact-email');
            const subjectEl = document.getElementById('contact-subject');
            const projectTypeEl = document.getElementById('contact-project-type');
            const budgetEl = document.getElementById('contact-budget');
            const messageEl = document.getElementById('contact-message');

            const payload = {
                name: nameEl?.value?.trim() || '',
                email: emailEl?.value?.trim() || '',
                subject: subjectEl?.value?.trim() || '',
                project_type: projectTypeEl?.value || '',
                budget: budgetEl?.value || '',
                message: messageEl?.value?.trim() || '',
                _token: document.querySelector('input[name="_token"]')?.value || '',
            };

            // Basic client-side check
            if (!payload.name || !payload.email || !payload.subject || !payload.message) {
                showFeedback('Please fill in all required fields (Name, Email, Subject, and Message).', 'error');
                return;
            }

            if (submitBtn) {
                submitBtn.setAttribute('disabled', 'true');
            }

            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': payload._token,
                    },
                    body: JSON.stringify(payload),
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    showFeedback(data.message || 'Inquiry transmitted successfully!', 'success');
                    contactForm.reset();
                    if (nameEl) nameEl.value = '';
                    if (emailEl) emailEl.value = '';
                    if (subjectEl) subjectEl.value = '';
                    if (messageEl) messageEl.value = '';
                } else {
                    let errMsg = data.message || 'An error occurred while transmitting your message.';
                    if (data.errors) {
                        errMsg = Object.values(data.errors).flat().join('<br>');
                    }
                    showFeedback(errMsg, 'error');
                }
            } catch (err) {
                showFeedback('Network error. Please try again or reach out directly via email.', 'error');
            } finally {
                if (submitBtn) {
                    submitBtn.removeAttribute('disabled');
                }
            }
        });
    }

    function showFeedback(msg, type) {
        if (!formAlert) return;
        formAlert.innerHTML = msg;
        formAlert.classList.remove('hidden', 'bg-emerald-50', 'text-emerald-900', 'border-emerald-200', 'bg-rose-50', 'text-rose-900', 'border-rose-200');
        
        if (type === 'success') {
            formAlert.classList.add('bg-emerald-50', 'text-emerald-900', 'border-emerald-200');
        } else {
            formAlert.classList.add('bg-rose-50', 'text-rose-900', 'border-rose-200');
        }
        formAlert.classList.remove('hidden');
        formAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // 3. Quick Copy Email Helper
    const copyEmailBtns = document.querySelectorAll('.copy-email-btn');
    copyEmailBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const email = btn.getAttribute('data-email');
            if (email) {
                navigator.clipboard.writeText(email).then(() => {
                    const originalText = btn.getAttribute('data-original-label') || 'Copy Email';
                    btn.setAttribute('label', 'Copied to Clipboard!');
                    setTimeout(() => {
                        btn.setAttribute('label', originalText);
                    }, 2500);
                });
            }
        });
    });
});
