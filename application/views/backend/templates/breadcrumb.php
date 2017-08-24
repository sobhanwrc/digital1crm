<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo $base_url; ?>dashboard">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span><?php echo $page; ?></span>
        </li>
    </ul>
    <?php if (isset($page) && $page == 'Dashboard') { ?>
    <div class="page-toolbar">
       <!-- <div id="dashboard-report-range" class="pull-right btn" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp;
            <span class="thin uppercase hidden-xs"></span>&nbsp;
            <i class="fa fa-angle-down"></i>-->
       <div style="margin-top: 8px;"> <?php echo date("d-m-Y"); ?></div>
    
<!--        </div>-->
    </div>
    <?php } ?>
</div>

<style>
.page-header-inner {
    width: 17%;
    z-index: -99999999;
}

</style>