/* AI VetLab Theme — main.js */
(function($) {
  'use strict';

  /* ── Scroll: sombra en header ── */
  const $header = $('#site-header');
  $(window).on('scroll', function() {
    $header.toggleClass('scrolled', window.scrollY > 10);
  });

  /* ── Menú móvil ── */
  const $toggle  = $('#menu-toggle');
  const $mobileNav = $('#mobile-nav');
  $toggle.on('click', function() {
    $mobileNav.toggleClass('open');
    const isOpen = $mobileNav.hasClass('open');
    $toggle.attr('aria-expanded', isOpen);
  });

  // Cerrar al hacer click en un enlace
  $mobileNav.find('a').on('click', function() {
    $mobileNav.removeClass('open');
    $toggle.attr('aria-expanded', false);
  });

  /* ── Scroll suave ── */
  $(document).on('click', 'a[href^="#"]', function(e) {
    const target = $(this).attr('href');
    if (target === '#') return;
    const $target = $(target);
    if ($target.length) {
      e.preventDefault();
      const offset = $target.offset().top - 68;
      $('html, body').animate({ scrollTop: offset }, 700, 'swing');
      // Actualizar URL sin reload
      if (history.pushState) {
        history.pushState(null, null, target);
      }
    }
  });

  /* ── Scroll reveal ── */
  const $reveals = $('.reveal');
  if ($reveals.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          // Stagger delay para elementos dentro de grids
          const $el = $(entry.target);
          const siblings = $el.parent().children('.reveal').toArray();
          const idx = siblings.indexOf(entry.target);
          setTimeout(function() {
            $el.addClass('in');
          }, idx * 90);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    $reveals.each(function() {
      observer.observe(this);
    });
  } else {
    // Fallback para navegadores sin IntersectionObserver
    $reveals.addClass('in');
  }

  /* ── Active nav link on scroll ── */
  const sections = ['inicio','acerca','servicios','proceso','contacto'];
  const $navLinks = $('.main-navigation a');

  $(window).on('scroll', function() {
    const scrollPos = window.scrollY + 80;
    sections.forEach(function(id) {
      const $section = $('#' + id);
      if ($section.length) {
        const top    = $section.offset().top;
        const bottom = top + $section.outerHeight();
        if (scrollPos >= top && scrollPos < bottom) {
          $navLinks.removeClass('current-menu-item');
          $navLinks.filter('[href="#' + id + '"]').addClass('current-menu-item');
        }
      }
    });
  });

})(jQuery);
