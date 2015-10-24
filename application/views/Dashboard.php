<div class="page-container">
	<div class="main-content">
		<div class="page-title">
			<div class="title-env">
				<h1 class="title">Register</h1>
				<p class="description">Pendaftaran Aplikasi Pihak ke-3</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title">OCFA System</h3>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel-body">
								<div class="form-horizontal" role="form">
									<?php form_open("Admin/register"); ?>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Nama Applikasi</label>
										<div class="col-sm-10">
											<input class="form-control" name="app_name" id="field-1" type="text" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="field-1">Email</label>
										<div class="col-sm-10">
											<input class="form-control" name="token" id="field-1" type="text" required>
										</div>
									</div>
									<div class="form-group">
										<button class="btn btn-single pull-right" style="color:#ffffff; background-color:#ff0000; border-color:#ff0000;" id="submit" name="submit" >Submit</button>
									</div>
									<?php form_close(); ?>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<footer class="main-footer sticky footer-type-1">
			<div class="footer-inner">
				<!-- Add your copyright text here -->
				<div class="footer-text">
					&copy; 2015 
					<strong>OCFA System</strong> 
				</div>
				
				
				<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
				<div class="go-up">
				
					<a href="#" rel="go-top">
						<i class="fa-angle-up"></i>
					</a>
					
				</div>
				
			</div>
			
		</footer>
	</div>
</div>
<script>
	function post(path, params, method) {
		method = method || "post"; // Set method to post by default if not specified.

		// The rest of this code assumes you are not using a library.
		// It can be made less wordy if you use one.
		var form = document.createElement("form");
		form.setAttribute("method", method);
		form.setAttribute("action", path);

		for(var key in params) {
			if(params.hasOwnProperty(key)) {
				var hiddenField = document.createElement("input");
				hiddenField.setAttribute("type", "hidden");
				hiddenField.setAttribute("name", key);
				hiddenField.setAttribute("value", params[key]);

				form.appendChild(hiddenField);
			 }
		}

		document.body.appendChild(form);
		form.submit();
	}
</script>