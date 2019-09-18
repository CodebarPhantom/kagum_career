<section id="page-title" class="page-title-parallax page-title-dark" style="background-image: url('<?php echo base_url();?>assets/frontend/images/about/parallax.jpg'); padding: 50px 0;" data-bottom-top="background-position:0px 250px;" data-top-bottom="background-position:0px -250px;">
<div class="container clearfix">
    <h1>Job Openings</h1>
    <span>Join our Fabulous Team of Intelligent Individuals</span>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Jobs</li>
    </ol>
</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

<div class="content-wrap">

    <div class="container clearfix">
        
        <div class="nobottommargin">
        <?php foreach ($get_job_requirement_data as $job_requirement){?>
        <form action="<?php echo base_url('jobapp/job-apply');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="fancy-title title-bottom-border">
                <h3><?= $job_requirement->position_name; ?></h3>               
            </div>
            <h4><?php echo $lang_expired_date; ?> <?php $expiredate =  $job_requirement->expiredate;
                                    $timestamp = strtotime($expiredate);
                                    $dmy = date("d F Y",$timestamp);
                                    echo $dmy; ?> </h4>            
            <input type="hidden" name="idcareer" value="<?= $job_requirement->idcareer; ?>" />
            <div class="tabs tabs-responsive tabs-bb  tabs-bordered clearfix">
                
                <ul class="tab-nav clearfix">
                    <li><a href="#tab-responsive-1"><?php echo $lang_requirement; ?></a></li>
                    <li><a href="#tab-responsive-2"><?php echo $lang_placement; ?></a></li>
                    
                </ul>

                <div class="tab-container">
                    
                    <div class="tab-content clearfix" id="tab-responsive-1">
                    <style>
                        ul > li {
                        margin-left: 30px;
                    }                                            
                    </style>
                        <?= $job_requirement->requirement; ?>
                    </div>
                    <div class="tab-content clearfix" id="tab-responsive-2">
                        <i class="icon-building2">&nbsp;</i><?= $job_requirement->city_name.' - '.$job_requirement->hotels_name; ?>
                    </div>
                </div>

            </div>
            
                <input type="submit"class="button button-3d button-black nomargin" value="<?php echo $lang_apply_now; ?>">               
            </form>
        <?php } ?>
        </div>
        </div>



    </div>

</div>

</section><!-- #content end -->