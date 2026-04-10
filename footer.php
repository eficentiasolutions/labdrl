<footer id="site-footer">
  <div class="footer-inner">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="footer-logo">
      <?php bloginfo('name'); ?>
    </a>

    <nav class="footer-nav" aria-label="<?php esc_attr_e('Menú pie de página','aivetlab'); ?>">
      <?php
      wp_nav_menu([
          'theme_location' => 'footer',
          'container'      => false,
          'fallback_cb'    => function() {
              echo '<a href="#servicios">Servicios</a>';
              echo '<a href="#proceso">Cómo funciona</a>';
              echo '<a href="#contacto">Contacto</a>';
          },
      ]);
      ?>
    </nav>

    <div class="footer-copy">
      <?php echo esc_html( aivetlab_get('footer_copy', '© ' . date('Y') . ' AI VetLab · Almoradí, España') ); ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
