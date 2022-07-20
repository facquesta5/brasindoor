<div class="column-2 col-lg-3 col-md-12 p-2">
    <nav class="small bd-aside" id="toc">
        <ul class="list-unstyled">
            <li class=" list-group-item-action ">
                <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" 
                aria-expanded="false" data-bs-target="#institucional-collapse" 
                aria-controls="institucional-collapse">Associação</button>
                <ul class="list-unstyled ps- collapse" id="institucional-collapse">
                    <li><a href="<?php echo $_SESSION["host1"]; ?>lista_assoc.php">Lista de Associados</a></li>
                    <!-- <li><a href="<?php echo $_SESSION["host1"]; ?>cadastrar_assoc.php">Cadastrar Associado</a></li> -->
                </ul>
            </li>
            <li>
                <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" 
                aria-expanded="false" data-bs-target="#associacao-collapse" 
                aria-controls="associacao-collapse">Notícias</button>
                <ul class="list-unstyled collapse" id="associacao-collapse">
                    <li><a href="<?php echo $_SESSION["host1"]; ?>noticias.php?type=1">Adicionar notícia</a></li>
                    <li><a href="<?php echo $_SESSION["host1"]; ?>noticias.php?type=2">Listar notícia</a></li>
                </ul>
            </li>
            <?php if(isset($_SESSION['id'])){	?>
                <li>
                <button class="btn d-inline-flex align-items-center collapsed" 
                data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#programacao-cientifica-collapse" 
                aria-controls="programacao-cientifica-collapse">Logout</button>
                <ul class="list-unstyled collapse" id="programacao-cientifica-collapse">
                    <li><a href="?q=logout">Logout</a></li>
                </ul>
            </li> 
         	  <?php } ?>
        </ul>
    </nav>

    

</div>