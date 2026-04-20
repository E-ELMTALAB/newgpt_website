document.addEventListener('DOMContentLoaded', () => {
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
