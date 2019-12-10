export default (el, binding) => {
  const target = document.querySelector('#' + binding.value.replace('#'));

  if (target) {
    const offset = target.getBoundingClientRect();

    el.addEventListener('click', function(e) {
      e.preventDefault();
      window.scroll({ top: offset.top, behavior: 'smooth' })
    });
  }
}
