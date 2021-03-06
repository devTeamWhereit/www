<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>
<div class="container container-board">
<?php echo element('headercontent', element('board', element('list', $view))); ?>

<div class="board">

    <div class="row mb20">

        <script type="text/javascript">
        //<![CDATA[
        function postSearch(f) {
            var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
            if (skeyword.length < 2) {
                alert('2글자 이상으로 검색해 주세요');
                f.skeyword.focus();
                return false;
            }
            return true;
        }
        function toggleSearchbox() {
            $('.searchbox').show();
            $('.searchbuttonbox').hide();
        }
        <?php
            if ($this->input->get('skeyword')) {
                echo 'toggleSearchbox();';
            }
        ?>
        $('.btn-point-info').popover({
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-title"></div><div class="popover-content"></div></div>',
            html : true
        });
        //]]>
        </script>
    </div>

    <?php
    if (element('use_category', element('board', element('list', $view))) && element('cat_display_style', element('board', element('list', $view))) === 'tab') {
        $category = element('category', element('board', element('list', $view)));
    ?>
        <ul class="nav nav-tabs clearfix">
            <li role="presentation" <?php if ( ! $this->input->get('category_id')) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=">전체</a></li>
            <?php
            if (element(0, $category)) {
                foreach (element(0, $category) as $ckey => $cval) {
            ?>
                <li role="presentation" <?php if ($this->input->get('category_id') === element('bca_key', $cval)) { ?>class="active" <?php } ?>><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?findex=<?php echo html_escape($this->input->get('findex')); ?>&category_id=<?php echo element('bca_key', $cval); ?>"><?php echo html_escape(element('bca_value', $cval)); ?></a></li>
            <?php
                }
            }
            ?>
        </ul>
    <?php } ?>

    <?php
    $attributes = array('name' => 'fboardlist', 'id' => 'fboardlist');
    echo form_open('', $attributes);
    ?>
        <?php if (element('is_admin', $view)) { ?>
            <div><label for="all_boardlist_check"><input id="all_boardlist_check" onclick="if (this.checked) all_boardlist_checked(true); else all_boardlist_checked(false);" type="checkbox" /> 전체선택</label></div>
        <?php } ?>

        <?php
        if (element('notice_list', element('list', $view))) {
        ?>
            <table class="table table-hover">
                <tbody>
                <?php
                foreach (element('notice_list', element('list', $view)) as $result) {
                ?>
                    <tr>
                        <?php if (element('is_admin', $view)) { ?><th scope="row"><input type="checkbox" name="chk_post_id[]" value="<?php echo element('post_id', $result); ?>" /></th><?php } ?>
                        <td><span class="label label-primary">공지</span></td>
                        <td>
                            <?php if (element('post_reply', $result)) { ?><span class="label label-primary" style="margin-left:<?php echo strlen(element('post_reply', $result)) * 10; ?>px">Re</span><?php } ?>
                            <a href="<?php echo element('post_url', $result); ?>" style="
                                <?php
                                if (element('title_color', $result)) {
                                    echo 'color:' . element('title_color', $result) . ';';
                                }
                                if (element('title_font', $result)) {
                                    echo 'font-family:' . element('title_font', $result) . ';';
                                }
                                if (element('title_bold', $result)) {
                                    echo 'font-weight:bold;';
                                }
                                if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                                    echo 'font-weight:bold;';
                                }
                                ?>
                            " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
                            <?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
                            <?php if (element('post_file', $result)) { ?><span class="fa fa-download"></span><?php } ?>
                            <?php if (element('post_secret', $result)) { ?><span class="fa fa-lock"></span><?php } ?>
                            <?php    if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
                            <?php if (element('post_comment_count', $result)) { ?><span class="label label-warning">+<?php echo element('post_comment_count', $result); ?></span><?php } ?>
                        <td><?php echo element('display_name', $result); ?></td>
                        <td><?php echo element('display_datetime', $result); ?></td>
                        <td><?php echo number_format(element('post_hit', $result)); ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>

    <div class="table-image">
        <?php
        $i = 0;
        $open = false;
        $cols = element('gallery_cols', element('board', element('list', $view)));
        if (element('list', element('data', element('list', $view)))) {
            foreach (element('list', element('data', element('list', $view))) as $result) {
                if ($cols && $i % $cols === 0) {
                    echo '<div class="row">';
                    $open = true;
                }
                $marginright = (($i+1)% $cols === 0) ? 0 : 2;
        ?>
            <div class="gallery-box" style="width:<?php echo element('gallery_percent', element('board', element('list', $view))); ?>%;margin-right:<?php echo $marginright;?>%;">
<!--                --><?php //if (element('is_admin', $view)) { ?><!--<input type="checkbox" name="chk_post_id[]" value="--><?php //echo element('post_id', $result); ?><!--" />--><?php //} ?>
<!--                <span class="label label-default">--><?php //echo element('num', $result); ?><!--</span>-->
                <?php if (element('is_mobile', $result)) { ?><span class="fa fa-wifi"></span><?php } ?>
                <?php if (element('category', $result)) { ?><a href="<?php echo board_url(element('brd_key', element('board', element('list', $view)))); ?>?category_id=<?php echo html_escape(element('bca_key', element('category', $result))); ?>"><span class="label label-default"><?php echo html_escape(element('bca_value', element('category', $result))); ?></span></a><?php } ?>
                <?php    if (element('ppo_id', $result)) { ?><i class="fa fa-bar-chart"></i><?php } ?>
                <div class="col-md-6">
                    <a href="<?php echo element('post_url', $result); ?>" title="<?php echo html_escape(element('title', $result)); ?>"><img src="<?php echo element('thumb_url', $result); ?>" alt="<?php echo html_escape(element('title', $result)); ?>" title="<?php echo html_escape(element('title', $result)); ?>" class="thumbnail img-responsive" style="width:<?php echo element('gallery_image_width', element('board', element('list', $view))); ?>px;height:<?php echo element('gallery_image_height', element('board', element('list', $view))); ?>px;" /></a>
                </div>
                <div class="col-md-6">
                    <p class="mt100 text-date">
                        <?=display_datetime((element('post_datetime', $result)),'user','Y.m.d'); ?>
                    </p>
                    <p>
                        <?php if (element('post_reply', $result)) { ?><span class="label label-primary">Re</span><?php } ?>
                        <a href="<?php echo element('post_url', $result); ?>" style="font-family: NotoSansCJKkr-Medium;font-size: 36px; display: inline-block;width: 250px;color:#504f57;
                        <?php
                        if (element('title_color', $result)) {
                            echo 'color:' . element('title_color', $result) . ';';
                        }
                        if (element('title_font', $result)) {
                            echo 'font-family:' . element('title_font', $result) . ';';
                        }
                        if (element('title_bold', $result)) {
                            echo 'font-weight:bold;';
                        }
                        if (element('post_id', element('post', $view)) === element('post_id', $result)) {
                            echo 'font-weight:bold;';
                        }
                        ?>
                                " title="<?php echo html_escape(element('title', $result)); ?>"><?php echo html_escape(element('title', $result)); ?></a>
                    </p>
                    <p>
                        <?=(element('post_content', $result))?>
                    </p>
                </div>

                <a href="<?php echo element('post_url', $result); ?>" class="pull-right bold" style="letter-spacing: 2px;text-w">
                    VIEW MORE &nbsp;&nbsp;<i class="text-pink bold fa fa-angle-right"></i>
<!--                    --><?php //echo element('display_name', $result); ?>
<!--                    --><?php ////echo element('display_datetime', $result); ?>
<!--                    --><?php //if (element('is_hot', $result)) { ?><!--<span class="label label-danger">Hot</span>--><?php //} ?>
<!--                    --><?php //if (element('is_new', $result)) { ?><!--<span class="label label-warning">New</span>--><?php //} ?>
<!--                    --><?php //if (element('post_secret', $result)) { ?><!--<span class="fa fa-lock"></span>--><?php //} ?>
<!--                    --><?php //if (element('post_comment_count', $result)) { ?><!--<span class="comment-count"><i class="fa fa-comments"></i>--><?php //echo element('post_comment_count', $result); ?><!--</span>--><?php //} ?>
<!--                    <span class="hit-count"><i class="fa fa-eye"></i> --><?php //echo number_format(element('post_hit', $result)); ?><!--</span>-->
                </a>
            </div>
        <?php
                $i++;
                if ($cols && $i > 0 && $i % $cols === 0 && $open) {
                    echo '</div>';
                    $open = false;
                }
            }
        }
        if ($open) {
            echo '</div>';
            $open = false;
        }
        ?>
    </div>
    <?php echo form_close(); ?>



</div>

<?php echo element('footercontent', element('board', element('list', $view))); ?>
</div>
<?php
if (element('highlight_keyword', element('list', $view))) {
    $this->managelayout->add_js(base_url('assets/js/jquery.highlight.js')); ?>
<script type="text/javascript">
//<![CDATA[
$('#fboardlist').highlight([<?php echo element('highlight_keyword', element('list', $view));?>]);
//]]>
</script>
<?php } ?>
