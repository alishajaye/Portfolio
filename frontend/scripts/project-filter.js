const filter = document.querySelector('[data-module="projects"] .filter');

if (filter) {
  const buttons = filter.querySelectorAll('.filter__button');
  const projects = document.querySelectorAll('[data-module="projects"] .project');

  const applyFilter = (value) => {
    buttons.forEach((button) => {
      button.setAttribute('aria-pressed', String(button.dataset.filter === value));
    });

    projects.forEach((project) => {
      const categories = (project.dataset.categories || '').split(' ');
      project.hidden = !(value === 'all' || categories.includes(value));
    });
  };

  filter.addEventListener('click', (event) => {
    const button = event.target.closest('.filter__button');
    if (button) {
      applyFilter(button.dataset.filter);
    }
  });
}
