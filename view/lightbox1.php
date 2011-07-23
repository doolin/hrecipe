<?php

// Do some javascript checking with jslint:
// http://www.crockford.com/javascript/
/* This is the form entry page that is used by hrecipe.php */
// BOGUS!  These paths need to be redone, correctly.
// http://ottodestruct.com/blog/2010/dont-include-wp-load-please/
// http://ottopress.com/2010/passing-parameters-from-php-to-javascripts-in-plugins/

//require_once('../../../../wp-admin/admin.php'); 


function hrecipe_tb_callback() {
  
  if (file_exists('hrecipe_form_body.php')) {?>
    <script type="text/javascript">alert('form body exists');</script>
    <?php
    var_dump('form body exists');
    include('hrecipe_form_body.php');
  } else {?>
    <script type="text/javascript">alert('form body doesn\'t exist');</script>
    <?php
    var_dump('form body does NOT exist');    
  }

}

wp_iframe('hrecipe_tb_callback',array());

//add_action('media_upload_hrecipe', 'hrecipe_tb_callback');

?>