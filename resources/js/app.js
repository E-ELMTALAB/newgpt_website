document.addEventListener('DOMContentLoaded', () => {
    const navToggle = document.querySelector('[data-nav-toggle]');
    const mainNav = document.querySelector('[data-main-nav]');

    if (navToggle && mainNav) {
        navToggle.addEventListener('click', () => {
            const isOpen = mainNav.classList.toggle('is-open');
            navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        mainNav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                mainNav.classList.remove('is-open');
                navToggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    const sections = document.querySelectorAll('[data-collapsible]');

    sections.forEach((section) => {
        const content = section.querySelector('[data-collapsible-content]');
        const toggle = section.querySelector('[data-collapsible-toggle]');

        if (!content || !toggle) return;

        toggle.addEventListener('click', () => {
            const isOpen = content.classList.toggle('is-open');
            toggle.textContent = isOpen ? 'بستن توضیحات' : 'مشاهده توضیحات کامل';
        });
    });
});
