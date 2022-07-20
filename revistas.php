<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
        Revistas
    </h4>
    <div class="conteudo">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <p><STRONG>Interiors &amp; Sources (IS)</STRONG> Editor: Katie Sosnowchik, monthly magazine, Interiors and Sources.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p><STRONG>IEQ Strategies</STRONG> Editor: Carlton Vogt, monthly newsletter, Cutter Information Corp.</p>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>