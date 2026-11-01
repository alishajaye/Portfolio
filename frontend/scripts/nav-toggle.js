const header = document.querySelector('[data-layout="header"]');
const toggle = header ? header.querySelector('.nav-toggle') : null;

if (header && toggle) {
  const setOpen = (open) => {
    header.classList.toggle('is-open', open);
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Menü schliessen' : 'Menü öffnen');
  };

  toggle.addEventListener('click', () => {
    setOpen(toggle.getAttribute('aria-expanded') !== 'true');
  });

  // Menü schliessen: Escape-Taste
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      setOpen(false);
    }
  });

  // Menü schliessen: Klick ausserhalb des Headers
  document.addEventListener('click', (event) => {
    if (!header.contains(event.target)) {
      setOpen(false);
    }
  });

  // Menü schliessen: Klick auf einen Menüpunkt
  header.querySelectorAll('.site-navigation a').forEach((link) => {
    link.addEventListener('click', () => setOpen(false));
  });

  // Menü schliessen: Fenster wird gross genug für das normale Menü
  window.matchMedia('(min-width: 1025px)').addEventListener('change', (event) => {
    if (event.matches) {
      setOpen(false);
    }
  });
}