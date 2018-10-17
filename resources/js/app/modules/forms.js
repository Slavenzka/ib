const controls = document.querySelectorAll('.control__input');

if (controls.length) {
    Array.from(controls).forEach(c => {
        let el;

        c.addEventListener('focus', (e) => {
            el = e.target;
            if (e.target.value === '') {
                e.target.parentNode.classList.add('is-focused');
            }
        });

        c.addEventListener('focusout', (e) => {
            if (e.target.value === '') {
                e.target.parentNode.classList.remove('is-focused');
            }
        })
    })
}
