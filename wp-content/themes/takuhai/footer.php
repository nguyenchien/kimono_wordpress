
<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $isSmartPhone,$isTablet, $language;
?>
</div><!-- #main -->
<?php
global $is_osaka;
global $is_asakusa;
?>
<footer>
	<div class="container">
		<p class="icons-social">
			<a class="twitter" href="#"><span class="icon-fa icon-font-icon-twitter"></span></a>
			<a class="facebook" href="#"><span class="icon-fa icon-font-icon-facebook"></span></a>
			<a class="instagram" href="#"><span class="icon-fa icon-font-icon-instagram"></span></a>
		</p>
	</div>
	<div class="footer-links">
		<div class="container">
			<div class="left column-list">
				<h4>
					<span class="icon-fa icon-font-icon-exclamation"></span>着物お役立ちコラム
					<a class="view-more" href="<?php echo esc_url(home_url('column'));?>">もっと見る</a>
				</h4>
				<div class="clearfix">
					<?php getColumnList(); ?>
				</div>
			</div>
			<div class="right">
				<h4><span class="icon-fa icon-font-icon-star"></span>その他のサービス</h4>
				<ul class="first">
					<li><a href="<?php echo esc_url(home_url('/'));?>">観光着物レンタル【京都きものレンタル wargo】</a></li>
				</ul>
				<h4><span class="icon-fa icon-font-icon-i"></span>宅配着物レンタルについて</h4>
				<ul class="second">
					<li>
						<a href="<?php echo esc_url(home_url('notation'));?>" title="特定商取引法に基づく表記">特定商取引法に基づく表記</a>
					</li>
					<li style="display: none;">
						<a href="#" title="利用規約">利用規約</a>
					</li>
					<li style="display: none;">
						<a href="#" tilte="プライバシーポリシー">プライバシーポリシー</a>
					</li>
					<li>
						<a href="http://www.wagokoro.co.jp/" target="_blank" title="運営会社">運営会社</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="copyright container">
			<p>Copyright © 2016 京都きものレンタル wargo.<br>All Rights Reserved.</p>
		</div>
	</div>



</footer><!-- #colophon -->

</div><!-- #end sb-site -->

<!-- end .sb-left -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>