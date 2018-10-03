<div class="container">
    <div class="row mt40">
        <div class="col-md-4 <?=$this->input->get('tab_option')=="thism"?"rank rank-active":"rank"?>" onclick="location.href='<?=current_url().'?tab_option=thism'?>'">
            <h1 class="h1-header">이달의</h1>
            <h1 class="h1-body">핫플레이스</h1>
            <span>&nbsp;</span>
        </div>
        <div class="col-md-4 <?=$this->input->get('tab_option')=="nowhot"?"rank rank-active":"rank"?>" onclick="location.href='<?=current_url().'?tab_option=nowhot'?>'">
            <h1 class="h1-header" >요즘 뜨는</h1>
            <h1 class="h1-body">핫플레이스</h1>
            <span>&nbsp;</span>
        </div>
        <div class="col-md-4 <?=$this->input->get('tab_option')=="theme"?"rank rank-active":"rank"?>" onclick="location.href='<?=current_url().'?tab_option=theme'?>'">
            <h1 class="h1-header">테마</h1>
            <h1 class="h1-body">핫플레이스</h1>
            <span>&nbsp;</span>
        </div>
    </div>
    <div class="col-md-6 mt40 pt40">
        <div class="col-md-2 col-md-offset-2">
            <h1 class="text-pink-rank" style="line-height:77px ">01</h1>
        </div>

        <div class="col-md-2 mr20">
            <img src="<?php echo thumb_url('cmallitem', '', 77, 77); ?>" style="border-radius: 4px">
        </div>
        <div class="col-md-5">
            <span class="rank-tit">아프놀레에의 하루</span>
            <label class="label label-pink">강남</label><label class="label label-pink">까페</label>
        </div>

        <div class="clearfix mt40 pd10">&nbsp;</div>

    </div>



    <div class="col-md-6 mt40 pt40" style="border-left:1px solid #eee">
        <div class="col-md-2 col-md-offset-1">
            <h1 class="text-pink-rank" style="line-height:77px ">06</h1>
        </div>

        <div class="col-md-2 mr20">
            <img src="<?php echo thumb_url('cmallitem', '', 77, 77); ?>" style="border-radius: 4px">
        </div>
        <div class="col-md-5 ">
            <span class="rank-tit">아프놀레에의 하루</span>
            <label class="label label-pink">강남</label><label class="label label-pink">까페</label>
        </div>
        <div class="clearfix mt40 pd10">&nbsp;</div>

    </div>
</div>