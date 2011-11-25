


  var hrecipe_from_gui;

  function edInsertHRecipe() {
    tb_show("Add an hRecipe", 'media-upload.php?type=hrecipe&tab=hrecipe&amp;TB_iframe=true');
    hrecipe_from_gui = true; // Called from TinyMCE
  }

  function add_hrecipe_quicktag() {
    tb_show("Add an hRecipe", 'media-upload.php?type=hrecipe&tab=hrecipe&amp;TB_iframe=true');
    hrecipe_from_gui = false; // Called from Quicktags
  }

  function hrecipe_make_quicktag() {
    newbutton = document.createElement("input");
    newbutton.type = "button";
    newbutton.id = "ed_hrecipe";
    newbutton.className = "ed_button";
    newbutton.value = "hRecipe";
    newbutton.onclick = add_hrecipe_quicktag;
    hrecipe_qttoolbar.appendChild(newbutton);
  }

  hrecipe_qttoolbar = document.getElementById("ed_toolbar");

  if (hrecipe_qttoolbar !== null) {
    hrecipe_make_quicktag();
  } else {
    QTags.addButton('qt_hrecipe', 'hRecipe', add_hrecipe_quicktag);
  }

  function edInsertHRecipeAbort() {
    tb_remove();
  }
