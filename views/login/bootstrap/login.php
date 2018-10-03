<?php $this->managelayout->add_css(element('view_skin_url', $layout) . '/css/style.css'); ?>

<div class="access col-md-6 col-md-offset-3">
    <div class="panel panel-ffff">

        <div class="panel-body">
            <h1 class="text-center mt50">로그인</h1>
            <?php
            echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
            echo show_alert_message(element('message', $view), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            echo show_alert_message($this->session->flashdata('message'), '<div class="alert alert-auto-close alert-dismissible alert-info"><button type="button" class="close alertclose" >&times;</button>', '</div>');
            $attributes = array('class' => 'form-horizontal', 'name' => 'flogin', 'id' => 'flogin');
            echo form_open(current_full_url(), $attributes);
            ?>
                <input type="hidden" name="url" value="<?php echo html_escape($this->input->get_post('url')); ?>" />
                <div class="form-group row-centered mt50">
<!--                    <label class="col-lg-2 control-label">--><?php//// echo element('userid_label_text', $view);?><!--</label>-->
                    <div class="col-lg-5 col-centered ">
                        <input type="text" name="mem_userid" id="mem_userid"  class="form-control" value="<?php echo set_value('mem_userid'); ?>" accesskey="L" placeholder="<?php echo element('userid_label_text', $view);?>"/>
                    </div>
<!--                    <div class="col-lg-2">&nbsp;</div>-->
                </div>
                <div class="form-group row-centered">
<!--                    <label class="col-lg-2">&nbsp;</label>-->
                    <div class="col-lg-5 col-centered">
                        <input type="password" class="form-control" name="mem_password" id="mem_password"  placeholder="비밀번호"/>
                    </div>
<!--                    <div class="col-lg-2">&nbsp;</div>-->
                </div>
                <div class="form-group text-center mt30 login-form">
                    <a href="<?php echo site_url('findaccount'); ?>" class="" title="아이디 패스워드 찾기">비밀번호 찾기</a>
                    <span> | </span>
                    <a href="<?php echo site_url('register'); ?>" class="" title="회원가입">회원가입</a>

                </div>
                </div>
                <div class="form-group row-centered mt30">
                    <div class="col-sm-2 col-md-3 col-centered">
                        <button type="submit" class="btn btn-dark ">LOG IN</button>
                    </div>
<!--                    <div class="col-sm-6 col-sm-offset-1">-->
<!--                        <label for="autologin">-->
<!--                            <input type="checkbox" name="autologin" id="autologin" value="1" /> 자동로그인-->
<!--                        </label>-->
<!--                    </div>-->
                </div>
                <div class="alert alert-dismissible alert-info autologinalert" style="display:none;">
                    자동로그인 기능을 사용하시면, 브라우저를 닫더라도 로그인이 계속 유지될 수 있습니다. 자동로그이 기능을 사용할 경우 다음 접속부터는 로그인할 필요가 없습니다. 단, 공공장소에서 이용 시 개인정보가 유출될 수 있으니 꼭 로그아웃을 해주세요.
                </div>
            <?php echo form_close(); ?>
            <?php
            if ($this->cbconfig->item('use_sociallogin')) {
                $this->managelayout->add_js(base_url('assets/js/social_login.js'));
            ?>
                <div class="form-group mt30 row-centered login-form">
                    <h5 class="col-centered col-md-6">혹은 <strong>소설계정</strong>으로 간편하게 로그안하세요</h5>
                    <div class="col-lg-12 col-centered mt40">
                    <?php if ($this->cbconfig->item('use_sociallogin_facebook')) {?>
                        <a href="javascript:;" onClick="social_connect_on('facebook');" title="페이스북 로그인" class="mr30"><img src="<?php echo base_url('assets/images/insta.png'); ?>" width="65" height="90" alt="페이스북 로그인" title="페이스북 로그인" /></a>
                    <?php } ?>
                    <?php if ($this->cbconfig->item('use_sociallogin_twitter')) {?>
                        <a href="javascript:;" onClick="social_connect_on('twitter');" title="트위터 로그인" class="mr30"><img src="<?php echo base_url('assets/images/facebook.png'); ?>" width="65" height="90" alt="트위터 로그인" title="트위터 로그인" /></a>
                    <?php } ?>
                    <?php if ($this->cbconfig->item('use_sociallogin_google')) {?>
                        <a href="javascript:;" onClick="social_connect_on('google');" title="구글 로그인" class="mr30"><img src="<?php echo base_url('assets/images/gmail.png'); ?>" width="65" height="90" alt="구글 로그인" title="구글 로그인" /></a>
                    <?php } ?>
                    <?php if ($this->cbconfig->item('use_sociallogin_naver')) {?>
                        <a href="javascript:;" onClick="social_connect_on('naver');" title="네이버 로그인" class="mr30"><img src="<?php echo base_url('assets/images/naver.png'); ?>" width="65" height="90" alt="네이버 로그인" title="네이버 로그인" /></a>
                    <?php } ?>
                    <?php if ($this->cbconfig->item('use_sociallogin_kakao')) {?>
                        <a href="javascript:;" onClick="social_connect_on('kakao');" title="카카오 로그인"><img src="<?php echo base_url('assets/images/kakao.png'); ?>" width="65" height="90" alt="카카오 로그인" title="카카오 로그인" /></a>
                    <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
<!--        <div class="panel-footer">-->
<!--            <div class="pull-right">-->
<!--                <a href="--><?php //echo site_url('register'); ?><!--" class="btn btn-success btn-sm" title="회원가입">회원가입</a>-->
<!--                <a href="--><?php //echo site_url('findaccount'); ?><!--" class="btn btn-default btn-sm" title="아이디 패스워드 찾기">아이디 패스워드 찾기</a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>

<script type="text/javascript">
//<![CDATA[
$(function() {
    $('#flogin').validate({
        rules: {
            mem_userid : { required:true, minlength:3 },
            mem_password : { required:true, minlength:4 }
        }
    });
});
$(document).on('change', "input:checkbox[name='autologin']", function() {
    if (this.checked) {
        $('.autologinalert').show(300);
    } else {
        $('.autologinalert').hide(300);
    }
});
//]]>
</script>
