<?php
session_start();
include 'config/config_1.php';
$obj = new Banco;
$_SESSION["host1"] = ''; //essa linha deve ser comentada quando enviar pro servidor
include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">

    <h4 class="list-group-item list-group-item-action py-3 lh-tight">Diretoria</h4>
    <div class="conteudo">
        <p><img src="images/diretoria/presidente.jpg"></p>
        <p><strong>Presidente</strong> - Amadeu Paulo de Campos Jorge</p>
        <p>Diretor da Ar-Limpo Tecnologia de Climatiza&ccedil;&atilde;o e Qualidade do Ar,
            Amadeu Campos &eacute; um dos principais pesquisadores da &aacute;rea de ambientes interiores,
            e est&aacute; na Brasindoor desde os prim&oacute;rdios da entidade. Participou do grupo de
            trabalho que assessorou o Minist&eacute;rio da Sa&uacute;de (MS) na formula&ccedil;&atilde;o
            da Portaria 3.523/1998, principal refer&ecirc;ncia legal para o setor.
        </p>
        <br />

        <p><img src="images/diretoria/avatar.jpg"></p> 
        <p><strong>1º Vice-presidente</strong> - Paulo Jos&eacute; Marques Hoenen</p>
        <p>Engenheiro Mecânico Pós-Graduado em Segurança do Trabalho.
            Diretor-Presidente da Ar Plac Sistemas de Ar Condicionado e Ventila&ccedil;&atilde;o Ltda.
            Consultor T&eacute;cnico em Qualidade do Ar Interior Atuando desde 1993 na &Aacute;rea
            de Higienização e Climatização de Ambientes.
        </p>
        <br />

        <p><img src="images/diretoria/vice2.jpg"></p>
        <p><strong>2º Vice-Presidente</strong> - Reinaldo Keiji Fujii</p>
        <p>Mestre em Sa&uacute;de P&uacute;blica, graduado em tecnologia de
            produ&ccedil;&atilde;o e p&oacute;s-graduado em
            administra&ccedil;&atilde;o de empresas. Possui experi&ecirc;ncia na
            &aacute;rea de planejamento, estrat&eacute;gias de
            manuten&ccedil;&atilde;o, engenharia de confiabilidade e epidemiologia
            ambiental. Atua como t&eacute;cnico especializado do Metr&ocirc; de
            S&atilde;o Paulo e participa como colaborador do projeto
            <em>&quot;Estimation of the impact of combustion sources in the indoor
                air quality of residences&quot;</em>, realizado no Chile e coordenado
            pela Escola de Sa&uacute;de P&uacute;blica de Harvard.
        </p>
        </br>
        <!--
  <strong> <div><img src="images/diretoria/leonardo-cozac.JPG" alt="Leonardo Cozac" width="111"></div>
      1&ordm; Diretor Geral</strong> - Engº.Leonardo Cozac<br>
  <p>Engenheiro Civil e de Segurança do Trabalho formado pela Universidade Paulista. 
      Membro do Grupo Setorial de Qualidade do Ar Interno, em 97/98. Participante do 
      Green Building Council - Divisão Qualidade do Ar de Interiores - 2009. 
      Palestrante do SENAI/SESC na Semana de Refrigeração e Ar Condicionado 2008-2009. 
      Professor convidado de Pós Graduação de MBA no Mackenzie desde 2011. Presidente 
      do Qualindoor – Departamento Nacional de Qualidade do Ar de Interiores da ABRAVA 
      – Gestão 2008 a 2010 e 2012 a 2105. Diretor de Economia da ABRAVA – gestão 
      2013 a 2015. Membro do CB55 da ABNT – Associação Brasileira de Normas Técnicas.</p>
  <br>
  <br>
  -->
        <p><img src="images/diretoria/tesoureiro1.jpg"></p>
        <p><strong>1º Tesoureiro Geral</strong> - Herm&iacute;nio Acquesta</p>
        <p>Engenheiro Mec&acirc;nico, formado em 1976 pela Escola de Engenharia Mau&aacute;. 
            Atua desde 2003 na &aacute;rea de climatiza&ccedil;&atilde;o. Participou na 
            implanta&ccedil;&atilde;o do Plano de Manuten&ccedil;&atilde;o, Opera&ccedil;&atilde;o e 
            Controle (PMOC) em diversas empresas. Coordenou a instala&ccedil;&atilde;o de sistemas de 
            climatiza&ccedil;&atilde;o tanto de expans&atilde;o direta como indireta.</p>
    </div>
</div>
<?php include 'footer.php'; ?>