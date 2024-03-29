<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
    
	<script type="text/javascript">
	   $(document).ready(function(){

        $(".custom_category").select2();
        // Single picker
        $('.daterange-single').daterangepicker({ 
            singleDatePicker: true,
            locale: {
                format: 'DD-MM-YYYY'
            }
        });
        CKEDITOR.replace('editor-full', {
            height: 400,
            extraPlugins: 'forms'
        });

	} );
	</script>
		<!-- Page header -->
        <div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> <?php echo $lang_vacancy; ?></span> - <?php echo $lang_add_vacancy; ?></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
		</div>
		<!-- /page header -->                
                <!-- Row toggler -->
                <div class="content">
				<div class="row">
					<div class="col-md-12">
			            <!-- Grey background, no left button spacing -->
		                <form action="<?php echo base_url('hradmin/add_vacancy_process');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				            <div class="card">
								<div class="card-header bg-white header-elements-inline">
					                <h6 class="card-title"><?php echo $lang_add_vacancy; ?></h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		
					                	</div>
				                	</div>
								</div>
				                <div class="card-body">
                                    <div class="form-group row">
										<label class="col-form-label col-lg-2"><?php echo $lang_publish_date; ?></label>
										<div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input type="text" name="publishdate" class="form-control daterange-single" value="<?php echo date('d/m/Y'); ?>">
                                        </div>
										</div>
                                    </div>

                                    <div class="form-group row">
										<label class="col-form-label col-lg-2"><?php echo $lang_expire_date; ?></label>
										<div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input type="text" name="expiredate" class="form-control daterange-single" value="<?php $d=strtotime("+1 Months"); echo date("d/m/Y", $d); ?>">
                                        </div>
										</div>
                                    </div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2"><?php echo $lang_city; ?></label>
										<div class="col-lg-10">
                                        <select  name="idcity" class="form-control custom_category" required autocomplete="off">
													<option value=""><?php echo $lang_choose_city; ?></option>
												<?php												
													$cityData = $this->Career_vacancy_model->getDataAll('career_city', 'city_name', 'ASC');
													for ($p = 0; $p < count($cityData); ++$p) {
														$idcity = $cityData[$p]->idcity;
														$city_name = $cityData[$p]->city_name;?>
														<option  value="<?php echo $idcity;?>"  <?php /* if ($departement == $iddept) {
																echo 'selected="selected"';
															} */ ?> >
															<?php echo $city_name; ?>
														</option>
												<?php
														unset($idcity);
														unset($city_name);
													}
												?>
										</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2"><?php echo $lang_hotel; ?></label>
										<div class="col-lg-10">
                                        <select name="idhotels" class="form-control custom_category" required autocomplete="off">
													<option value=""><?php echo $lang_choose_hotels; ?></option>
												<?php												
													$hotelsData = $this->Career_vacancy_model->getDataAll('career_hotels', 'hotels_name', 'ASC');
													for ($p = 0; $p < count($hotelsData); ++$p) {
														$idhotels = $hotelsData[$p]->idhotels;
														$hotels_name = $hotelsData[$p]->hotels_name;?>
														<option  value="<?php echo $idhotels;?>"  <?php /* if ($departement == $iddept) {
																echo 'selected="selected"';
															} */ ?> >
															<?php echo $hotels_name; ?>
														</option>
												<?php
														unset($idhotels);
														unset($hotels_name);
													}
												?>
										</select>
										</div>
                                    </div>

                                                                   
                                    

									<div class="form-group row">
										<label class="col-form-label col-lg-2"><?php echo $lang_position_name; ?></label>
										<div class="col-lg-10">
                                        <select name="idjobtitle" class="form-control custom_category" required autocomplete="off">
													<option value=""><?php echo $lang_choose_position_name; ?></option>
												<?php												
													$jobtlData = $this->Career_vacancy_model->getDataAll('career_jobtitle', 'position_name', 'ASC');
													for ($p = 0; $p < count($jobtlData); ++$p) {
														$idjobtitle = $jobtlData[$p]->idjobtitle;
														$position_name = $jobtlData[$p]->position_name;?>
														<option  value="<?php echo $idjobtitle;?>"  <?php /* if ($departement == $iddept) {
																echo 'selected="selected"';
															} */ ?> >
															<?php echo $position_name; ?>
														</option>
												<?php
														unset($idjobtitle);
														unset($position_name);
													}
												?>
										</select>
										</div>
                                    </div>

                                    <div class="form-group row">
										<label class="col-form-label col-lg-2"><?php echo $lang_requirement; ?></label>
										<div class="col-lg-10">
                                            <textarea name="requirement" id="editor-full" rows="4" cols="4" required>
                                                <p>Kagum Hotels is the rapidly developing hotel management company based in Bandung that currently manages a diverse array of quality hotels spread in many major city in 
                                                    Indonesia such as Bandung, bali, Surabaya, Yogyakarta, Bogor, Klaten and Jakarta. We always set our eyes to become the leader of hospitality industry in Indonesia as we 
                                                    continue to develop and expand our business in the future.</p>
                                                <p>If you&rsquo;re talented,this position might be for you.</p>

                                                <p class="nobottommargin"><b>The Individuals concerned must process the following qualifications:</b></p>
                                                <ul class="iconlist nobottommargin">
                                                    <li>Has previously worked in similar position</li>
                                                    <li>Has a strong desire to be the best,enthusiastic and energic</li>
                                                    <li>Fluency in English both spoke &amp; written</li>
                                                    <li>Result oriented and flexible in time</li>
                                                    <li>Career development oriented</li>
                                                    <li>Excellent interpersonal skill and a team player</li>
                                                </ul>
                                            </textarea>
										</div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-2"><?php echo $lang_status; ?></label> 
										<div class="col-lg-10">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="status" value="Active" id="custom_radio_inline_unchecked" checked>
                                            <label class="custom-control-label" for="custom_radio_inline_unchecked"><?php echo $lang_active; ?></label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" name="status" value="Inactive" id="custom_radio_inline_checked">
                                            <label class="custom-control-label" for="custom_radio_inline_checked"><?php echo $lang_inactive; ?></label>
                                        </div>
										</div>
                                    </div>
                                    
								</div>

								<div class="card-footer bg-teal-400 border-top-0">
									<div class="d-flex justify-content-between align-items-center">
										<a href="<?php echo base_url('hradmin/list-vacancy');?>" class="btn btn-outline bg-danger text-white border-white border-2 cancel"  role="button">Cancel</a>
										<button type="submit" class="btn btn-outline bg-success text-white border-white border-2"><?php echo $lang_submit; ?> <i class="icon-paperplane ml-2"></i></button>
									</div>
								</div>
			                </div>
			            </form>
			            <!-- /grey background, no left button spacing -->
					</div>
				</div>
            </div>
				<!-- /row toggler -->
				
