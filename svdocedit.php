<?php require_once("lockc.php"); ?>
<html>
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
function uploadadhar()
	{
		var formData= new FormData($('#loginform1')[0]);
		$.ajax({
			url:'uploadadhar.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				if(data=="success")
				{
					location.reload();	
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			},
			cache : false,
			contentType:false,
			processData: false	
		});
	}
	function uploadlicense()
	{
		//alert("il");
		var formData= new FormData($('#loginform2')[0]);
		$.ajax({
			url:'uploadlicense.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				if(data=="success")
				{
					location.reload();	
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			},
			cache : false,
			contentType:false,
			processData: false	
		});
	}
	function uploadrc()
	{
		//alert("il");
		var formData= new FormData($('#loginform3')[0]);
		$.ajax({
			url:'uploadrc.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				if(data=="success")
				{
					location.reload();	
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			},
			cache : false,
			contentType:false,
			processData: false	
		});
	}
	function uploadpuc()
	{
		//alert("il");
		var formData= new FormData($('#loginform4')[0]);
		$.ajax({
			url:'uploadpuc.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				if(data=="success")
				{
					location.reload();	
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			},
			cache : false,
			contentType:false,
			processData: false	
		});
	}
	function uploadinsu()
	{
		//alert("il");
		var formData= new FormData($('#loginform5')[0]);
		$.ajax({
			url:'uploadinsu.php',
			type:'POST',
			data:formData,
			async: false,
			success:function(data)
			{
				if(data=="success")
				{		
					location.reload();		
				}
				else
				{
					$('#error').show();
					$('#error').html(data);
					$('#error').css('color','red');	
					$('#error').fadeOut(5000);			
				}
			},
			cache : false,
			contentType:false,
			processData: false	
		});
	}
</script>
</head>
<body>
<div class="grid-form1">
  	       <h3>Documents upload</h3>
		   <?php if($adhar==""){ ?>
		   <form id="loginform1" name="loginform1" action='javascript:;' onsubmit="uploadadhar()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">Adhar</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="adhar" name="adhar" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
			</form>
		   <?php }else{} if($license==""){ ?>
			<form id="loginform2" name="loginform2" action='javascript:;' onsubmit="uploadlicense()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">License</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="license" name="license" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
			</form>
			<?php } else{}
if($rc==""){ ?>
					<form id="loginform3" name="loginform3" action='javascript:;' onsubmit="uploadrc()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">RC</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="rc" name="rc" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
					</form>
			<?php } else{} if($puc==""){ ?>
					<form id="loginform4" name="loginform4" action='javascript:;' onsubmit="uploadpuc()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">PUC</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="puc" name="puc" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
					</form>	
			<?php } else{} if($insurance==""){ ?>
					<form id="loginform5" name="loginform5" action='javascript:;' onsubmit="uploadinsu()" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-2 control-label">Insurance</label>
							<div class="col-md-10">
								<div class="input-group">							
									<input type="file" id="insurance" name="insurance" class="form-control1">
									<input type="submit" id="sub" name="sub" value="upload" class="btn-primary btn"/>
								</div>
							</div>
						</div>
					</form>	
			<?php } else{} ?>
	</div>
</body>
</html>