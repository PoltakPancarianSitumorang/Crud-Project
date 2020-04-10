<script>
  function printContent(el) {
          var restorepage = document.body.innerHTML;
          var printcontent = document.getElementById(el).innerHTML;
          document.body.innerHTML = printcontent;
          window.print();
          document.body.innerHTML = restorepage;
  }
  </script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Users</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Report Data User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <button class="btn btn-sm btn-outline-primary" onclick="printContent('div1')"><i class="fa fa-print" aria-hidden="true"></i>Print Report</button><br><br>

                <div id="div1">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                  <br>
                  <h1 align="center">Report Data<br>Testing Project Company</h1>
                  <br>
                  <thead>
                    <tr align="center">
                      <th>Username</th>
                      <th>Password</th>
                      <th>Group</th>
                    </tr>
                  </thead>
                  <tfoot>
                  </tfoot>
                  <tbody>
                     <?php foreach ($manager as $data ): ?>
                    <tr align="center">
                      <td><?php echo $data['username']; ?></td>
                      <td><?php echo $data['password']; ?></td>
                      <td><?php echo $data['name']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <br>
                <div align="center">
                     <p align="center">SIGNATURE,</p>
                     <img src="<?php echo base_url();?>assets/ttd.png  " width="100" align="center"/>
                     <br>
                     <u><p align="center">Head Admin</p></u>
                   </div>
              </div>
            </div>
          </div>


</div>
<div id="container" align="right">
</div>
<script src="<?php echo base_url(); ?>assets/react//build/react.js"></script>
<script src="<?php echo base_url(); ?>assets/react//build/react-dom.js"></script>
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
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->
