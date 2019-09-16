
	<script type="text/javascript">
	    $(function(){
			$('.table-togglable').footable();
		});
	</script>
		<!-- Page header -->
        <div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> <?php echo $lang_vacancy; ?></span> - <?php echo $lang_list_vacancy; ?></h4>
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
						<a href="<?=base_url()?>hradmin/add_vacancy" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-medal2"></i></b> <?php echo $lang_add_vacancy; ?></a>
						</div>
						
						<div class="col-lg-7">
							<div class="input-group">
								<span class="input-group-prepend">
									<span class="input-group-text bg-primary border-primary text-white">
										<i class="icon-search4"></i>
									</span>
								</span>
								<form action="<?php echo site_url('hradmin/list_vacancy'); ?>" class="form-inline" method="get">
									<input type="text" class="form-control border-left-0"  name="q" value="<?php echo $q; ?>" placeholder="<?php echo $lang_search_vacancy; ?>">
									<span class="input-group-append">									
										<button class="btn btn-light" type="submit"> <?php echo $lang_search; ?></button>
										<?php if ($q <> ''){?>
											<a href="<?php echo site_url('hradmin/list_vacancy'); ?>" class="btn btn-light">Reset</a>
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
                                <th data-hide="phone"><?php echo $lang_city; ?></th>
                                <th data-hide="phone"><?php echo $lang_hotel; ?></th>
                                <th data-toggle="true"><?php echo $lang_position_name; ?></th>    
                                <th data-hide="phone,tablet"><?php echo $lang_expire_date; ?></th>
                                <th data-hide="phone,tablet"><?php echo $lang_status; ?></th>
								<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ($career_vacancy_data as $career_vacancy){?>
							<tr>
                                <td><?php echo ++$start; ?></td>
                                <td><?php echo $career_vacancy->city_name; ?></td>
                                <td><?php echo $career_vacancy->hotels_name; ?></td>	
                                <td><?php echo $career_vacancy->position_name; ?></td>
                                <td><?php $expiredate =  $career_vacancy->expiredate;
                                    $timestamp = strtotime($expiredate);
                                    $dmy = date("d-M-Y",$timestamp);
                                    echo $dmy; ?></td>	
                                <td><?php if($career_vacancy->status === 'inactive') { ?>
									<span class="badge badge-danger d-block">Inactive</span> 
								<?php }else if ($career_vacancy->status === 'active'){ ?>
									<span class="badge badge-success d-block">Active</span>
								<?php } ?></td>		
                                													
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
											
												<a href="<?=base_url('hradmin/update_vacancy/').$career_vacancy->idcareer; ?>" class="dropdown-item"><i class="icon-pencil"></i><?php echo $lang_edit_vacancy; ?></a>
												
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
