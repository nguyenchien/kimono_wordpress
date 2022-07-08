<?php
/**
 * Template Name: Review Booking
 */
global $post;
wp_register_style('review_booking', get_template_directory_uri() . '/css/review_booking.css', array('twentytwelve-style'));
wp_enqueue_style('review_booking');
get_header();
?>

<div class="container">
	<?php
		if (function_exists('yoast_breadcrumb')) {
			yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs-kimono sixteen columns">', '</div>');
		}
	?>
</div>
<div class="container clearfix <?php echo $post->post_name ?>">
	<?php while ( have_posts() ) : the_post(); 
		//the_content();
	endwhile; // end of the loop. ?>

    <div class="page-review-booking">
        <form action="#" method="post" name="frmReviewBooking">
            <div class="section section-customer-info">
                <ul>
                    <li class="flex-inline">
                        <p class="label flex-inline">ご利用日</p>
                        <p class="date">2017/01/01</p>
                    </li>
                    <li class="flex-inline">
                        <p class="label flex-inline">ご利用店舗</p>
                        <p class="shop">祇園四条店</p>
                    </li>
                </ul>
            </div>
            <div class="section section-rating-post">
                <p class="text">当店のご利用は如何でしたか。<span class="require">*</span></p>
                <ul class="flex-inline">
                    <li data-value="5">start</li>
                    <li data-value="4">start</li>
                    <li data-value="3">start</li>
                    <li data-value="2">start</li>
                    <li data-value="1">start</li>
                </ul>
                <input type="hidden" name="reviewStar" value="" />
                <span class="error error-review-star"></span>
            </div>
            <div class="section section-rating-question">
                <div class="item item-question flex-inline">
                    <p class="question-name">①当店を知ったきっかけ<span class="require">*</span></p>
                    <div class="question-list">
                        <select name="selShop">
                            <option value="">Select</option>
                            <option value="1">知ったきっかけ</option>
                            <option value="2">知ったきっかけ</option>
                        </select>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="item item-question flex-inline">
                    <p class="question-name">②当店に決めた理由<span class="require">*</span></p>
                    <div class="question-list">
                        <select name="selReason">
                            <option value="">Select</option>
                            <option value="1">知ったきっかけ</option>
                            <option value="2">知ったきっかけ</option>
                        </select>
                        <span class="error"></span>
                    </div>
                </div>
                <div class="item item-customer-comment">
                    <textarea></textarea>
                </div>
            </div>
            <div class="section submit-review-booking">
                <a class="btn-review-booking" href="javascript:void(0);" onclick="submitReviewBooking();">送信する</a>
            </div>
        </form>
    </div>

</div><!-- end container.kimono-group -->
<?php get_footer(); ?>

<script type="text/javascript">
    $( document ).ready(function() {
        /* rating post */
        $(".section-rating-post ul li").click(function(){
             $(this).siblings().removeClass('voted');
             $(this).addClass("voted");
             var data_voted = $(this).data("value");
             $("input[name='reviewStar']").val(data_voted);
        });
    });

    function submitReviewBooking() {
        $(".error").text('');
        // Validate element
        var valReviewStar = $("input[name='reviewStar']").val();
        var valSelShop = $(".question-list select[name='selShop']").val();
        var valSelReason = $(".question-list select[name='selReason']").val();
        var flgErr = false;

        if(valReviewStar == ""){
            $("input[name='reviewStar']").siblings(".error").text("Error reviewStar");
            flgErr = true;
        }

        if(valSelShop == ""){
            $("select[name='selShop']").siblings(".error").text("Error selShop");
            flgErr = true;
        }

        if(valSelReason == ""){
            $("select[name='selReason']").siblings(".error").text("Error selReason");
            flgErr = true;
        }

        // Submit form
        if(!flgErr){
            $("form[name='frmReviewBooking']").submit();
        }
    }
</script>
