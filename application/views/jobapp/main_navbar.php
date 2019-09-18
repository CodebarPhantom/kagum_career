<header id="header" <?php if ($page_name != 'mainpage'){
				echo "class='full-header'";
			}else{
				
				echo "class='transparent-header full-header' data-sticky-class='not-dark'";
			} ?>>

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="<?php echo base_url();?>assets/frontend/images/logo-dark.png"><img src="<?php echo base_url();?>assets/frontend/images/logo.png" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="<?php echo base_url();?>assets/frontend/images/logo-dark@2x.png"><img src="<?php echo base_url();?>assets/frontend/images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" <?php if ($page_name != 'mainpage'){echo "class='dark'";}?>>

						<ul>
							<li class="current"><a href="<?php echo base_url('jobapp'); ?>"><div>Home</div></a>							
									
							</li>
							
							
							
							<li class="mega-menu"><a href="#"><div>Shortcodes</div></a>
								<div class="mega-menu-content clearfix">
									<ul class="mega-menu-column col-5">
										<li><a href="animations.html"><div><i class="icon-magic"></i>Animations</div></a></li>
										<li><a href="buttons.html"><div><i class="icon-link"></i>Buttons</div></a></li>
										<li><a href="carousel.html"><div><i class="icon-heart3"></i>Carousel</div></a></li>
										<li><a href="charts.html"><div><i class="icon-bar-chart"></i>Charts</div></a></li>
										<li><a href="clients.html"><div><i class="icon-apple"></i>Clients</div></a></li>
										<li><a href="columns-grids.html"><div><i class="icon-th-large"></i>Columns</div></a></li>
										<li><a href="counters.html"><div><i class="icon-time"></i>Counters</div></a></li>
										<li><a href="component-datatable.html"><div><i class="icon-table"></i>Data Tables</div></a></li>
										<li><a href="component-datepicker.html"><div><i class="icon-calendar3"></i>Date &amp; Time Pickers</div></a></li>
									</ul>
									<ul class="mega-menu-column col-5">
										<li><a href="dividers.html"><div><i class="icon-indent-right"></i>Dividers</div></a></li>
										<li><a href="featured-boxes.html"><div><i class="icon-lightbulb"></i>Icon Boxes</div></a></li>
										<li><a href="gallery.html"><div><i class="icon-picture"></i>Galleries</div></a></li>
										<li><a href="headings-dropcaps.html"><div><i class="icon-pencil2"></i>Heading Styles</div></a></li>
										<li><a href="icon-lists.html"><div><i class="icon-list-alt"></i>Icon Lists</div></a></li>
										<li><a href="labels-badges.html"><div><i class="icon-plus-sign"></i>Labels</div></a></li>
										<li><a href="lightbox.html"><div><i class="icon-resize-full"></i>Lightbox</div></a></li>
										<li><a href="form-elements.html"><div><i class="icon-edit"></i>Form Elements</div></a></li>
										<li><a href="component-uploads.html"><div><i class="icon-line-upload"></i>File Uploads</div></a></li>
									</ul>
									<ul class="mega-menu-column col-5">
										<li><a href="lists-cards.html"><div><i class="icon-th-list"></i>Lists &amp; Cards</div></a></li>
										<li><a href="maps.html"><div><i class="icon-map-marker2"></i>Maps</div></a></li>
										<li><a href="media-embeds.html"><div><i class="icon-play"></i>Media Embeds</div></a></li>
										<li><a href="modal-popovers.html"><div><i class="icon-move"></i>Modal Boxes</div></a></li>
										<li><a href="navigation.html"><div><i class="icon-align-justify2"></i>Navigations</div></a></li>
										<li><a href="pagination-progress.html"><div><i class="icon-cogs"></i>Pagination</div></a></li>
										<li><a href="pie-skills.html"><div><i class="icon-tasks"></i>Pies &amp; Skills</div></a></li>
										<li><a href="component-range-slider.html"><div><i class="icon-line-move"></i>Range Slider</div></a></li>
										<li><a href="component-ratings.html"><div><i class="icon-star3"></i>Star Ratings</div></a></li>
									</ul>
									<ul class="mega-menu-column col-5">
										<li><a href="pricing.html"><div><i class="icon-dollar"></i>Pricing Boxes</div></a></li>
										<li><a href="process-steps.html"><div><i class="icon-thumbs-up"></i>Process Steps</div></a></li>
										<li><a href="promo-boxes.html"><div><i class="icon-rocket"></i>Promo Boxes</div></a></li>
										<li><a href="quotes-blockquotes.html"><div><i class="icon-quote-left"></i>Blockquotes</div></a></li>
										<li><a href="responsive.html"><div><i class="icon-laptop2"></i>Responsive</div></a></li>
										<li><a href="sections.html"><div><i class="icon-folder-open"></i>Sections</div></a></li>
										<li><a href="social-icons.html"><div><i class="icon-facebook2"></i>Social Icons</div></a></li>
										<li><a href="component-select-picker.html"><div><i class="icon-select"></i>Select Picker</div></a></li>
										<li><a href="component-select-box.html"><div><i class="icon-line-columns"></i>Select Boxes</div></a></li>
									</ul>
									<ul class="mega-menu-column col-5">
										<li><a href="style-boxes.html"><div><i class="icon-exclamation-sign"></i>Alert Boxes</div></a></li>
										<li><a href="styled-icons.html"><div><i class="icon-flag2"></i>Styled Icons</div></a></li>
										<li><a href="tables.html"><div><i class="icon-table"></i>Tables</div></a></li>
										<li><a href="tabs.html"><div><i class="icon-star3"></i>Tabs</div></a></li>
										<li><a href="testimonials-twitter.html"><div><i class="icon-user4"></i>Testimonials</div></a></li>
										<li><a href="thumbnails-slider.html"><div><i class="icon-camera3"></i>Thumbnails</div></a></li>
										<li><a href="toggles-accordions.html"><div><i class="icon-ok-circle"></i>Toggles</div></a></li>
										<li><a href="component-radios-switches.html"><div><i class="icon-line-square-check"></i>Radios &amp; Switches</div></a></li>
										<li><a href="flip-cards.html"><div><i class="icon-refresh"></i>Flip Cards</div></a></li>
									</ul>
								</div>
							</li>
						</ul>

						
						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->