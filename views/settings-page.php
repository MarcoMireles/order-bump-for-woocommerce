<h1>Hello settings-page</h1>

<?php

?>
<pre></pre>

<section>
  <div class="container mx-auto px-4">
    <form action="options.php" method="post">

      <?php
      settings_fields('sob_group');
      do_settings_sections('sob_page1');

      submit_button(esc_html__('Save Settings','sob'));

      ?>

    </form>
  </div>
</section>