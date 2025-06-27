<?php 
get_header();
?>
<main>
    <section class="about wrapper">
        <h2><?php echo get_field('block-1-headline'); ?></h2>
        <div class="items">
            <div class="info">
                <p><?php echo get_field('block-1-text'); ?></p>
            </div>
            <div class="video-player-container">
                <div class="video-poster">
                    <?php
                    $img = get_field('block-1-video-cover');
                    if ($img) {
                        echo '<img src="' . esc_url($img['url']) . '" alt="' . esc_attr($img['alt']) . '">';
                    }
                    ?>
                    <div class="play-button-container">
                        <button class="btn play-button"></button>
                    </div>
                </div>
                <div class="video-wrapper hidden">
                    <iframe
                    src="https://www.youtube.com/embed/frkxWdqfyvs?autoplay=1"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </section>
    <section class="serve wrapper">
        <div class="head">
            <?php 
            $block2 = get_field('block-2');
            ?>
            <h2><?= $block2['headline'] ?></h2>
            <div class="info">
                <?= $block2['text'] ?>
            </div>
        </div>
        <div class="clients">
            <img class="map" src="<?php echo get_template_directory_uri(); ?>/assets/images/map.webp" alt="world map">
            <div class="items">
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hotelplan.svg" alt="hotelplan">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/education_first.svg" alt="education_first">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aircanada.svg" alt="aircanada">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/jitjatjo.svg" alt="jitjatjo">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/audley.svg" alt="audley">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tallink.svg" alt="tallink">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dohop.svg" alt="dohop">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tourcompass.svg" alt="tourcompass">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/versonix.svg" alt="versonix">
                </div>
            </div>
        </div>
    </section>
    <section class="customers wrapper">
        <h2 class="orange-line"><?= get_field('block-3-headline') ?></h2>
        <p class="info"><?= get_field('block-3-text') ?></p>
        <div class="items">
            <div class="item tour-operators">
                <p>Tour Operators</p>
            </div>
            <div class="item dmcs">
                <p>DMCs</p>
            </div>
            <div class="item otas">
                <p>OTAs</p>
            </div>
            <div class="item tmcs">
                <p>TMCs</p>
            </div>
            <div class="item cruise-companies">
                <p>Cruise Companies</p>
            </div>
            <div class="item travel-startups">
                <p>Travel Startups</p>
            </div>
        </div>
    </section>
    <?php
    $team = get_field('team');
    $member = $team['member'] ?? null;
    if ($member):
        $name = $member['name'] ?? '';
        $position = $member['position'] ?? '';
        $image = $member['image'] ?? null;
    ?>
    <section class="leadership">
        <div class="wrapper">
            <h2>Leadership</h2>
            <div class="items">
                <?php
                for ($i = 0; $i < 5; $i++) { ?>
                <div class="item">
                    <div class="image">
                        <?php if ($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $name); ?>">
                        <?php endif; ?>
                    </div>
                    <h3><?php echo esc_html($name); ?></h3>
                    <p><?php echo esc_html($position); ?></p>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <section class="services wrapper">
        <?php
        $block5 = get_field('block-5');
        $products = $block5['products'] ?? [];
        ?>
        <div class="head">
            <h2><?= $block5['headline'] ?></h2>
            <p><?= $block5['text'] ?></p>
        </div>
        <div class="content">
            <p>Turnkey Products</p>
            <div class="items">
                <?php
                foreach ($products as $product):
                if ($product):
                    $image = $product['image'];
                    $headline = $product['headline'];
                    $text = $product['text'];
                ?>
                <div class="item">
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $headline); ?>">
                    <?php endif; ?>
                    <div class="info">
                        <h3><?php echo esc_html($headline); ?></h3>
                        <p><?php echo esc_html($text); ?></p>
                        <button class="btn orange">Learn More</button>
                    </div>
                </div>
                <?php 
                endif;
                endforeach;
                ?>
            </div>
        </div>
    </section>
    <section class="reviews">
        <div class="wrapper">
            <h2>What Our Clients Say</h2>
            <div class="swiper reviews-swiper">
                <div class="swiper-wrapper">
                    <?php
                    $reviews = get_field('reviews');
                    foreach ($reviews as $review):
                        // var_dump($review);
                        if ($review):
                            $name = $review['name'];
                            $position = $review['position'];
                            $content = $review['review'];
                            $image = $review['image'] ?? null;

                            if (is_array($image)) {
                                $img_url = $image['url'];
                                $img_alt = $image['alt'] ?? $name;
                            } elseif (is_int($image)) {
                                $img_url = wp_get_attachment_image_url($image, 'medium');
                                $img_alt = get_post_meta($image, '_wp_attachment_image_alt', true) ?: $name;
                            } else {
                                $img_url = '';
                                $img_alt = '';
                            }

                    ?>
                    <div class="swiper-slide slide">
                        <div class="client-info">
                            <?php
                            if ($image) {
                                echo '<img class="client" src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                            }
                            ?>
                            <div class="data">
                                <h3><?= $name ?></h3>
                                <p><?= $position ?></p>
                            </div>
                            <div class="company"></div>
                        </div>
                        <div class="content">
                            <p><?= $content ?></p>
                        </div>
                    </div>
                    <?php
                    endif;
                    endforeach;
                    ?>
                </div>
                <div class="controls">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>