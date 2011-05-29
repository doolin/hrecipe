
function hrecipe_toggle_visibility(id) {

  var e = document.getElementById(id);
  if(e.style.display == 'block')
    e.style.display = 'none';
  else
    e.style.display = 'block';
}

jQuery(document).ready( function($) {

  // close postboxes that should be closed
  $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
  // postboxes setup
  //postboxes.add_postbox_toggles('<?php global $hrecipe_pagehook; echo $hrecipe_pagehook; ?>');
  //postboxes.add_postbox_toggles('settings_page_view/admin/options');
  postboxes.add_postbox_toggles(hrecipe_handle.PageHook);
});

