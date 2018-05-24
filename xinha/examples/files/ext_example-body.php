<?php 
  switch(@$_REQUEST['DocType'])
  {
    
    case 'quirks':
      break;
      
   case 'almost':
      echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
      break;
    
    case 'standards':
    default:
      echo '<!DOCTYPE html>';
      break;
      
  }
?>
<html>
<head>

  <!-- ---------------------------------------------------------------------
    --  $HeadURL: http://svn.xinha.org/branches/MootoolsFileManager-Update/examples/files/ext_example-body.html $
    --  $LastChangedDate: 2008-10-13 06:42:42 +1300 (Mon, 13 Oct 2008) $
    --  $LastChangedRevision: 1084 $
    --  $LastChangedBy: ray $
    ------------------------------------------------------------------------ -->

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Example of Xinha</title>
  <link rel="stylesheet" type="text/css" href="full_example.css" />

  <script type="text/javascript">
    function showError( sMsg, sUrl, sLine){
      document.getElementById('errors').value += 'Error: ' + sMsg + '\n' +
                                                 'Source File: ' + sUrl + '\n' +
                                                 'Line: ' + sLine + '\n';
      return false;
    }
    // You must set _editor_url to the URL (including trailing slash) where
    // where xinha is installed, it's highly recommended to use an absolute URL
    //  eg: _editor_url = "/path/to/xinha/";
    // You may try a relative URL if you wish]
    //  eg: _editor_url = "../";
    // in this example we do a little regular expression to find the absolute path.
    _editor_url  = document.location.href.replace(/examples\/files\/ext_example-body\.php.*/, '')
    //moved _editor_lang & _editor_skin to init function because of error thrown when frame document not ready
  </script>

  <!-- Load up the actual editor core -->
  <script type="text/javascript" src="../../XinhaCore.js"></script>

  <script type="text/javascript">
    xinha_editors = null;
    xinha_init    = null;
    xinha_config  = null;
    xinha_plugins = null;

    xinha_init = xinha_init ? xinha_init : function() {
      window.onerror = showError;
      document.onerror = showError;

      var f = top.frames["menu"].document.forms["fsettings"];
      _editor_lang = f.lang[f.lang.selectedIndex].value; // the language we need to use in the editor.
      _editor_skin = f.skin[f.skin.selectedIndex].value; // the skin we use in the editor
      _editor_icons = f.icons[f.icons.selectedIndex].value;
      
// What are the plugins you will be using in the editors on this page.
// List all the plugins you will need, even if not all the editors will use all the plugins.
      xinha_plugins = [ ];
      for(var x = 0; x < f.plugins.length; x++) {
        if(f.plugins[x].checked) xinha_plugins.push(f.plugins[x].value);
      }

      // THIS BIT OF JAVASCRIPT LOADS THE PLUGINS, NO TOUCHING  :)
      if(!Xinha.loadPlugins(xinha_plugins, xinha_init)) return;

// What are the names of the textareas you will be turning into editors?
      var num = 1;
      num = parseInt(f.num.value);
      if(isNaN(num)) {
        num = 1;
        f.num.value = 1;
      }
      var dest = document.getElementById("editors_here");
      var lipsum = window.parent.menu.document.getElementById('myTextarea0').value;

      xinha_editors = [ ]
      for(var x = 0; x < num; x++) {
        var ta = 'myTextarea' + x;
        xinha_editors.push(ta);

        var div = document.createElement('div');
        div.className = 'area_holder';

        var txta = document.createElement('textarea');
        txta.id   = ta;
        txta.name = ta;
        txta.value = lipsum;
        txta.style.width="100%";
        txta.style.height="420px";

        div.appendChild(txta);
        dest.appendChild(div);
      }

// Create a default configuration to be used by all the editors.
      settings = top.frames["menu"].settings;
      xinha_config = new Xinha.Config();
      xinha_config.width = settings.width;
      xinha_config.height = settings.height;
      xinha_config.sizeIncludesBars = settings.sizeIncludesBars;
      xinha_config.sizeIncludesPanels = settings.sizeIncludesPanels;
      xinha_config.statusBar = settings.statusBar;
      xinha_config.htmlareaPaste = settings.htmlareaPaste;
      xinha_config.mozParaHandler = settings.mozParaHandler;
      xinha_config.getHtmlMethod = settings.getHtmlMethod;
      xinha_config.undoSteps = settings.undoSteps;
      xinha_config.undoTimeout = settings.undoTimeout;
      xinha_config.changeJustifyWithDirection = settings.changeJustifyWithDirection;
      xinha_config.fullPage = settings.fullPage;
      xinha_config.pageStyle = settings.pageStyle;
      xinha_config.baseHref = settings.baseHref;
      xinha_config.expandRelativeUrl = settings.expandRelativeUrl;
      xinha_config.stripBaseHref = settings.stripBaseHref;
      xinha_config.stripSelfNamedAnchors = settings.stripSelfNamedAnchors;
      xinha_config.only7BitPrintablesInURLs = settings.only7BitPrintablesInURLs;
      xinha_config.sevenBitClean = settings.sevenBitClean;
      xinha_config.killWordOnPaste = settings.killWordOnPaste;
      xinha_config.makeLinkShowsTarget = settings.makeLinkShowsTarget;
      xinha_config.flowToolbars = settings.flowToolbars;
      xinha_config.stripScripts = settings.stripScripts;
      xinha_config.flowToolbars = settings.flowToolbars;
      xinha_config.showLoading = settings.showLoading;
      xinha_config.pageStyleSheets = ["full_example.css"];

// Create a default configuration for the plugins
      if (typeof CharCounter != 'undefined') {
        xinha_config.CharCounter.showChar = settings.showChar;
        xinha_config.CharCounter.showWord = settings.showWord;
        xinha_config.CharCounter.showHtml = settings.showHtml;
      }

      if(typeof CharacterMap != 'undefined') xinha_config.CharacterMap.mode = settings.CharacterMapMode;
      if(typeof ListType != 'undefined') xinha_config.ListType.mode = settings.ListTypeMode;
      if(typeof CSSDropDowns != 'undefined') xinha_config.pageStyle = xinha_config.pageStyle + "\n" + "@import url(custom.css);";
      if(typeof DynamicCSS != 'undefined') xinha_config.pageStyle = "@import url(dynamic.css);";
      if(typeof Filter != 'undefined') xinha_config.Filters = ["Word", "Paragraph"];

      if(typeof Stylist != 'undefined') {
        // We can load an external stylesheet like this - NOTE : YOU MUST GIVE AN ABSOLUTE URL
        //  otherwise it won't work!
        xinha_config.stylistLoadStylesheet(document.location.href.replace(/[^\/]*\.html/, 'stylist.css'));

        // Or we can load styles directly
        xinha_config.stylistLoadStyles('p.red_text { color:red }');

        // If you want to provide "friendly" names you can do so like
        // (you can do this for stylistLoadStylesheet as well)
        xinha_config.stylistLoadStyles('p.pink_text { color:pink }', {'p.pink_text' : 'Pretty Pink'});
      }

      if(typeof InsertWords != 'undefined') {
        // Register the keyword/replacement list
        var keywrds1 = new Object();
        var keywrds2 = new Object();

        keywrds1['-- Dropdown Label --'] = '';
        keywrds1['onekey'] = 'onevalue';
        keywrds1['twokey'] = 'twovalue';
        keywrds1['threekey'] = 'threevalue';

        keywrds2['-- Insert Keyword --'] = '';
        keywrds2['Username'] = '%user%';
        keywrds2['Last login date'] = '%last_login%';
        xinha_config.InsertWords = {
          combos : [ { options: keywrds1, context: "body" },
                     { options: keywrds2, context: "li" } ]
        }
      }


      if(typeof MootoolsFileManager != 'undefined')
      {
        with (xinha_config.MootoolsFileManager)
        { 
          <?php 
            require_once('../../contrib/php-xinha.php');
            xinha_pass_to_php_backend
            (       
              array
              (
                'images_dir' => getcwd() . '/../images',
                'images_url' => preg_replace('/\/examples.*/', '', $_SERVER['REQUEST_URI']) . '/examples/images',
                'images_allow_upload' => false,
                'images_allow_delete' => false,
                'images_allow_download' => true,
                'images_use_hspace_vspace' => false,
                
                'files_dir' => getcwd() . '/../images',
                'files_url' => preg_replace('/\/examples.*/', '', $_SERVER['REQUEST_URI']) . '/examples/images',
                'files_allow_upload' => false,
                'max_files_upload_size' => '4M',
              )
            )
          ?>
        }
        
      }
// First create editors for the textareas.
// You can do this in two ways, either
//   xinha_editors   = Xinha.makeEditors(xinha_editors, xinha_config, xinha_plugins);
// if you want all the editor objects to use the same set of plugins, OR;
//   xinha_editors = Xinha.makeEditors(xinha_editors, xinha_config);
//   xinha_editors['myTextarea0'].registerPlugins(['Stylist']);
//   xinha_editors['myTextarea1'].registerPlugins(['CSS','SuperClean']);
// if you want to use a different set of plugins for one or more of the editors.
      xinha_editors = Xinha.makeEditors(xinha_editors, xinha_config, xinha_plugins);

// If you want to change the configuration variables of any of the editors,
// this is the place to do that, for example you might want to
// change the width and height of one of the editors, like this...
//   xinha_editors['myTextarea0'].config.width  = '640px';
//   xinha_editors['myTextarea0'].config.height = '480px';

// Finally we "start" the editors, this turns the textareas into Xinha editors.
      Xinha.startEditors(xinha_editors);
    }

// javascript submit handler
// this shows how to create a javascript submit button that works with the htmleditor.
    submitHandler = function(formname) {
      var form = document.getElementById(formname);
      // in order for the submit to work both of these methods have to be called.
      form.onsubmit();
      window.parent.menu.document.getElementById('myTextarea0').value = document.getElementById('myTextarea0').value;
      form.submit();
      return true;
    }

    window.onload = xinha_init;
//    window.onunload = Xinha.collectGarbageForIE;
  </script>
</head>

<body>
  <form id="to_submit" name="to_submit" method="post" action="ext_example-dest.php">
  <div id="editors_here"></div>
  <button type="button" onclick="submitHandler('to_submit');">Submit</button>
  <textarea id="errors" name="errors" style="width:100%; height:100px; background:silver;"></textarea><!-- style="display:none;" -->
  </form>
  
  <!-- This script is used to show the rendering mode (Quirks, Standards, Almost Standards) --> 
  <script type="text/javascript" src="../render-mode-developer-help.js"></script>
</body>
</html>
