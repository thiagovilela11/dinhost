<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bella Olonge</title>
    <meta NAME="KeyWords" CONTENT="Delivery Rio de Janeiro, Delivery">
    <meta name="description" content="Seu App de Delivery prático e rápido!" />
    <meta name="rating" content="general">
    <meta name="language" content="portuguese">
    <meta name="distribution" content="global">
    <meta name="robots" content="index,follow">
    <!---------- CSS ---------->
    <link rel="stylesheet"  type="text/css" href="<?=bloginfo('template_url')?>/style.css" />
    <link rel="stylesheet" href="<?=bloginfo('template_url')?>/css/480.css" media="screen and (max-width: 480px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <?php wp_head();?>
</head>
<body>
<section id="header">
    <article id="header_conteudo">
        <div id="header_conteudo_topo">
            <div id="header_topo_logo">
                <a href="#" title="Bella Olonge" border="0" ><img src="<?=bloginfo('template_url')?>/images/logo.png" alt="Bella Olonge" border="0" ></a>
            </div>

            <div id="header_topo_menu">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </div>
        </div>
    </article>
</section>
