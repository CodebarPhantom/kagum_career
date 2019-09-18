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
		$(function() {
			$('.dob').datepicker({
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
                                            "<input type='text' name='major[]' class='form-control' placeholder='' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>Degree</label>"+
                                            "<input type='text' name='degree[]' class='form-control'  placeholder='Ex: SMA/D3/S1' required />"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>From</label>"+
                                            "<input type='text' value='' name='fromdate[]' class='form-control dob' placeholder='DD-MM-YYYY' required/>"+
                                        "</div>"+
                                        "<div class='form-group col-md-2'>"+
                                            "<label>To</label>"+
                                            "<input type='text' value='' name='todated[]' class='form-control dob' placeholder='DD-MM-YYYY' required/>"+
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
	