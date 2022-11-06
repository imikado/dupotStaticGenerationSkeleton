<nav class="navbar navbar-wrapper navbar-default navbar-fade is-transparent" role="navigation" aria-label="main navigation">

    <div class="navbar-brand">
        <a class="navbar-item" href="index.html">
            <img src="css/images/logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar-menu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>



    <div class="navbar-menu  " id="navbar-menu">

        <?php foreach ($this->paramList['linkList'] as $label => $link) : ?>
            <a class="navbar-item <?php if ($link == $this->paramList['pageSelected']) : ?>is-active<?php endif; ?>" href="<?php echo $link ?>"><?php echo $label ?></a>
        <?php endforeach; ?>

    </div>


</nav>