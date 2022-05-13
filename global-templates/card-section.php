<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="container-fluid rel card-section">
    <!-- card-section -->
    <div class=" <?php echo $container ?>">

        <div class="row text-center">
            <div class="card-item card-item__card-pay col-md-6">
                <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M64 48C64 21.49 85.49 0 112 0H368C394.5 0 416 21.49 416 48V256H608V352C625.7 352 640 366.3 640 384C640 401.7 625.7 416 608 416H576C576 469 533 512 480 512C426.1 512 384 469 384 416H256C256 469 213 512 160 512C106.1 512 64 469 64 416V288H208C216.8 288 224 280.8 224 272C224 263.2 216.8 256 208 256H16C7.164 256 0 248.8 0 240C0 231.2 7.164 224 16 224H240C248.8 224 256 216.8 256 208C256 199.2 248.8 192 240 192H48C39.16 192 32 184.8 32 176C32 167.2 39.16 160 48 160H272C280.8 160 288 152.8 288 144C288 135.2 280.8 128 272 128H16C7.164 128 0 120.8 0 112C0 103.2 7.164 96 16 96H64V48zM160 464C186.5 464 208 442.5 208 416C208 389.5 186.5 368 160 368C133.5 368 112 389.5 112 416C112 442.5 133.5 464 160 464zM480 368C453.5 368 432 389.5 432 416C432 442.5 453.5 464 480 464C506.5 464 528 442.5 528 416C528 389.5 506.5 368 480 368zM466.7 160H400V96H466.7C483.7 96 499.1 102.7 512 114.7L589.3 192C601.3 204 608 220.3 608 237.3V288H544V237.3L466.7 160z" />
                </svg>
                <h3>Gratis verzenden Boven 25 euro</h3>
            </div>
            <div class="card-item card-item__card-sending col-md-6">
                <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M125.61,165.48a49.07,49.07,0,1,0,49.06,49.06A49.08,49.08,0,0,0,125.61,165.48ZM86.15,425.84h78.94V285.32H86.15Zm151.46-211.6c0-20-10-22.53-18.74-22.53H204.82V237.5h14.05C228.62,237.5,237.61,234.69,237.61,214.24Zm201.69,46V168.93h22.75V237.5h33.69C486.5,113.08,388.61,86.19,299.67,86.19H204.84V169h14c25.6,0,41.5,17.35,41.5,45.26,0,28.81-15.52,46-41.5,46h-14V425.88h94.83c144.61,0,194.94-67.16,196.72-165.64Zm-109.75,0H273.3V169h54.43v22.73H296v10.58h30V225H296V237.5h33.51Zm74.66,0-5.16-17.67H369.31l-5.18,17.67H340.47L368,168.92h32.35l27.53,91.34ZM299.65,32H32V480H299.65c161.85,0,251-79.73,251-224.52C550.62,172,518,32,299.65,32Zm0,426.92H53.07V53.07H299.65c142.1,0,229.9,64.61,229.9,202.41C529.55,389.57,448.55,458.92,299.65,458.92Zm83.86-264.85L376,219.88H392.4l-7.52-25.81Z" />
                </svg>

                <h3>Makkelijk betalen via Ideal</h3>
            </div>
        </div>


    </div> <!-- /.card-section -->
</div>