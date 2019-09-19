	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?php echo base_url();?>assets/frontend/js/jquery.js"></script>
	<script src="<?php echo base_url();?>assets/frontend/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="<?php echo base_url();?>assets/frontend/js/functions.js"></script>
	<!-- Date & Time Picker JS -->
	<script src="<?php echo base_url();?>assets/frontend/js/components/moment.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/components/datepicker.js"></script>
    
    <!-- Bootstrap File Upload Plugin -->
	<script src="<?php echo base_url();?>assets/frontend/js/components/bs-filestyle.js"></script>
	
	<script>
		$(function() {
			$( "#side-navigation" ).tabs({ show: { effect: "fade", duration: 400 } });
		});
	</script>
	<script>
		$(function() {
			$( "#processTabs" ).tabs({ show: { effect: "fade", duration: 400 } });
			$( ".tab-linker" ).click(function() {
				$( "#processTabs" ).tabs("option", "active", $(this).attr('rel') - 1);
				return false;
			});
		});
	</script>
	<script>
		$('body').on('focus',".dob", function(){
		$(this).datepicker({
			autoclose: true,
			todayHighlight: true,
			format: "dd-mm-yyyy",
			});
		});		
	</script>
	
	<script>
                        $(document).ready(function(){ // Ketika halaman sudah diload dan siap
                            $("#btn-add-education").click(function(){ // Ketika tombol Tambah Data Form di klik
                                var amount = parseInt($("#amount-education").val()); // Ambil jumlah data form pada textbox jumlah-form
                                var nextform = amount + 1; // Tambah 1 untuk jumlah form nya
                                
                                // Kita akan menambahkan form dengan menggunakan append
                                // pada sebuah tag div yg kita beri id insert-form
                                $("#insert-education-row").append(                                  
                                    "<div class='form-row'>"+
                                        "<div class='form-group col-md-4'>"+
                                            "<label>Education Name</label>"+
                                            "<input type='text' name='education_name[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>Major</label>"+
                                            "<input type='text' name='education_major[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>Degree</label>"+
                                            "<input type='text' name='education_degree[]' class='form-control'  placeholder='Ex: SMA/D3/S1' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                        "<label>From</label>"+
                                            "<div class='input-group'>"+
                                                "<input type='text' value='' name='education_fromdate[]' class='form-control dob' placeholder='DD-MM-YYYY' required/>"+                                                
                                                "<div class='input-group-append'>"+
                                                    "<div class='input-group-text'><i class='icon-calendar2'></i></div>"+
                                                "</div>"+
									        "</div>"+
                                        "</div>"+
                                       "<div class='form-group col-md-2'>"+
                                        "<label>To</label>"+
                                            "<div class='input-group'>"+
                                            "<input type='text' value='' name='education_todated[]' class='form-control dob' placeholder='DD-MM-YYYY' required/>"+
                                                "<div class='input-group-append'>"+
                                                    "<div class='input-group-text'><i class='icon-calendar2'></i></div>"+
                                                "</div>"+
									        "</div>"+
                                        "</div>"+  
                                "</div>");
                                
                                $("#amount-education").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
                            });
                            
                            // Buat fungsi untuk mereset form ke semula
                            $("#btn-reset-education").click(function(){
                                $("#insert-education-row").html(""); // Kita kosongkan isi dari div insert-form
                                $("#amount-education").val("1"); // Ubah kembali value jumlah form menjadi 1
                            });
                        });
    </script>
    <script>
                        $(document).ready(function(){ // Ketika halaman sudah diload dan siap
                            $("#btn-add-experience").click(function(){ // Ketika tombol Tambah Data Form di klik
                                var amount = parseInt($("#amount-experience").val()); // Ambil jumlah data form pada textbox jumlah-form
                                var nextform = amount + 1; // Tambah 1 untuk jumlah form nya
                                
                                // Kita akan menambahkan form dengan menggunakan append
                                // pada sebuah tag div yg kita beri id insert-form
                                $("#insert-experience-row").append(                                  
                                    "<div class='form-row'>"+
                                        "<div class='form-group col-md-3'>"+
                                            "<label>Company Name</label>"+
                                            "<input type='text' name='company_name[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>Industry</label>"+
                                            "<input type='text' name='company_industry[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-4'>"+
                                            "<label>Address</label>"+
                                            "<input type='text' name='company_address[]' class='form-control'  placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-3'>"+
                                            "<label>Phone</label>"+
                                            "<input type='text' value='' name='company_phone[]' class='form-control' placeholder='' required/>"+
                                        "</div>"+
                                "</div>"+
                                "<div class='form-row'>"+
                                        "<div class='form-group col-md-3 ml-auto'>"+
                                            "<label>Position</label>"+
                                            "<input type='text' name='company_position[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                        "<label>Join Date</label>"+
                                            "<div class='input-group'>"+
                                                "<input type='text' value='' name='company_joindate[]' class='form-control dob' placeholder='DD-MM-YYYY' required/>"+                                                
                                                "<div class='input-group-append'>"+
                                                    "<div class='input-group-text'><i class='icon-calendar2'></i></div>"+
                                                "</div>"+
									        "</div>"+
                                        "</div>"+

                                        "<div class='form-group col-md-2'>"+
                                        "<label>End Date</label>"+
                                            "<div class='input-group'>"+
                                            "<input type='text' value='' name='company_enddate[]' class='form-control dob' placeholder='DD-MM-YYYY' required/>"+
                                                "<div class='input-group-append'>"+
                                                    "<div class='input-group-text'><i class='icon-calendar2'></i></div>"+
                                                "</div>"+
									        "</div>"+
                                        "</div>"+ 
                                "</div>"+
                                "<div class='form-row'>"+
                                        "<div class='form-group col-md-3 ml-auto'>"+
                                            "<label>Supervisor Name</label>"+
                                            "<input type='text' name='company_position[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>Salary</label>"+
                                            "<input type='number' name='company_salary[]' class='form-control'  required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>Reason Leaving</label>"+
                                            "<input type='text' name='company_reasonleaving[]' class='form-control' required />"+
                                        "</div>"+
                                "</div>");
                                
                                $("#amount-experience").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
                            });
                            
                            // Buat fungsi untuk mereset form ke semula
                            $("#btn-reset-experience").click(function(){
                                $("#insert-experience-row").html(""); // Kita kosongkan isi dari div insert-form
                                $("#amount-experience").val("1"); // Ubah kembali value jumlah form menjadi 1
                            });
                        });
    </script>
    <script>
                        $(document).ready(function(){ // Ketika halaman sudah diload dan siap
                            $("#btn-add-reference").click(function(){ // Ketika tombol Tambah Data Form di klik
                                var amount = parseInt($("#amount-reference").val()); // Ambil jumlah data form pada textbox jumlah-form
                                var nextform = amount + 1; // Tambah 1 untuk jumlah form nya
                                
                                // Kita akan menambahkan form dengan menggunakan append
                                // pada sebuah tag div yg kita beri id insert-form
                                $("#insert-reference-row").append(                                  
                                    "<div class='form-row'>"+
                                        "<div class='form-group col-md-3'>"+
                                            "<label>Reference Name</label>"+
                                            "<input type='text' name='reference_name[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-3'>"+
                                            "<label>Company Name</label>"+
                                            "<input type='text' name='reference_company[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-4'>"+
                                            "<label>Address</label>"+
                                            "<input type='text' name='reference_address[]' class='form-control'  placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>Phone</label>"+
                                            "<input type='text' value='' name='reference_phone[]' class='form-control' placeholder='' required/>"+
                                        "</div>"+
                                "</div>");
                                
                                $("#amount-reference").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
                            });
                            
                            // Buat fungsi untuk mereset form ke semula
                            $("#btn-reset-reference").click(function(){
                                $("#insert-reference-row").html(""); // Kita kosongkan isi dari div insert-form
                                $("#amount-reference").val("1"); // Ubah kembali value jumlah form menjadi 1
                            });
                        });
    </script>
    <script>
		$(document).ready(function() {
            $("#attachphoto").fileinput({
                showPreview: false,
                showUpload: false,
                browseClass: "btn btn-info",
                browseLabel: "Upload Photo",
                browseIcon: "<i class=\"icon-photo\"></i>  ",
				layoutTemplates: {
					main1: "{preview}\n" +
					"<div class=\'input-group {class}\'>\n" +
					"   <div class=\'input-group-append\'>\n" +
					"       {browse}\n" +
					"       {remove}\n" +
					"   </div>\n" +
					"   {caption}\n" +
					"</div>"
				}
            });
            
            $("#attachcv").fileinput({
                showPreview: false,
                showUpload: false,
                allowedFileExtensions: ["pdf"],
                browseClass: "btn btn-info",
                browseLabel: "Upload CV",
                browseIcon: "<i class=\"icon-note\"></i>  ",
				elErrorContainer: "#errorBlock",layoutTemplates: {
					main1: "{preview}\n" +
					"<div class=\'input-group {class}\'>\n" +
					"   <div class=\'input-group-append\'>\n" +
					"       {browse}\n" +
					"       {remove}\n" +
					"   </div>\n" +
					"   {caption}\n" +
					"</div>"
				}
			});
        });
    </script>

    <script>
    function topFunction() {
    window.scrollTo({top: 200, behavior: 'smooth'});
    }
    </script>

    