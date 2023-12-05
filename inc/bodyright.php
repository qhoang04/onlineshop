<div id="bodyRight">
        <?php if(!isset($_GET['cat_id'])){?>
        <h2>CÁC PHỤ KIÊN TRANG TRÍ</h2>
        <div id="slider">
            <img src="./img/slider/bg.jpg" alt="" width="300">
        </div><!--End of slider-->
        <ul>
        <?php displayAllCategories(); ?>
        </ul><br clear = 'All'>
        <?php } ?>
    </div><!--End of body left-->

