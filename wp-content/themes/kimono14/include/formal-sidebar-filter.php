<div class="wrap-category conditions conditions-filter">
    <h2 class="title-general text-center"><span class="text-title-general">Conditions</span></h2>
    <div class="box-category">
        <?php
            if ($isPlanList)
                echo do_shortcode('[filter_formal_product url="formal/list" enable_search_interface=1 search_result_container_id=formal_search_result type=planlist]');
            else
                echo do_shortcode('[filter_formal_product url="formal/list" enable_search_interface=1 search_result_container_id=formal_search_result]');
        ?>
    </div>
</div>


