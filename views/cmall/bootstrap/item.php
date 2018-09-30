<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<?php $this->managelayout->add_js(base_url('assets/js/cmallitem.js')); ?>

<div class="market" id="item">
    <?php if ($this->member->is_admin()) { ?>
        <a href="<?php echo admin_url('cmall/cmallitem/write/' . element('cit_id', element('data', $view))); ?>" target="_blank" class="btn-sm btn btn-danger pull-right btn-edit">상품내용수정</a>
    <?php } ?>
    <?php if (element('header_content', element('data', $view))) { ?>
        <div class="product-detail"><?php echo element('header_content', element('data', $view)); ?></div>
    <?php } ?>
        <div class="product-box mb20">
            <div class="product-left col-xs-12 col-lg-6">
                <div class="prd-slide">
                    <div class="item_slider">
                        <?php
                        for ($i =1; $i <=10; $i++) {
                            if ( ! element('cit_file_' . $i, element('data', $view))) {
                                continue;
                            }
                        ?>
                            <div>
                                <img style="width: 232px;height: 232px" src="<?php if(element('cit_file_1', element('data', $view))){echo html_escape(element('cit_file_1', element('data', $view)));}else{echo "/assets/images/desktop_detail_default.png";}?>" alt="<?php echo html_escape(element('cit_name', element('data', $view))); ?>" title="<?php echo html_escape(element('cit_name', element('data', $view))); ?>"  onClick="window.open('<?php echo site_url('cmall/itemimage/' . html_escape(element('cit_key', element('data', $view)))); ?>', 'win_image', 'left=100,top=100,width=730,height=700,scrollbars=1');" /></div>
                        <?php } ?>
                    </div>
<!--                    <span class="prev" id="slider-prev"></span>-->
<!--                    <span class="next" id="slider-next"></span>-->
                </div>
                <?php if (element('demo_user_link', element('meta', element('data', $view))) OR element('demo_admin_link', element('meta', element('data', $view)))) { ?>
                <div class="prduct-demo">
                    <?php if (element('demo_user_link', element('meta', element('data', $view)))) { ?>
                        <a href="<?php echo site_url('cmallact/link/user/' . element('cit_id', element('data', $view))); ?>" target="_blank"><span class="btn-default btn-sm  btn">샘플사이트</span></a>
                    <?php } ?>
                    <?php if (element('demo_admin_link', element('meta', element('data', $view)))) { ?>
                        <a href="<?php echo site_url('cmallact/link/admin/' . element('cit_id', element('data', $view))); ?>" target="_blank"><span class="btn-default btn-sm btn">관리자사이트</span></a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="product-right  col-xs-12 col-lg-6">
                <div class="product-title">
                    <div class="pull-right">

                        <span class="pull-right"><img src="<?=base_url('assets/images/star.png');?>"></span>
                        <span class="pull-right" style="margin-right: 15px;"><img src="<?=base_url('assets/images/share.png');?>"></span>
                        <?php
                        for ($k=1; $k<=10; $k++) {
                            if($k==1){
                                if (element('info_title_' . $k, element('meta', element('data', $view)))) {
                                    ?>

                                    <div class="clearfix " style="color: #a39aa3;font-family: NotoSansCJKkr-DemiLight;font-size: 14px"><?php echo html_escape(element('info_title_' . $k, element('meta', element('data', $view)))); ?></div>
                                    <div class="clearfix pull-right" style="color: #a39aa3;font-family: NotoSansCJKkr-DemiLight;font-size: 14px"><?php echo html_escape(element('info_content_' . $k, element('meta', element('data', $view)))); ?></div>


                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <p class="cmall-tit">
                        <label class="label label-pink"><?php echo element('collect_region', element('data', $view));?></label>
                        <label class="label label-pink"><?php echo element('category', element('data', $view));?></label>

                    </p>
<!--                    <p class="cmall-tit">-->
<!--                        --><?php //foreach (element('category', element('data', $view)) as $cv) { echo '<label class="label label-pink">' . html_escape(element('cca_value', $cv)) . '</label> ';} ?>
<!--                    </p>-->
                    <p class="cmall-tit">
                        <?php echo html_escape(element('cit_name', element('data', $view))); ?>
                    </p>



                </div>
                <div class="product-no">
                    <table class="table">
                        <tr>
                            <td><?php echo element('category', element('data', $view));?></td>
                        </tr>
                        <tr>
                            <td><?php echo element('phonenumber', element('data', $view));?></td>
                        </tr>
                        <tr>
                            <td><?php echo element('new_address', element('data', $view));?></td>
                        </tr>
                        <tr>
                            <td><?php foreach (element('index', element('data', $view)) as $key=> $cv) { echo '#',$cv.', ' ;} ?></td>
                        </tr>
                        <tbody>
                            <?php
                            for ($k=1; $k<=10; $k++) {
                                if($k>1){
                                    if (element('info_title_' . $k, element('meta', element('data', $view)))) {
                                        ?>
                                        <tr>
                                            <!--                                    <td>--><?php //echo html_escape(element('info_title_' . $k, element('meta', element('data', $view)))); ?><!--</td>-->
                                            <td><?php echo html_escape(element('info_content_' . $k, element('meta', element('data', $view)))); ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="pull-right">
                    <img id="map" src="<?=base_url('assets/images/map_active.png');?>" onclick="">
                </div>

            </div>
            <div class="col-md-12 map_content">
                <?=get_google_map(element('demo_user_link', element('meta', element('data', $view))))?>
            </div>
        </div>
</div>



<script type="text/javascript" src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>
<script type="text/javascript">
//<![CDATA[
jQuery(function($){

    $('#map').on({
    'click': function() {
        var on_src ='<?=base_url('assets/images/map_active.png');?>';
        var off_src='<?=base_url('assets/images/map.png');?>';
        var src = ($(this).attr('src') === off_src)? on_src:off_src;
        $(this).attr('src', src);
        if(src==on_src)$('.map_content').show();
        if(src==off_src)$('.map_content').hide();
    }
});
    $('.item_slider').bxSlider({
        pager : false,
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',
        nextText: '<img src="<?php echo element('view_skin_url', $layout); ?>/images/btn_next.png" alt="다음" title="다음" />',
        prevText: '<img src="<?php echo element('view_skin_url', $layout); ?>/images/btn_prev.png" alt="이전" title="이전" />'
    });

    $(document).ready(function($) {
        view_cmall_review('viewitemreview', '<?php echo element('cit_id', element('data', $view)); ?>', '', '');
        view_cmall_qna('viewitemqna', '<?php echo element('cit_id', element('data', $view)); ?>', '', '');
    });


    $('#total_order_price').on("item_total_order_price", function(e){

        var tot_price = 0,
            price = 0,
            qty = 0,
            $sel = jQuery('input[name^=chk_detail]:checked'),
            $total_order_price = $(this);

        if ($sel.size() > 0) {
            $sel.each(function() {

                price = parseInt($(this).closest('li').find('input[name^=item_price]').val());
                qty = parseInt($(this).closest('li').find('input[name^=detail_qty]').val());
                
                tot_price += (price * qty);
            });
        }

        $total_order_price.text(number_format(String(tot_price)));

        return false;
    });

    $("button.btn-change-qty").on("item_change_qty", function(e){
        var change_type = $(this).attr('data-change-type');
        var $qty = $(this).closest('li').find('input[name^=detail_qty]');
        var qty = parseInt($qty.val().replace(/[^0-9]/g, ""));
        if (isNaN(qty)) {
            qty = 1;
        }

        if (change_type === 'plus') {
            qty++;
            $qty.val(qty);
        } else if (change_type === 'minus') {
            qty--;
            if (qty < 1) {
                alert('수량은 1이상 입력해 주십시오.');
                $qty.val(1);
                return false;
            }

            $qty.val(qty);
        }

        item_price_calculate();

        return false;
    });

    $("#fitem").on("item_form_submit", function(e){

        // 수량체크
        var is_qty = true;
        var detail_qty = 0;
        var $el_chk = jQuery('input[name^=chk_detail]:checked');

        $el_chk.each(function() {
            detail_qty = parseInt($(this).closest('li').find('input[name^=detail_qty]').val().replace(/[^0-9]/g, ""));
            if (isNaN(detail_qty)) {
                detail_qty = 0;
            }

            if (detail_qty < 1) {
                is_qty = false;
                return false;
            }
        });

        if ( ! is_qty) {
            alert('수량을 1이상 입력해 주십시오.');
            return false;
        }

        return false;
    });
});
//]]>
</script>
