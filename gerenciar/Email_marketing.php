<?php
session_start();
require("../config/config_2.php");
include 'config/db.php';
$uid = $_SESSION['id'];
$message = $_SESSION['msg_done'];

if ($_SESSION['id_nivel'] == 4) {
    header("location:login.php");
}

if (!$user->get_session()) {
    header("location:login.php");
}

if (isset($_GET['q'])) {
    if ($_GET['q'] == 'logout') {
        $user->user_logout();
        header("location:login.php");
    }
}
$obj = new Banco;
?>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "advanced",
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,

        // Example content CSS (should be your site CSS)
        content_css: "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        external_image_list_url: "lists/image_list.js",
        media_external_list_url: "lists/media_list.js",

        // Style formats
        style_formats: [{
                title: 'Bold text',
                inline: 'b'
            },
            {
                title: 'Red text',
                inline: 'span',
                styles: {
                    color: '#ff0000'
                }
            },
            {
                title: 'Red header',
                block: 'h1',
                styles: {
                    color: '#ff0000'
                }
            },
            {
                title: 'Example 1',
                inline: 'span',
                classes: 'example1'
            },
            {
                title: 'Example 2',
                inline: 'span',
                classes: 'example2'
            },
            {
                title: 'Table styles'
            },
            {
                title: 'Table row 1',
                selector: 'tr',
                classes: 'tablerow1'
            }
        ],
        formats: {
            alignleft: {
                selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                classes: 'left'
            },
            aligncenter: {
                selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                classes: 'center'
            },
            alignright: {
                selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                classes: 'right'
            },
            alignfull: {
                selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img',
                classes: 'full'
            },
            bold: {
                inline: 'span',
                'classes': 'bold'
            },
            italic: {
                inline: 'span',
                'classes': 'italic'
            },
            underline: {
                inline: 'span',
                'classes': 'underline',
                exact: true
            },
            strikethrough: {
                inline: 'del'
            }
        },

        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
</script>
<!-- /TinyMCE -->

<?php
include 'topo.php';
?>
<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Email marketing
    </h4>
    <div class="conteudo">
        <div class="row form-associacao">
            <form action="" method="post" name="">
                
                <div class="col-md-12 col-sm-12 mb-1">
                    <label class="form-label">Para</label>
                    <input type="text" class="form-control" id="para" name="para">
                </div>
                <div class="col-md-12 col-sm-12 mb-1">
                    <label class="form-label">CC</label>
                    <input type="text" class="form-control" id="cc" name="cc">
                </div>
                <div class="col-md-12 col-sm-12 mb-1">
                    <label class="form-label">CCO</label>
                    <input type="text" class="form-control" id="cco" name="cco">
                </div>
                <div class="col-md-12 col-sm-12 mb-1">
                    <label class="form-label">Assunto</label>
                    <input type="text" class="form-control" id="assunto" name="assunto">
                </div>
                <div class="col-md-12 col-sm-12 mb-2">
                    <label class="form-label">Conte&uacute;do</label>
                    <textarea id="conteudo" name="conteudo" value=""></textarea>
                </div>
                <input type="hidden" class="form-control" id="email_form" name="email_form" >
                <input type="submit" name="Submit" class="btn btn-success" rel="Enviar" value="Enviar">
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php';



?>
<div style=" clear:both;">&nbsp;</div>
</div>


</body>

</html>