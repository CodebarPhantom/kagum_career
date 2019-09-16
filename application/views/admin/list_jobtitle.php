
	<script type="text/javascript">
	    $(function(){
			$('.table-togglable').footable();
		});
	</script>
		<!-- Page header -->
        <div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> <?php echo $lang_job_title; ?></span> - <?php echo $lang_list_job_titles; ?></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
		</div>
		<!-- /page header -->                
                <!-- Row toggler -->
				<div class="card">
					<div class="card-header header-elements-inline">
					<div class="col-md-10">
					<div class="form-group row">
						<div class="col-lg-3">
							<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left" data-toggle="modal" data-target="#modal_add_jobtitle"><b><i class="icon-medal2"></i></b> <?php echo $lang_add_job_title; ?></button>
						</div>
						
						<div class="col-lg-7">
							<div class="input-group">
								<span class="input-group-prepend">
									<span class="input-group-text bg-primary border-primary text-white">
										<i class="icon-search4"></i>
									</span>
								</span>
								<form action="<?php echo site_url('hradmin/list_jobtitle'); ?>" class="form-inline" method="get">
									<input type="text" class="form-control border-left-0"  name="q" value="<?php echo $q; ?>" placeholder="<?php echo $lang_search_jobtitle; ?>">
									<span class="input-group-append">									
										<button class="btn btn-light" type="submit"> <?php echo $lang_search; ?></button>
										<?php if ($q <> ''){?>
											<a href="<?php echo site_url('hradmin/list_jobtitle'); ?>" class="btn btn-light">Reset</a>
										<?php } ?>
									</span>
								</form>
							</div>										
						</div>
					</div>
					</div>	
					<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                	</div>
	                	</div>
					</div>

					<table class="table table-bordered table-togglable table-hover  ">
						<thead>
							<tr>
								<th data-hide="phone">#</th>
								<th data-toggle="true"><?php echo $lang_position_name; ?></th>    
                                <th data-hide="phone,tablet"><?php echo $lang_departement; ?></th>	
								<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($career_jobtitle_data as $career_jobtitle){?>
							<tr>
								<td><?php echo ++$start ?></td>
								<td><?php echo $career_jobtitle->position_name; ?></td>		
                                <td><span class="badge <?php echo $career_jobtitle->background_class; ?> d-block"><?php echo $career_jobtitle->deptname; ?></span></td>														
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a data-toggle="modal" data-target="#modal_edit_jobtitle<?=$career_jobtitle->idjobtitle;?>" class="dropdown-item"><i class="icon-pencil"></i><?php echo $lang_edit_jobtitle; ?></a>
												<a href="<?php echo base_url('hradmin/delete_jobtitle/'.$career_jobtitle->idjobtitle);?>" class="dropdown-item delete_data"><i class="icon-cross2"></i><?php echo $lang_delete_jobtitle; ?></a>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
						
					<div >													
						<?php echo $pagination ?>									
					</div>
				</div>
				<!-- /row toggler -->

				<!-- Vertical form modal -->
				<div id="modal_add_jobtitle" class="modal fade" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><?php echo $lang_add_job_title; ?></h5>
								<button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>

							<form action="<?=base_url()?>hradmin/insert_jobtitle" method="post">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
                                        <div class="col-sm-6">
												<label><?php echo $lang_departement; ?></label>
												<select name="iddept" class="form-control" required autocomplete="off">
													<option value=""><?php echo $lang_choose_departement; ?></option>
												<?php
													$deptData = $this->Career_jobtitle_model->getDataAll('career_dept', 'iddept', 'ASC');
													for ($p = 0; $p < count($deptData); ++$p) {
														$iddept = $deptData[$p]->iddept;
														$deptname = $deptData[$p]->deptname;?>
														<option  value="<?php echo $iddept; ?>">
															<?php echo $deptname; ?>
														</option>
												<?php
														unset($iddept);
														unset($deptname);
													}
												?>
												</select>
											</div>
											

											<div class="col-sm-6">
												<label><?php echo $lang_position_name; ?></label>
												<input type="text" name="position_name" placeholder="Position Name..." class="form-control" required>
											</div>											
										</div>
									</div>								
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" aria-hidden="true" data-dismiss="modal"><?php echo $lang_close; ?></button>
									<button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /vertical form modal -->

				<!-- Vertical form modal -->
				<?php foreach ($career_jobtitle_data as $career_jobtitle){?>
				<div id="modal_edit_jobtitle<?=$career_jobtitle->idjobtitle;?>" class="modal fade" tabindex="-1"  aria-hidden="true">
				<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"><?php echo $lang_edit_jobtitle; ?></h5>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							</div>

							<form action="<?=base_url()?>hradmin/update_jobtitle" method="post">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
                                        <div class="col-sm-6">
												<label><?php echo $lang_departement; ?></label>
												<select name="iddept" class="form-control" required autocomplete="off">
													<option value=""><?php echo $lang_choose_departement; ?></option>
												<?php
													$departement = $career_jobtitle->iddept;
													$deptData = $this->Career_jobtitle_model->getDataAll('career_dept', 'iddept', 'ASC');
													for ($p = 0; $p < count($deptData); ++$p) {
														$iddept = $deptData[$p]->iddept;
														$deptname = $deptData[$p]->deptname;?>
														<option  value="<?php echo $iddept;?>"  <?php if ($departement == $iddept) {
																echo 'selected="selected"';
															} ?> >
															<?php echo $deptname; ?>
														</option>
												<?php
														unset($iddept);
														unset($deptname);
													}
												?>
												</select>
											</div>
											<div class="col-sm-6">
												<label><?php echo $lang_position_name; ?></label>
												<input type="text" name="position_name" placeholder="Position Name..." class="form-control" value="<?=$career_jobtitle->position_name;?>" required>
											</div>
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<input type="hidden" name="idjobtitle" class="form-control" value="<?=$career_jobtitle->idjobtitle;?>" required>
									<button type="button" class="btn btn-link" aria-hidden="true" data-dismiss="modal"><?php echo $lang_close; ?></button>
									<button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
							<?php } ?>
				<!-- /vertical form modal -->