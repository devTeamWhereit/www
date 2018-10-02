<div class="owl-carousel owl-theme owl-loaded" id="owl-carousel">
    <div class="item img-fluid"> <img src ='/assets/images/1.png' class="img-fluid"> </div>
    <div class="item img-fluid"> <img src ='/assets/images/2.png' class="img-fluid"> </div>
    <div class="item img-fluid"> <img src ='/assets/images/3.png' class="img-fluid"> </div>
</div>
<div class="container">

    <div class="form-inline mt-45">
        <div class="col-md-3">
            <h2 style="float:left">찾으시는 곳</h2><h2 class="h2-med">이</h2>
            <h2 class="h2-med">있으신가요?</h2>
        </div>
        <form class="col-md-9" name="header_search" id="header_search" action="<?php echo site_url('cmall/lists'); ?>" onSubmit="return headerSearch(this);">
            <div class="form-inline mt20 ">
                <div class="col-md-9">
                    <input type="text" class="form-control " placeholder="지역명과 음식을 입력해주세요. Ex) 망원동 양꼬치" name="skeyword" accesskey="s" style="width:100%;"/>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-dark" type="submit">SEARCH</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    //<![CDATA[
    $(function() {
        $('#topmenu-navbar-collapse .dropdown').hover(function() {
            $(this).addClass('open');
        }, function() {
            $(this).removeClass('open');
        });
    });
    function headerSearch(f) {
        var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
        if (skeyword.length < 2) {
            alert('2글자 이상으로 검색해 주세요');
            f.skeyword.focus();
            return false;
        }
        return true;
    }
    //]]>
        $('#owl-carousel').owlCarousel({
            center: true,
            autoWidth:true,
            items: 2,
            loop: true,
            margin: 20,



//            responsive: {
//                0:{
//                    items:1
//                },
//                600: {
//                    items: 1
//                },
//                1100: {
//                    items: 3
//                }
//            },
            nav:true,
            navText: [
                '<i class="ot-circle fa fa-angle-left" aria-label="Prev"></i>',
                '<i class="ot-circle fa fa-angle-right" aria-label="Next"></i>'
            ],
            dots:true,

        });
</script>