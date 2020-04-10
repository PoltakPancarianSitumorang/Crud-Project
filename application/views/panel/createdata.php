<div class="row-center">

  <div class="col-lg-9-center">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Create a Data!</h1>
      </div>
      <form action="<?php echo site_url('welcome/insertdata')?>" method="POST">
        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="username" placeholder="Username">
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" name="password" placeholder="Password">
          </div>
        </div>

        <div class="form-group">
          <label>Group</label>
          <select name="group" class="form-control form-control">
          <optgroup>
          <option value="1">1 (Admin)</option>
          <option value="2">2 (Member)</option>

          </optgroup>
          </select>
        </div>


        	 <input type="submit" class="btn btn-primary btn-user btn-block" name="save" value="Save">
        <hr>
    </div>
    	</form>
  </div>
</div>

</div>
