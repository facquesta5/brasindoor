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
if ($_GET['type'] == 1) { //Cadastrar
    if (isset($_POST['cadastro']) && $_POST['cadastro'] == 1 && $_SERVER["REQUEST_METHOD"] == "POST") {
        $data_registro = date("Y-m-d");
        $onde = "noticias";
        $oque = array( //$oque as $coluna => $valor
            'titulo' => htmlentities($_POST["titulo"]),
            'conteudo' => $_POST["conteudo"],
            'autor' => htmlentities($_POST["autor"]),
            'data_registro' => $data_registro
        );
        $dados = $obj->inserirStatments($oque, $onde);

        $redirect = "noticias.php?type=2";
        $pagina = $obj->redirectTo($redirect);
    }
    include 'topo.php';
?>
    <div class="column-1 col-lg-8 col-md-12">
        <h4 class="list-group-item list-group-item-action py-3 lh-tight">
            Cadastrar Not&iacute;cia
        </h4>
        <div class="conteudo">
            <form action="" method="post" name="cadastrar_noticia">
                <table style="padding-left:10px; font-weight:bold" width="100%" border="0">
                    <tr>
                        <td>T&iacute;tulo</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="titulo" name="titulo" value="" /></td>
                    </tr>
                    <tr>
                        <td>Conte&uacute;do</td>
                    </tr>
                    <tr>
                        <td><textarea id="conteudo" name="conteudo" value=""></textarea></td>
                    </tr>
                    <tr>
                        <td>Autor/Fonte</td>
                    </tr>
                    <tr>
                        <td><input type="text" id="autor" name="autor" value="" /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <input type="hidden" id="cadastro" name="cadastro" value="1" />
                    <tr>
                        <td><input type="submit" value="Cadastrar" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php include 'footer.php';
} //End Cadastrar


if ($_GET['type'] == 2) {  //Listar 
    include 'topo.php';
?>
    <div class="column-1 col-lg-8 col-md-12">
        <h4 class="list-group-item list-group-item-action py-3 lh-tight">
            Lista de Not&iacute;cias
        </h4>
        <div class="conteudo-admin">
            <table class="table table-admin">
                <tr>
                    <td width="5%" align="center" style="text-align:center;">ID</td>
                    <td width="85%">T&iacute;tulo</td>
                    <td width="5%" align="center" style="text-align:center;">Alterar</td>
                    <td width="5%" align="center" style="text-align:center;">Excluir</td>
                </tr>
                <?php
                $oque = "id_noticia, titulo";
                $tabela = 'noticias';
                $id_tabela = "id_noticia";
                $limit = "";
                $dados = $obj->listarStatements($oque, $tabela, $id_tabela, $limit);
                foreach ($dados as $linha) {
                ?>
                    <tr>
                        <td align="center" style="text-align:center;"><?php echo $linha['id_noticia']; ?></td>
                        <td><?php echo utf8_encode($linha['titulo']); ?></td>
                        <td align="center" style="text-align:center;"><a href="noticias.php?type=3&id_noticia=<?php echo $linha['id_noticia']; ?>"><img src="images/editar.png" /></a></td>
                        <td align="center" style="text-align:center;"><a href="noticias.php?type=4&id_noticia=<?php echo $linha['id_noticia']; ?>"><img src="images/excluir.png" /></a></td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </div>
    <?php include 'footer.php'; ?>
<?php
} //End Listar

if ($_GET['type'] == 3) { //Alterar
    if (isset($_POST['alterar']) && $_POST['alterar'] == 1 && $_SERVER["REQUEST_METHOD"] == "POST") {

        $onde = 'noticias';
        $id_tabela = "id_noticia";
        $id = $_POST['id_noticia'];

        $oque = array(
            'titulo' => htmlentities($_POST['titulo']),
            'conteudo' => $_POST['conteudo'],
            'autor' => $_POST['autor'],
        );

        $dados = $obj->alterarStatements($oque, $onde, $id, $id_tabela);
        $redirect = "noticias.php?type=2";
        $pagina = $obj->redirectTo($redirect);
    } else {
        $oque = "id_noticia, titulo, conteudo, autor, data_registro";
        $tabela = 'noticias';
        $id = $_GET['id_noticia'];
        $id_tabela = "id_noticia";
        $status = "";
        $variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);
    }

    include 'topo.php';
?>
    <div class="column-1 col-lg-8 col-md-12">
        <h4 class="list-group-item list-group-item-action py-3 lh-tight">
            Editar not&iacute;cias
        </h4>
        <div class="conteudo">
            <form action="" method="post" name="cadastrar_noticia">
                <table>
                    <?php foreach ($variable as $dados) { ?>
                        <tr>
                            <td>T&iacute;tulo</td>
                        </tr>
                        <tr>
                            <td><input type="text" id="titulo" name="titulo" value="<?php echo utf8_encode($dados['titulo']); ?>" size="110" /></td>
                        </tr>
                        <tr>
                            <td>Conte&uacute;do</td>
                        </tr>
                        <tr>
                            <td><textarea id="conteudo" name="conteudo" value=""><?php echo $dados['conteudo']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Autor/Fonte</td>
                        </tr>
                        <tr>
                            <td><input type="text" id="autor" name="autor" value="<?php echo $dados['autor']; ?>" size="50" /></td>
                        </tr>
                        <tr>
                            <td>
                                <p> </p>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Data de registro: </b><?php echo $dados['data_registro']; ?></td>
                        </tr>
                        <input type="hidden" id="id_noticia" name="id_noticia" value="<?php echo $dados['id_noticia']; ?>" />
                        <input type="hidden" id="alterar" name="alterar" value="1" />
                    <?php } ?>
                    <tr>
                        <td><input type="submit" value="Cadastrar" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>

<?php
} //End editar

if ($_GET['type'] == 4) { //Excluir

    $id = $_GET['id_noticia'];
    $onde = 'noticias';
    $id_tabela = "id_noticia";
    $dados = $obj->removerStatements($onde, $id, $id_tabela);
    $redirect = "noticias.php?type=2";
    $pagina = $obj->redirectTo($redirect);
}


?>
<div style=" clear:both;">&nbsp;</div>
</div>


</body>

</html>