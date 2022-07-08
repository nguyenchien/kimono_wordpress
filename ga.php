<?php /* if ($_SERVER['SERVER_NAME']=='kyotokimono-rental.com') : ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46049337-4', 'auto');
  ga('require', 'displayfeatures');
  <?php if(in_array(Yii::app()->params['booking_page'],array(MasterValues::MV_BOOKING_PAGE_CHOOSE_DETAIL, MasterValues::MV_BOOKING_PAGE_CONFIRM))){
             $url = Yii::app()->urlManager->createUrl('booking/index').'/'.Yii::app()->params['booking_page'];
    ?>
        ga('set', 'page', '<?= $url?>');
  <?php }?>
  ga('send', 'pageview');

</script>
<?php elseif ($_SERVER['SERVER_NAME']=='release.kyotokimono-rental.com') : ?>
<!-- test googleanalytic local-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-72944655-1', 'none');
  ga('send', 'pageview');
</script>
<?php endif; */ ?>
