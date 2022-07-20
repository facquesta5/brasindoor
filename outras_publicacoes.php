<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Outras publicações
    </h4>
    <div class="conteudo">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p><STRONG>The Healthy House: A Design and Constructio</STRONG>n Guide by John Bower, Lynn Bower, 2000 video, The Healthy House Institute</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><STRONG>Indoor Air Quality Building Education and Assessment</STRONG> Model (I-BEAM) Software<BR>
                        download, U.S. EPA</p>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>