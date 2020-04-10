<div class="right_col" role="main">
<div align="center" id="body">
	<?php if($editusers){
		$id_user = $editusers->id_user;
		$username = $editusers->username;
		$password = $editusers->password;
		$group = $editusers->group;


	}else{

		$username = "";
		$password = "";
		$group = "";

	} ?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header" align="center">Update Data</div>
      <div class="card-body">

			<form action="<?php echo site_url('welcome/updateusers/'.$id_user)?>" method="POST">

				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<input type="text" class="form-control form-control-user" name="username" value="<?php echo $username?>" placeholder="Username">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control form-control-user" name="password" value="<?php echo $password?>" placeholder="Password">
					</div>
				</div>

				<div class="form-group">
					<label>Group</label>
					<select name="group" value="<?php echo $group?>" class="form-control form-control">
					<optgroup>
					<option value="1">1 (Admin)</option>
					<option value="2">2 (Member)</option>

					</optgroup>
					</select>
				</div>

			 <input type="submit" class="btn btn-primary" name="simpan" value="Save">
			 <a href="<?php echo site_url('welcome/home')?>" class="btn btn-primary">Back</a>
			</form>

		</div>

		</form>

  </div>
