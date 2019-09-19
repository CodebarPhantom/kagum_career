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
        
             <div id="processTabs">
						
                        <?php foreach ($get_job_requirement_data as $job_requirement){?>
                        <div class="heading-block center"> 
                             <h2><?php echo $job_requirement->position_name; ?></h2>
                             <span class="divcenter"><i class="icon-building2"></i>&nbsp;&nbsp;<?php echo $job_requirement->hotels_name.' - '.$job_requirement->city_name; ?> </span>
                             <span class="divcenter"><i class="icon-calendar"></i>&nbsp;&nbsp;<?php $expiredate =  $job_requirement->expiredate;
                                    $timestamp = strtotime($expiredate);
                                    $dmy = date("d F Y",$timestamp); echo $lang_expired_date.' - '.$dmy; ?> </span>
                        </div>
                        <ul class="process-steps bottommargin clearfix">
							<li>
								<a href="#ptab1" class="i-rounded i-bordered i-alt divcenter">1</a>
								<h5><?php echo $lang_applicant_profile; ?></h5>
							</li>
							<li>
								<a href="#ptab2" class="i-rounded i-bordered i-alt divcenter">2</a>
								<h5><?php echo $lang_education_experience; ?></h5>
							</li>
							<li>
								<a href="#ptab3" class="i-rounded i-bordered i-alt divcenter">3</a>
								<h5><?php echo $lang_idatt_file; ?></h5>
							</li>
							<li>
								<a href="#ptab4" class="i-rounded i-bordered i-alt divcenter"><i class="icon-line-check"></i></a>
								<h5><?php echo $lang_complete; ?></h5>
							</li>
                        </ul> 
                        <form action="<?php echo base_url('jobapp/job-applyprocess');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
						<div>
                            <input name="applicant_idcareer" type="hidden" value="<?php echo $job_requirement->idcareer; ?>">
							<div id="ptab1">
                            <div class="fancy-title title-bottom-border">
                                <h3><?php echo $lang_applicant_profile; ?></h3>
                            </div> 
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputFirstname"><?php echo $lang_firstname; ?></label>
                                            <input  type="text" name="applicant_firstname" class="form-control" id="inputFirstname" placeholder="<?php echo $lang_firstname; ?>" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputLastname"><?php echo $lang_lastname; ?></label>
                                            <input type="text" name="applicant_lastname" class="form-control" id="inputLastname" placeholder="<?php echo $lang_lastname; ?>" required/>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputBirthplace"><?php echo $lang_birthplace; ?></label>
                                            <input type="text" name ="applicant_birthplace" class="form-control" id="inputBirthplace" placeholder="ex: Bekasi" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputDob"><?php echo $lang_dob; ?></label>
                                            <div class="input-group">
                                                <input type="text" value="" name="applicant_dob" class="form-control dob" placeholder="DD-MM-YYYY" required/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                                </div>
									        </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail"><?php echo $lang_email; ?></label>
                                            <input type="text" name="applicant_email" class="form-control" id="inputEmail" placeholder="<?php echo $lang_email; ?>" required />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputGender"><?php echo $lang_gender; ?></label>
                                            <select required name="applicant_gender" id="inputGender" class="form-control">
                                                <option selected>Choose...</option>
                                                <option value="male"><?php echo $lang_male; ?></option>
                                                <option value="female"><?php echo $lang_female; ?></option>
                                            </select>
								        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="inputAddress"><?php echo $lang_address; ?></label>
                                        <textarea class="form-control" name="applicant_address" rows="4" required> </textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputHeight"><?php echo $lang_height; ?> &lpar;Cm&rpar;</label>
                                            <input type="number" name="applicant_height" class="form-control" id="inputHeight" placeholder="ex: 172" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputBodyWeight"><?php echo $lang_body_weight; ?> &lpar;KG&rpar;</label>
                                            <input type="number" name="applicant_body_weight" class="form-control" id="inputBodyWeight" placeholder="ex: 75" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPhone"><?php echo $lang_phone; ?></label>
                                            <input type="text" name="applicant_phone" class="form-control" id="inputPhone" placeholder="ex: 022-7xxxxx" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputMobilePhone"><?php echo $lang_mobile_phone; ?></label>
                                            <input type="text" name="applicant_mobile_phone" class="form-control" id="inputMobilePhone" placeholder="ex: 08xx-xxxx-xxxx" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCitizenship"><?php echo $lang_citizenship; ?></label>
                                            <input name="applicant_citizenship" type="text" class="form-control" id="inputCitizenship" placeholder="ex: Indonesia" required/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputReligion"><?php echo $lang_religion; ?></label>
                                            <input name="applicant_religion" type="text" class="form-control" id="inputReligion" placeholder="ex: Islam" required/>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputTribe"><?php echo $lang_tribe; ?></label>
                                            <input name="applicant_tribe" type="text" class="form-control" placeholder="ex: Sunda" id="inputTribe">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputFamilyStatus"><?php echo $lang_family_status; ?></label>
                                            <input type="text" name="applicant_family_status" class="form-control" placeholder="ex: Married" id="inputFamilyStatus">
                                        </div>
                                    </div>     
                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="2" onclick="topFunction()" ><?php echo $lang_next; ?> &rArr;</a>
                                <div class="line"></div>
                            </div>
                            

							<div id="ptab2">
                                <div class="fancy-title title-bottom-border">
                                    <h3 ><?php echo $lang_education_experience; ?></h3>
                                </div>
                                <div class="fancy-title title-border-color nobottommargin">
                                    <h3 ><?php echo $lang_education;?></h3>
                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group ml-auto">
                                        <button type="button" id="btn-add-education" class="button button-small button-border button-rounded button-dirtygreen"><i class="icon-plus"></i> &nbsp;<?php echo $lang_add_education; ?></button>
                                        <button type="button" id="btn-reset-education" class="button button-small button-border button-rounded button-dirtygreen"> <i class="icon-repeat"></i>&nbsp;<?php echo $lang_reset_row; ?></button>
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label><?php echo $lang_education_name; ?></label>
                                            <input type="text" name="education_name[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_major; ?></label>
                                            <input type="text" name="education_major[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_degree;?></label>
                                            <input type="text" name="education_degree[]" class="form-control"  placeholder="Ex: SMA/D3/S1" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $lang_from; ?></label>
                                            <div class="input-group">
                                                <input type="text" value="" name="education_fromdate[]" class="form-control dob" placeholder="DD-MM-YYYY" required/>                                                
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                                </div>
									        </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                        <label><?php echo $lang_to; ?></label>
                                            <div class="input-group">
                                            <input type="text" value="" name="education_todated[]" class="form-control dob" placeholder="DD-MM-YYYY" required/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                                </div>
									        </div>
                                        </div>                                        
                                </div>
                                <div id="insert-education-row"></div>
                                <input type="hidden" id="amount-education" name="row_education" value="1">
                                <div class="line notopmargin"></div>

                                <div class="fancy-title title-border-color nobottommargin">
                                    <h3 ><?php echo $lang_experience ?></h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group ml-auto">
                                        <button type="button" id="btn-add-experience" class="button button-small button-border button-rounded button-dirtygreen"><i class="icon-plus"></i> &nbsp;<?php echo $lang_add_experience; ?></button>
                                        <button type="button" id="btn-reset-experience" class="button button-small button-border button-rounded button-dirtygreen"> <i class="icon-repeat"></i>&nbsp;<?php echo $lang_reset_row; ?></button>
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label><?php echo $lang_company_name; ?></label>
                                            <input type="text" name="company_name[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_industry; ?></label>
                                            <input type="text" name="company_industry[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><?php echo $lang_address;?></label>
                                            <input type="text" name="company_address[]" class="form-control"  placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label><?php echo $lang_phone; ?></label>
                                            <input type="text" value="" name="company_phone[]" class="form-control" placeholder="" required/>
                                        </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3 ml-auto">
                                            <label><?php echo $lang_position; ?></label>
                                            <input type="text" name="company_position[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label><?php echo $lang_join_date; ?></label>
                                            <div class="input-group">
                                                <input type="text" value="" name="company_joindate[]" class="form-control dob" placeholder="DD-MM-YYYY" required/>                                                
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                                </div>
									        </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                        <label><?php echo $lang_end_date; ?></label>
                                            <div class="input-group">
                                            <input type="text" value="" name="company_enddate[]" class="form-control dob" placeholder="DD-MM-YYYY" required/>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                                </div>
									        </div>
                                        </div>  
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3 ml-auto">
                                            <label><?php echo $lang_supervisor_name; ?></label>
                                            <input type="text" name="company_position[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_salary; ?></label>
                                            <input type="number" name="company_salary[]" class="form-control"  required />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_reason_leaving;?></label>
                                            <input type="text" name="company_reasonleaving[]"  class="form-control" required />
                                        </div>
                                </div>
                                <div id="insert-experience-row"></div>
                                <input type="hidden" id="amount-experience" name="row_experience" value="1">
                                <div class="line notopmargin"></div>

                                <div class="fancy-title title-border-color nobottommargin">
                                    <h3 ><?php echo $lang_reference; ?></h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group ml-auto">
                                        <button type="button" id="btn-add-reference" class="button button-small button-border button-rounded button-dirtygreen"><i class="icon-plus"></i> &nbsp;<?php echo $lang_add_reference; ?></button>
                                        <button type="button" id="btn-reset-reference" class="button button-small button-border button-rounded button-dirtygreen"> <i class="icon-repeat"></i>&nbsp;<?php echo $lang_reset_row; ?></button>
                                    </div>
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label><?php echo $lang_reference_name; ?></label>
                                            <input type="text" name="reference_name[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label><?php echo $lang_company_name; ?></label>
                                            <input type="text" name="reference_company[]" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><?php echo $lang_address;?></label>
                                            <input type="text" name="reference_address[]" class="form-control"  placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_phone; ?></label>
                                            <input type="text" value="" name="reference_phone[]" class="form-control" placeholder="" required/>
                                        </div>
                                </div>
                                <div id="insert-reference-row"></div>
                                <input type="hidden" id="amount-reference" name="row_reference" value="1">
                                <div class="line notopmargin"></div>
								<a href="#" class="button button-3d nomargin tab-linker" rel="1" onclick="topFunction()" >&lArr; <?php echo $lang_previous; ?></a>
                                <a href="#" class="button button-3d nomargin fright tab-linker" rel="3" onclick="topFunction()" ><?php echo $lang_next; ?> &rArr;</a>
                                <div class="line"></div>
                            </div>
                            

							<div id="ptab3">
                            <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label><?php echo $lang_idcard_number;?> &lpar;KTP&rpar;</label>
                                            <input type="text" name="idcard_number" class="form-control" placeholder="" required />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_place_release;?></label>
                                            <input type="text" name="idcard_place" class="form-control" placeholder="Karawang" required />
                                            
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>&nbsp;</label>
                                            <div class="input-group">
                                                <input type="text" value="" name="idcard_release" class="form-control dob" placeholder="DD-MM-YYYY" required/>                                                
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                                </div>
									        </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label><?php echo $lang_idcard_valid;?></label>
                                            <div class="input-group">
                                                <input type="text" value="" name="idcard_valid" class="form-control dob" placeholder="DD-MM-YYYY" required/>                                                
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                                                </div>
									        </div>
                                        </div>
                                        
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label><?php echo $lang_attach_photo;?></label><br>
                                            <input name="applicant_photo" id="attachphoto" type="file" accept="image/*" class="file-loading" data-allowed-file-extensions='[]' data-show-preview="false">
                                        </div>   
                                </div>
                                <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label><?php echo $lang_attach_cv;?> &lpar;PDF&rpar;</label><br>
                                            <input name="applicant_cv" id="attachcv" type="file" class="file-loading" data-show-preview="false">
                                            <div id="errorBlock" class="form-text"></div>
                                        </div>   
                                </div>
                                <div class="line nobottommargin"></div>
								<a href="#" class="button button-3d nomargin tab-linker" rel="2" onclick="topFunction()" >&lArr; <?php echo $lang_previous; ?></a>
								<a href="#" class="button button-3d nomargin fright tab-linker" rel="4" onclick="topFunction()"><?php echo $lang_next; ?> &rArr;</a>
							</div>
							<div id="ptab4">
								<div class="alert alert-warning">
                                    <p><strong>EN</strong> <br/>
                                    <strong>Please</strong> check whether all have been filled or not, if already filled in all press <strong>SUMBIT!</strong> to Apply<br/>
                                    If the <strong>SUMBIT!</strong> button cannot be clicked it means that there is still a form that has not been filled in correctly</p> 
                                </div>
                                <div class="alert alert-warning">
                                    <p><strong>ID</strong> <br/>
                                    <strong>Periksa</strong> kembali semua form apakah sudah terisi semua dengan benar atau tidak, jika sudah klik tombol <strong>SUMBIT!</strong> untuk melamar<br/>
                                    Jika tombol <strong>SUMBIT!</strong> tidak bisa di click artinya masih ada form yang belum terisi dengan benar</p> 
                                </div>
                                <a href="#" class="button button-3d nomargin tab-linker" rel="3" onclick="topFunction()" >&lArr; <?php echo $lang_previous; ?></a>
								<input type="submit" class="button button-3d nomargin button-amber fright" value="<?php echo $lang_submit; ?> !" >
							</div>
                        </div>
                    </form>
                        <?php } ?>
					</div>
        </div>



    </div>

</div>


                   
</section><!-- #content end -->
