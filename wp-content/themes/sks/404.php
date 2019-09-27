<?php
get_header('secondary');
?>
    <section id="page-error" class="page page-secondary page-secondary--error">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="page-secondary-item">
                        <h1 class="title">
                            <?= __('[:ru]Ууупс![:en]Ooops![:]'); ?>
                        </h1>
                        <div class="page-subtitle">
                            <?= __('[:ru]такой страницы не существует[:en]such page does not exist[:]'); ?>
                        </div>
                        <a href="/" class="btn btn-outline-primary">
                            <?= __('[:ru]На главную[:en]To the main[:]'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="decor-bg"></div>
    </section>
<?php
get_footer('secondary');