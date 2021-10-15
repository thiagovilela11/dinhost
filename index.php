<?php get_header(); ?>
<section id="bannertopo">
    <?php 
    $newsArgs = array( 'post_type' => 'bannertopo', 'posts_per_page' => 1);                                    
    $newsLoop = new WP_Query( $newsArgs );                  
                        
    while ( $newsLoop->have_posts() ) : $newsLoop->the_post(); ?>
    <article id="bannertopo_img">
        <img src="<?php the_field('imagem_do_banner_topo');?>">
    </article>

    <article id="bannertopo_conteudo">
        <div id="bannertopo_conteudo_bloco">
            <div id="bannertopo_conteudo_texto">
                <h2><?php the_field('subtitulo_do_banner_topo');?></h2>
                <h1><?php the_title();?></h1>
                <p><?php the_field('descricao_do_banner_topo');?></p>
            </div>

            <div id="bannertopo_conteudo_btn">
                <div id="bannertopo_conteudo_btn_bloco">
                    <h1><a href="<?php the_field('link_playstore_banner_topo');?>" title="Baixe na Playstore" target="_blank">Playstore</a></h1>
                    <h2><a href="<?php the_field('link_apple_store_banner_topo');?>" title="Baixe na Apple Store" target="_blank">Apple Store</a></h2>
                </div>
            </div>
        </div>
    </article>
    <?php endwhile; ?>
</section>
<!---FIM BANNER--->
<section id="blocoapp">
    <article id="blocoapp_conteudo">
        <div id="blocoapp_conteudo_bloco">
            <img src="<?=bloginfo('template_url')?>/images/apphome.png">
            <hr>
        </div>
    </article>
</section>
<!---FIM BLOCO APP--->
<?php query_posts(array('cat'=> '3', 'posts_per_page' => 1));?>
 <?php if (have_posts()): while (have_posts()) : the_post();?>
<section id="blocomeio_um">
    <article id="blocomeio_um_conteudo">
        <div id="blocomeio_um_conteudo_main">
            <div id="blocomeio_um_conteudo_main_title">
                <h1>How the app works</h1>
            </div>

            <div id="blocomeio_um_conteudo_main_cont">
                <div id="blocomeio_um_conteudo_main_cont_esq">
                <img src="<?php the_field('imagem_bloco_how_the_app_works_1');?>">
                </div>

                <div id="blocomeio_um_conteudo_main_cont_dir">
                <h2><?php the_field('subtitulo_bloco_how_the_app_works_1');?></h2>
                <h1><?php the_field('titulo_bloco_how_the_app_works_1');?></h1>
                <p><?php the_field('descricao_bloco_how_the_app_works_1');?></p>
                </div>
            </div>
        </div>
    </article>
</section>
<!---FIM BLOCO MEIO UM--->
<section id="blocomeio_dois">
    <article id="blocomeio_dois_conteudo">
        <div id="blocomeio_dois_conteudo_main">
            <div id="blocomeio_dois_conteudo_main_cont">
                <div id="blocomeio_dois_conteudo_main_cont_esq">
                    <h2><?php the_field('subtitulo_bloco_how_the_app_works_2');?></h2>
                    <h1><?php the_field('titulo_bloco_how_the_app_works_2');?></h1>
                    <p><?php the_field('descricao_bloco_how_the_app_works_2');?></p>
                </div>

                <div id="blocomeio_dois_conteudo_main_cont_dir">
                    <img src="<?php the_field('imagem_bloco_how_the_app_works_2');?>">
                </div>
            </div>
        </div>
    </article>
</section>
<!---FIM BLOCO MEIO DOIS--->
<section id="blocomeio_um">
    <article id="blocomeio_um_conteudo">
        <div id="blocomeio_um_conteudo_main">
            <div id="blocomeio_um_conteudo_main_cont">
                <div id="blocomeio_um_conteudo_main_cont_esq">
                <img src="<?php the_field('imagem_bloco_how_the_app_works_3');?>">
                </div>

                <div id="blocomeio_um_conteudo_main_cont_dir">
                <h2><?php the_field('subtitulo_bloco_how_the_app_works_3');?></h2>
                <h1><?php the_field('titulo_bloco_how_the_app_works_3');?></h1>
                <p><?php the_field('descricao_bloco_how_the_app_works_3');?></p>
                </div>
            </div>
        </div>
    </article>
</section>
<?php endwhile; else:?>
<?php endif;?>
<!----FIM BLOCO MEIO UM ---->
<section id="bannerroda">
<?php 
    $newsArgs = array( 'post_type' => 'bannerrodape', 'posts_per_page' => 1);                                    
    $newsLoop = new WP_Query( $newsArgs );                  
                        
    while ( $newsLoop->have_posts() ) : $newsLoop->the_post(); ?>
    <article id="bannerroda_img">
        <img src="<?php the_field('imagem_do_banner_rodape');?>">
    </article>

    <article id="bannerroda_conteudo">
        <div id="bannerroda_conteudo_bloco">
            <div id="bannerroda_conteudo_texto">
                <h1><?php the_title();?></h1>
                <p><?php the_field('descricao_do_banner_rodape');?></p>
            </div>

            <div id="bannerroda_conteudo_btn">
                <div id="bannerroda_conteudo_btn_bloco">
                    <h1><a href="<?php the_field('link_playstore_banner_rodape');?>" title="Baixe na Playstore" target="_blank">Playstore</a></h1>
                    <h2><a href="<?php the_field('link_apple_store_banner_rodape');?>" title="Baixe na Apple Store" target="_blank">Apple Store</a></h2>
                </div>
            </div>
        </div>
    </article>
    <?php endwhile; ?>
</section>
<!---FIM BANNER--->
<?php get_footer(); ?>