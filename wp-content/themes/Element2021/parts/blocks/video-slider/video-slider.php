<?php

/**
 * Image vidoe Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
?>

<section  id="video-slider-section" class="video_slider_wrapper pdb_80">
    <div class="slider_wrapper">
        <div class="video-slider">
            <?php if (have_rows('video_slider')): ?>
                <?php while (have_rows('video_slider')):
                    the_row();
                    $video_url = get_sub_field('video_slider_item');
                    $thumbnail = get_sub_field('video_thumbnail');
                    $thumbnail_url = is_array($thumbnail) ? $thumbnail['url'] : $thumbnail;
                    ?>
                    <div class="video-slide" data-video="<?php echo esc_url($video_url); ?>">
                         <img src="<?php echo esc_url($thumbnail_url); ?>" alt="Video Thumbnail">
                        <div class="play-icon"><i class="bi bi-play-fill"></i></div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-dark">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <video id="modalVideo" class="w-100 h-100" controls muted></video>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="play_btn_wrapper">
    <div class="rotating-ring"></div>

    <div class="btn_content">
        <button id="playBtn" class="play_btn">Play Reel</button>
        <button class="pause_btn"><i class="bi bi-x"></i></button>
    </div>
</div>
<div class="VideoContainer">
    <button class="close-btn" id="closeVideo">&times;</button>
    <video id="myVideo" playsinline="" autoplay="" muted="" loop="" src="https://www.w3schools.com/html/mov_bbb.mp4"
        controls></video>
</div>