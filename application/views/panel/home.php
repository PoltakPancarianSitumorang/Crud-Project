

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Users</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data User</h6>


            </div>

            <div class="card-body">
              <div class="table-responsive">
                <a href="<?php echo site_url('welcome/adddata')?>" class="btn btn-success btn-icon">Add Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <marquee bgcolor="white" style="font-family: Arial; font-size:25px; color:#000000;" direction="left"onmouseover="this.stop()" onmouseout="this.start()"><?php echo "<h8>".$this->session->flashdata('msg')."<h8>" ?></marquee>

                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Group</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                  </tfoot>
                  <tbody>
                     <?php foreach ($calldata as $data ): ?>
                    <tr>
                      <td><?php echo $data['username']; ?></td>
                      <td><?php echo $data['password']; ?></td>
                      <td><?php echo $data['name']; ?></td>

                     <td> <a href="<?php echo site_url('welcome/editusers/'. $data['id_user'])?>" class="btn btn-info btn-xs"><i class="fa fa-edit "></i>Edit</a></td>
                     <td><a href="<?php echo site_url('welcome/deleteusers/'. $data['id_user'])?>" class="btn btn-danger"><i class="fa fa-pencil"></i>Delete</a></td>

                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="container" align="right">
            </div>
            <script src="<?php echo base_url(); ?>assets/react/build/react.js"></script>
            <script src="<?php echo base_url(); ?>assets/react/build/react-dom.js"></script>
            <script>
              var ExampleApplication = React.createClass({
                render: function() {
                  var elapsed = Math.round(this.props.elapsed  / 100);
                  var seconds = elapsed / 10 + (elapsed % 10 ? '' : '.0' );
                  var message =
                    'visiting time ' + seconds + ' seconds';

                  return React.DOM.p(null, message);
                }
              });

              // Call React.createFactory instead of directly call ExampleApplication({...}) in React.render
              var ExampleApplicationFactory = React.createFactory(ExampleApplication);

              var start = new Date().getTime();
              setInterval(function() {
                ReactDOM.render(
                  ExampleApplicationFactory({elapsed: new Date().getTime() - start}),
                  document.getElementById('container')
                );
              }, 50);
            </script>

          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
