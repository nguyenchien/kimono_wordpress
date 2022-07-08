<div class="wrap-new-arrival">
    <div class="title-general text-center">
        <span class="text-title-general"><?php echo Yii::t('wp_theme','New arrival');?></span>
        <h3 class="sub-text-title sub-text-title-new">新作の着物</h3>
    </div>
    <div class="new-arrival" id="new-arrival">
        <?php
        $css_special = array('first', 'second', 'third');
        
        if ($products):
            $numb_ranking = 0;
	        $options = Utils::getHtmlOptions(array('width' => '70', 'height' => '71.02'), 70, array());
        ?>
	    <?php foreach($products as $product) :?>
                <?php
			    $numb_ranking++;
	            $postItem = $product['post'];
	            $productDetailLink = Yii::app()->createAbsoluteUrl('formal/product', array('id' => $product['product_id']));
	            $post_categories = wp_get_object_terms($postItem->ID, 'formal_category', array('fields' => 'ids'));
	            $category_name = '';
	            
	            if ($post_categories) {
		            $category = get_term($post_categories[0],'formal_category');
		            $category_name = $category ? $category->name: '';
	            }
	            $short_description = get_field('short_description', $postItem->ID);
                $thumb = Utils::getImageUrl($product['main_thumb_image'], true, true);

                $img = CHtml::image($thumb['path'], $product['post']->post_name, $options);
                ?>
                <div class="arrival-item <?php echo $postItem->ID;?>">
                    <a href="<?php echo $productDetailLink;?>" class="arrival-wrap-item">
                        <div class="new-arrival-wrap-img">
                            <div class="new-arrival-ranking <?php if ($numb_ranking <= 3) { echo $css_special[$numb_ranking-1];}?>">
                                <div class="numb-ranking"><?php echo $numb_ranking;?></div>
                            </div>
                            <?php echo $img;?>
                        </div>
                        <div class="new-arrival-desc">
                            <div class="new-arrival-name"><?php echo $postItem->post_title;?></div>
                            <div class="new-arrival-brief"><?php echo wp_trim_words($short_description, 46);?></div>
                            <div class="new-arrival-info">
                                <span class="feature"><?php echo $category_name;?></span>
                                <span class="customer-views"><?php echo get_the_date('', $postItem->ID)?></span>
                            </div>
                        </div>
                    </a>
                </div>
        <?php endforeach; ?>
        <?php else: ?>
                <p style="margin-bottom: 20px;text-align: center;font-size: 17px;"><?= Yii::t('wp_theme','申し訳ありません、現在準備中です', array(), null);?></p>
        <?php endif; ?>
    </div>
    <div class="new-arrival-nav"></div>
</div>