<?php get_header(); ?>

<main id="main-content">

<!-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ -->
<?php
$hero_image = aivetlab_get('hero_image');
$hero_style = $hero_image
    ? 'background-image: linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.35)), url(' . esc_url($hero_image) . ');'
    : 'background-image: linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.45));';
?>
<section class="hero-section" id="inicio" style="<?php echo $hero_style; ?>">
  <div class="hero-inner">
    <div class="hero-label">
      <?php echo esc_html( aivetlab_get('hero_label', 'Laboratorio veterinario · Inteligencia Artificial') ); ?>
    </div>
    <h1 class="hero-title">
      <?php echo esc_html( aivetlab_get('hero_title', 'Gestión de muestras veterinarias') ); ?>
    </h1>
    <p class="hero-sub">
      <?php echo esc_html( aivetlab_get('hero_subtitle', 'Rápido, eficaz y económico. Sin necesidad de visita al veterinario.') ); ?>
    </p>
    <div class="hero-btns">
      <a href="<?php echo esc_url( aivetlab_get('hero_btn1_url', '#servicios') ); ?>" class="btn btn-blue">
        <?php echo esc_html( aivetlab_get('hero_btn1_text', 'Ver servicios') ); ?>
      </a>
      <a href="<?php echo esc_url( aivetlab_get('hero_btn2_url', '#contacto') ); ?>" class="btn btn-ghost">
        <?php echo esc_html( aivetlab_get('hero_btn2_text', 'Contactar') ); ?>
      </a>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     ABOUT
══════════════════════════════════════ -->
<section class="section" id="acerca">
  <div class="section-inner">
    <div class="about-grid">

      <div class="about-img-wrap reveal">
        <?php $about_img = aivetlab_get('about_image'); ?>
        <?php if ( $about_img ) : ?>
          <img src="<?php echo esc_url($about_img); ?>" alt="<?php esc_attr_e('Acerca de AI VetLab','aivetlab'); ?>">
        <?php else : ?>
          <img src="https://cdn.b12.io/client_media/ozkqzIVU/123bd902-0521-11f1-b1eb-0242ac110002-jpg-hero_image.jpeg"
               alt="<?php esc_attr_e('Veterinaria','aivetlab'); ?>">
        <?php endif; ?>
        <div class="about-img-badge">
          <span class="num"><?php echo esc_html( aivetlab_get('about_badge_num','4') ); ?></span>
          <span class="lbl"><?php echo esc_html( aivetlab_get('about_badge_lbl','Pasos simples') ); ?></span>
        </div>
      </div>

      <div class="about-content reveal">
        <div class="section-label">
          <?php echo esc_html( aivetlab_get('about_label','Acerca de nosotros') ); ?>
        </div>
        <h2 class="section-title section-title-blue">
          <?php echo esc_html( aivetlab_get('about_title','Innovación en análisis veterinarios') ); ?>
        </h2>
        <p class="section-subtitle">
          <?php echo esc_html( aivetlab_get('about_subtitle','Gestión eficiente de muestras') ); ?>
        </p>
        <p class="section-text">
          <?php echo esc_html( aivetlab_get('about_text1','En AI VetLab, transformamos la forma en que se gestionan las muestras biológicas de tus animales de compañía. Con un enfoque en la rapidez y la eficacia, ofrecemos un servicio que no requiere la intervención directa de un veterinario.') ); ?>
        </p>
        <p class="section-text" style="margin-top:.9rem">
          <?php echo esc_html( aivetlab_get('about_text2','Nuestro sistema permite la recepción, gestión y envío de muestras como sangre y orina a laboratorios concertados, facilitando el acceso a análisis diagnósticos. Además, proporcionamos interpretación de resultados mediante inteligencia artificial.') ); ?>
        </p>
        <div class="about-pills">
          <span class="pill">
            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/></svg>
            <?php _e('Análisis precisos','aivetlab'); ?>
          </span>
          <span class="pill">
            <svg viewBox="0 0 24 24"><path d="M13 2.05v2.02c3.95.49 7 3.85 7 7.93 0 3.21-1.81 6-4.72 7.72L13 17v5h5l-1.22-1.22C19.91 19.07 22 15.76 22 12c0-5.18-3.95-9.45-9-9.95zM11 2.05C5.95 2.55 2 6.82 2 12c0 3.76 2.09 7.07 5.22 8.78L6 22h5V2.05z"/></svg>
            <?php _e('Resultados rápidos','aivetlab'); ?>
          </span>
          <span class="pill">
            <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
            <?php _e('Interpretación con IA','aivetlab'); ?>
          </span>
          <span class="pill">
            <svg viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg>
            <?php _e('Económico','aivetlab'); ?>
          </span>
        </div>
        <div class="about-cta">
          <a href="#contacto" class="btn btn-blue"><?php _e('Hablar con nosotros','aivetlab'); ?></a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     SERVICIOS (CPT)
══════════════════════════════════════ -->
<section class="section section-alt" id="servicios">
  <div class="section-inner">
    <div class="services-header">
      <div>
        <div class="section-label"><?php _e('Nuestros servicios','aivetlab'); ?></div>
        <h2 class="section-title section-title-blue"><?php _e('Análisis rápidos','aivetlab'); ?></h2>
        <p class="section-text"><?php _e('Acceso fácil y efectivo a diagnósticos veterinarios','aivetlab'); ?></p>
      </div>
    </div>

    <div class="services-grid">
      <?php
      $servicios = new WP_Query([
          'post_type'      => 'servicio',
          'posts_per_page' => 3,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
      ]);

      if ( $servicios->have_posts() ) :
          $num = 1;
          while ( $servicios->have_posts() ) : $servicios->the_post(); ?>
          <div class="svc-card reveal">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('aivetlab-service', ['class'=>'svc-img','alt'=>get_the_title()]); ?>
            <?php endif; ?>
            <div class="svc-body">
              <span class="svc-num"><?php printf('%02d — Servicio', $num); ?></span>
              <div class="svc-title"><?php the_title(); ?></div>
              <p class="svc-desc"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
            </div>
            <a href="#contacto" class="svc-link">
              <?php _e('Saber más','aivetlab'); ?>
              <svg viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
            </a>
          </div>
          <?php $num++; endwhile; wp_reset_postdata();

      else :
          // Fallback si no hay CPTs creados aún
          $fallback = [
              ['Recepción de muestras biológicas','Gestión eficiente de muestras de sangre y orina con el máximo cuidado y en condiciones óptimas.','https://cdn.b12.io/client_media/ozkqzIVU/14646c64-0521-11f1-8381-0242ac110002-jpg-regular_image.jpeg'],
              ['Envío de muestras a laboratorios','Transporte seguro y confiable de muestras a nuestros laboratorios concertados. Cadena de custodia garantizada.','https://cdn.b12.io/client_media/ozkqzIVU/142bd9e5-0521-11f1-a4ca-0242ac110002-jpg-regular_image.jpeg'],
              ['Interpretación de resultados con IA','Comprende los informes de análisis diagnósticos de forma clara y precisa gracias a nuestra tecnología de inteligencia artificial.','https://cdn.b12.io/client_media/ozkqzIVU/144ccafe-0521-11f1-9ee7-0242ac110002-jpg-regular_image.jpeg'],
          ];
          foreach ( $fallback as $i => $s ) : ?>
          <div class="svc-card reveal">
            <img class="svc-img" src="<?php echo esc_url($s[2]); ?>" alt="<?php echo esc_attr($s[0]); ?>">
            <div class="svc-body">
              <span class="svc-num"><?php printf('%02d — Servicio', $i+1); ?></span>
              <div class="svc-title"><?php echo esc_html($s[0]); ?></div>
              <p class="svc-desc"><?php echo esc_html($s[1]); ?></p>
            </div>
            <a href="#contacto" class="svc-link">
              <?php _e('Saber más','aivetlab'); ?>
              <svg viewBox="0 0 24 24"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
            </a>
          </div>
          <?php endforeach;
      endif; ?>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     PROCESO (CPT)
══════════════════════════════════════ -->
<section class="section section-dark" id="proceso">
  <div class="section-inner">
    <div class="process-header">
      <div class="section-label section-label-white"><?php _e('Cómo funciona','aivetlab'); ?></div>
      <h2 class="section-title section-title-white"><?php _e('Proceso sencillo','aivetlab'); ?></h2>
      <p style="font-size:1rem;color:rgba(255,255,255,.5);font-weight:400"><?php _e('Análisis de muestras en 4 pasos','aivetlab'); ?></p>
    </div>

    <div class="process-steps">
      <?php
      $pasos = new WP_Query([
          'post_type'      => 'paso',
          'posts_per_page' => 4,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
      ]);

      if ( $pasos->have_posts() ) :
          $n = 1;
          while ( $pasos->have_posts() ) : $pasos->the_post(); ?>
          <div class="step reveal">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('aivetlab-step', ['class'=>'step-img','alt'=>get_the_title()]); ?>
            <?php endif; ?>
            <div class="step-num"><?php printf('%02d', $n); ?></div>
            <div class="step-title"><?php the_title(); ?></div>
            <p class="step-desc"><?php echo wp_trim_words( get_the_excerpt(), 22 ); ?></p>
          </div>
          <?php $n++; endwhile; wp_reset_postdata();

      else :
          $steps = [
              ['Recepción de muestras','Los dueños traen las muestras biológicas a nuestras instalaciones en Almoradí. Recepción rápida y profesional.','https://cdn.b12.io/client_media/ozkqzIVU/150f5b89-0521-11f1-b60f-0242ac110002-jpg-regular_image.jpeg'],
              ['Gestión de muestras','Etiquetado, documentación y preparación para envío. Sistema rastreable con cadena de custodia garantizada.','https://cdn.b12.io/client_media/ozkqzIVU/14d772a8-0521-11f1-be71-0242ac110002-jpg-regular_image.jpeg'],
              ['Envío a laboratorios','Enviamos a laboratorios especializados usando métodos seguros. Colaboramos con laboratorios de confianza.','https://cdn.b12.io/client_media/ozkqzIVU/14fabdcd-0521-11f1-811a-0242ac110002-jpg-regular_image.jpeg'],
              ['Interpretación de resultados','Usamos inteligencia artificial para desglosar y explicar los resultados de forma comprensible para ti.','https://cdn.b12.io/client_media/ozkqzIVU/152cb98e-0521-11f1-b337-0242ac110002-jpg-regular_image.jpeg'],
          ];
          foreach ( $steps as $i => $s ) : ?>
          <div class="step reveal">
            <img class="step-img" src="<?php echo esc_url($s[2]); ?>" alt="<?php echo esc_attr($s[0]); ?>">
            <div class="step-num"><?php printf('%02d', $i+1); ?></div>
            <div class="step-title"><?php echo esc_html($s[0]); ?></div>
            <p class="step-desc"><?php echo esc_html($s[1]); ?></p>
          </div>
          <?php endforeach;
      endif; ?>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════
     CONTACTO
══════════════════════════════════════ -->
<section class="section" id="contacto">
  <div class="section-inner">
    <div class="contact-grid">

      <div class="reveal">
        <div class="section-label"><?php _e('Contacto','aivetlab'); ?></div>
        <p class="contact-info-title"><?php _e('Conéctate con nosotros','aivetlab'); ?></p>
        <p class="contact-info-sub"><?php _e('Estamos aquí para ayudarte','aivetlab'); ?></p>

        <?php $email = aivetlab_get('contact_email'); ?>
        <?php if ( $email ) : ?>
        <div class="cinfo-row">
          <div class="cinfo-label"><?php _e('Email','aivetlab'); ?></div>
          <div class="cinfo-value">
            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
          </div>
        </div>
        <?php endif; ?>

        <?php
        $city    = aivetlab_get('contact_city','Almoradí');
        $state   = aivetlab_get('contact_state','Valencia');
        $country = aivetlab_get('contact_country','España');
        $maps_url = 'https://www.google.com/maps/place/' . urlencode("$city $state $country");
        ?>
        <div class="cinfo-row">
          <div class="cinfo-label"><?php _e('Ubicación','aivetlab'); ?></div>
          <div class="cinfo-value">
            <a href="<?php echo esc_url($maps_url); ?>" target="_blank" rel="noreferrer">
              <?php echo esc_html("$city, $state, $country"); ?>
            </a>
          </div>
        </div>

        <div class="cinfo-row">
          <div class="cinfo-label"><?php _e('Horario','aivetlab'); ?></div>
          <table class="hours-table">
            <tr><td><?php _e('Lunes','aivetlab'); ?></td><td>9:00am – 10:00pm</td></tr>
            <tr><td><?php _e('Martes','aivetlab'); ?></td><td>9:00am – 10:00pm</td></tr>
            <tr><td><?php _e('Miércoles','aivetlab'); ?></td><td>9:00am – 10:00pm</td></tr>
            <tr><td><?php _e('Jueves','aivetlab'); ?></td><td>9:00am – 10:00pm</td></tr>
            <tr><td><?php _e('Viernes','aivetlab'); ?></td><td>9:00am – 10:00pm</td></tr>
            <tr><td><?php _e('Sábado','aivetlab'); ?></td><td>9:00am – 6:00pm</td></tr>
            <tr><td><?php _e('Domingo','aivetlab'); ?></td><td>9:00am – 12:00pm</td></tr>
          </table>
        </div>
      </div>

      <div class="reveal">
        <div class="form-card">
          <?php
          $cf7_id = aivetlab_get('contact_cf7_id');
          if ( $cf7_id && function_exists('wpcf7_contact_form') ) :
              echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_id) . '" title="Contacto"]');
          else : ?>
            <p style="font-size:.9rem;color:var(--text);padding:1rem;background:var(--off-white);border-radius:4px;border-left:3px solid var(--blue);">
              <strong><?php _e('Para activar el formulario:','aivetlab'); ?></strong><br>
              1. <?php _e('Instala el plugin <em>Contact Form 7</em>.','aivetlab'); ?><br>
              2. <?php _e('Crea un formulario de contacto.','aivetlab'); ?><br>
              3. <?php _e('Copia el ID del formulario en <strong>Apariencia → Personalizar → Contacto → ID del formulario CF7</strong>.','aivetlab'); ?>
            </p>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>
