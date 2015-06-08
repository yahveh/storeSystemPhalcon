<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

        <?php
            if(getIndex() == 'home')
                echo "<a class='navbar-brand' href='#'>Loja</a>";
            elseif(getIndex() == 'index')
                echo "<a class='navbar-brand' href='../index.php'>Voltar</a>";
            elseif(getIndex() == 'submenu')
                echo "<a class='navbar-brand' href='index.php'>Voltar</a>";
            ?>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php foreach ($template_menu as $name => $link):
                    $template_menu_class = '';
                    $template_option = str_replace('/', '', str_replace(ROOT_DIR, '', $_SERVER['REQUEST_URI']));
                    if ($link == $template_option) $template_menu_class = 'active';
                ?>
                <li class="<?= $template_menu_class ?>"> <a href="<?= $this->link($link); ?>"><?= $name ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if($_SESSION['usuario'] && $_SESSION['senha']) : ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about"><b><?= ucwords($_SESSION['usuario']) ?></b></a></li>
                <li><a href="<?= $this->link('conexao/logout.php') ?>"><b>Sair</b></a></li>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>