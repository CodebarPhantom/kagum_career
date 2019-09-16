

   <section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">
			<div class="slider-parallax-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark" style="background-image: url('<?php echo base_url();?>assets/frontend/images/slider/swiper/1.jpg');">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 data-animate="fadeInUp">Welcome to Canvas</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on your own Canvas.</p>
								</div>
							</div>
						</div>
						<div class="swiper-slide dark">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 data-animate="fadeInUp">Beautifully Flexible</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
								</div>
							</div>
							<div class="video-wrap">
								<video id="slide-video" poster="<?php echo base_url();?>assets/frontend/images/videos/explore.jpg" preload="auto" loop autoplay muted>
									<source src='<?php echo base_url();?>assets/frontend/images/videos/explore.webm' type='video/webm' />
									<source src='<?php echo base_url();?>assets/frontend/images/videos/explore.mp4' type='video/mp4' />
								</video>
								<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
							</div>
						</div>
						<div class="swiper-slide" style="background-image: url('<?php echo base_url();?>assets/frontend/images/slider/swiper/3.jpg'); background-position: center top;">
							<div class="container clearfix">
								<div class="slider-caption">
									<h2 data-animate="fadeInUp">Great Performance</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
				</div>

				<a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

			</div>
		</section>

		<!-- Content
		============================================= -->
		
		<section id="content">

			<div class="content-wrap">

                <div class="container clearfix">

                    <div class="heading-block center">
                        <h2>Kagum Hotels Latest Vacancies</h2>
                        <span class="divcenter">"We provide excellent environment where great careers are available for aspiring individuals. are you one of them?" </span>
                    </div>						
                        <div class="postcontent nobottommargin col_last clearfix">
						<div class="table-responsive table-hover">
							<table class="table">
								<thead>
								  <tr>									
									<th>Position Name</th>
									<th>Placement</th>
									<th>Hotels</th>
									<th>Expired Date</th>								
								  </tr>
								</thead>
								<tbody>
								<?php foreach ($jobapp_vacancy_data as $jobapp_vacancy){?>
								  <tr>									
									<td><?php echo $jobapp_vacancy->position_name; ?></td>
									<td><?php echo $jobapp_vacancy->city_name; ?></td>
									<td><?php echo $jobapp_vacancy->hotels_name; ?></td>
									<td><?php $expiredate =  $jobapp_vacancy->expiredate;
                                    $timestamp = strtotime($expiredate);
                                    $dmy = date("d-M-Y",$timestamp);
                                    echo $dmy; ?></td>									
								  </tr>	
								<?php } ?>														  
								</tbody>
							</table>
                        </div>
                        <div >													
							<?php echo $pagination ?>									
						</div>
                        </div>
                        <!-- Sidebar
					============================================= -->
					<style>
						.list-group-mine .list-group-item-action:hover {
							background-color : #1ea58a !important;
							border-top: 1px solid #1ea58a;
							border-bottom: 1px solid #1ea58a;
							border-left-color: 1px solid #1ea58a;
							border-right-color: 1px solid #1ea58a;
							color: white;
						}

					.actives {
							background-color : #1abc9c !important;
							border-top: 1px solid #1abc9c;
							border-bottom: 1px solid #1abc9c;
							border-left-color: 1px solid #1abc9c;
							border-right-color: 1px solid #1abc9c;
							color: white;
						}
					</style>  
					<div class="sidebar nobottommargin clearfix">
						<div class="sidebar-widgets-wrap">
						<div class="widget widget_links clearfix">	
							<h4>Browse Job</h4>
                            <div class="list-group list-group-mine">
							<?php foreach ($dept_vacancy as $row_dep){ 
								$total = 0;
										if(!empty($dept_count[$row_dep->iddept])){
											$total = $dept_count[$row_dep->iddept];
										}?>
								<a href="<?php echo base_url()?>jobapp/job_dept/<?php echo $row_dep->iddept; ?>" class="list-group-item list-group-item-action "><?php echo $row_dep->deptname;?><span class="badge badge-secondary float-right" style="margin-top: 3px;"><?php echo $total; ?></span></a>
							<?php } ?>
								
                                
							</div>
						</div>							
						</div>
					</div><!-- .sidebar end -->

                </div>              
            </div>       

		</section><!-- #content end -->