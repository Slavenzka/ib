import IMask from 'imask';

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

const phones = document.querySelectorAll('[type="tel"]');

if (phones.length) {
  Array.from(phones).forEach(phone => {
    new IMask(phone, {
      mask: [
        {
          mask: '+000 00 000-00-00',
          startsWith: '38',
          country: 'Ukraine'
        },
        {
          mask: '+0 000 000-00-00',
          startsWith: '7',
          country: 'Russia'
        },
        {
          mask: '+0 000 000-0000',
          startsWith: '1',
          country: 'USA'
        },
        {
          mask: '+0000000000000',
          startsWith: '',
          country: 'unknown'
        }
      ]
    })
  })
}
