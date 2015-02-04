<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>Workflow Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css"
    rel="stylesheet">
    <link href="<?php echo base_url(); ?>style.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <div class="container main">
      <div class="row">
        <div class="col-md-12 col-sm-12 header" style="">
          <div class="logo">
            <a href=""><img src="<?php echo base_url(); ?>images/logo.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="row main_container">
        <div class="col-md-offset-3 col-md-6 ">
          <h3 class="text-center login">Login</h3>
          <form class="form-horizontal login_form" role="form" action="<?php echo base_url()?>welcome/check_login" method="POST">
            <div class="form-group">
              <div class="col-sm-4">
                <label for="inputEmail3" class="control-label">Email:</label>
              </div>
              <div class="col-sm-8">
                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4">
                <label for="inputPassword3" class="control-label">Password:</label>
              </div>
              <div class="col-sm-8">
                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
                <div class="checkbox">
                  <label>
                    <input type="checkbox">Remember me</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn btn-default">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 footer">
          <p>©Daffodil International University. All right reserved.</p>
        </div>
      </div>
    </div>
  </body>

</html>