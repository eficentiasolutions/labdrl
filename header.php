<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header">
  <div class="nav-wrap">

    <a href="<?php echo esc_url( home_url('/') ); ?>" class="nav-logo">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <span class="nav-logo-dot"></span>
        <?php bloginfo('name'); ?>
      <?php endif; ?>
    </a>

    <div class="nav-right">
      <?php $email = aivetlab_get('contact_email', 'info@aivetlab.es'); ?>
      <?php if ( $email ) : ?>
      <a href="mailto:<?php echo esc_attr($email); ?>" class="nav-email">
        <svg viewBox="0 0 27 21" xmlns="http://www.w3.org/2000/svg">
          <path d="M24.009 0H2.99C1.341 0 0 1.322 0 2.946v15.108C0 19.679 1.342 21 2.991 21h21.018C25.659 21 27 19.679 27 18.054V2.946C27 1.321 25.658 0 24.009 0zM2.99 1.416h21.018c.16 0 .32.025.474.075l-9.91 9.99a1.502 1.502 0 01-1.073.448c-.406 0-.787-.16-1.073-.447L2.517 1.49c.153-.05.313-.075.474-.075zM1.438 18.054V2.946c0-.151.023-.302.069-.447l8.005 8.07-7.969 8.035a1.495 1.495 0 01-.105-.55zm22.57 1.53H2.992a1.58 1.58 0 01-.366-.044l7.892-7.957.88.888a2.94 2.94 0 002.103.874 2.94 2.94 0 002.103-.874l.88-.888 7.892 7.957a1.545 1.545 0 01-.366.044zm1.554-1.53c0 .189-.036.375-.106.55l-7.968-8.034 8.006-8.071c.045.145.068.295.068.447v15.108z"/>
        </svg>
        <span><?php echo esc_html($email); ?></span>
      </a>
      <?php endif; ?>

      <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Menú principal','aivetlab'); ?>">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'fallback_cb'    => 'aivetlab_fallback_menu',
        ]);
        ?>
      </nav>

      <button class="menu-toggle" id="menu-toggle" aria-label="<?php esc_attr_e('Abrir menú','aivetlab'); ?>">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<nav class="mobile-nav" id="mobile-nav" aria-label="<?php esc_attr_e('Menú móvil','aivetlab'); ?>">
  <?php
  wp_nav_menu([
      'theme_location' => 'primary',
      'container'      => false,
      'fallback_cb'    => 'aivetlab_fallback_menu',
  ]);
  ?>
</nav>

<?php
function aivetlab_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="#inicio">Inicio</a></li>';
    echo '<li><a href="#acerca">Acerca de</a></li>';
    echo '<li><a href="#servicios">Servicios</a></li>';
    echo '<li><a href="#proceso">Cómo funciona</a></li>';
    echo '<li class="menu-item-cta"><a href="#contacto">Contacto</a></li>';
    echo '</ul>';
}
