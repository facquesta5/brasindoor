<?php
session_start();
include 'config/config_1.php';

$obj = new Banco;

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
  <h4 class="list-group-item list-group-item-action py-3 lh-tight">Lista de Associados</h4>

  <div class="conteudo">
    <h6 class="mt-4 mb-2">PESSOA JUR&Iacute;DICA</h6>

    <ul class="list-group list-group-light">
      <?php
      $tabela = 'socios';
      $oque = 'razao_social';
      $id = 'PJ';
      $id_tabela = 'tipo';
      $status = 'id_status';
      $variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);

      foreach ($variable as $pj) {
      ?>
        <li class="list-group-item">
          <?php echo  htmlentities($pj['razao_social']); ?>
        </li>
      <?php
      }
      ?>
    </ul>

    <h6 class="mt-4 mb-2">PESSOA F&Iacute;SICA - PROFESSORES</h6>
      
    <ul class="list-group list-group-light">
      <?php
      $tabela = 'socios';
      $oque = 'nome';
      $id = 'PFE';
      $id_tabela = 'tipo';
      $status = 'id_status';
      $variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);

      foreach ($variable as $pj) {
      ?>
        <li class="list-group-item">
          <?php echo htmlentities($pj['nome']); ?>
        </li>
      <?php
      }
      ?>
    </ul>  

    <h6 class="mt-4 mb-2">PESSOA F&Iacute;SICA - PROFISSIONAIS</h6>

    <ul class="list-group list-group-light">
      <?php
      $tabela = 'socios';
      $oque = 'nome';
      $id = 'PFA';
      $id_tabela = 'tipo';
      $status = 'id_status';
      $variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);

      foreach ($variable as $pj) {
      ?>
        <li class="list-group-item">
          <?php echo htmlentities($pj['nome']); ?>
        </li>
      <?php
      }
      ?>
    </ul>

    <h6 class="mt-4 mb-2">BIBLIOTECA E CENTRO DE DOCUMENTA&Ccedil;&Atilde;O</h6>

    <ul class="list-group list-group-light">
      <?php
      $tabela = 'socios';
      $oque = 'nome';
      $id = 'BCD';
      $id_tabela = 'tipo';
      $status = 'id_status';
      $variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);

      foreach ($variable as $pj) {
      ?>
        <li class="list-group-item">
          <?php echo htmlentities($pj['nome']); ?>
        </li>
      <?php
      }
      ?>
    </ul> 

    <h6 class="mt-4 mb-2">MEMBROS HONOR&Aacute;RIOS</h6>
    <ul class="list-group list-group-light">
      <?php
      $tabela = 'socios';
      $oque = 'nome';
      $id = 'MH';
      $id_tabela = 'tipo';
      $status = 'id_status';
      $variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);

      foreach ($variable as $pj) {
      ?>
        <li class="list-group-item">
          <?php echo htmlentities($pj['nome']); ?>
        </li>
      <?php
      }
      ?>
    </ul>

  </div>
</div>

<?php include 'footer.php'; ?>