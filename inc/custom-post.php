<?php 
// SoundArt cpt
function odin_art_cpt() {
    $video = new Odin_Post_Type(
        'Sound Art', // Nome (Singular) do Post Type.
        'soundart' // Slug do Post Type.
    );

    $video->set_labels(
        array(
            'menu_name' => __( 'Sound Art', 'odin' )
        )
    );

    $video->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );
}

add_action( 'init', 'odin_art_cpt', 1 );


// Trilhas cpt
function odin_trilha_cpt() {
    $video = new Odin_Post_Type(
        'Trilha', // Nome (Singular) do Post Type.
        'trilha' // Slug do Post Type.
    );

    $video->set_labels(
        array(
            'menu_name' => __( 'Trilhas', 'odin' )
        )
    );

    $video->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );
}

add_action( 'init', 'odin_trilha_cpt', 1 );