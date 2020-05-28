


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <title><?= $judul ?></title>

  <link rel="stylesheet" href="http://localhost/pos/assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="http://localhost/pos/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost/pos/assets/dist/css/cssmasum.css">
  <link rel="stylesheet" href="http://localhost/pos/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="http://localhost/pos/assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="http://localhost/pos/assets/dist/css/mycss/theme_v2.css">
  <link rel="stylesheet" href="http://localhost/pos/assets/dist/css/mycss/theme.css">
  <!-- <link rel="stylesheet" href="<?=site_url('assets/dist/mycss/theme.css')?>">
  <link rel="stylesheet" href="<?=site_url('assets/dist/mycss/theme_v2.css')?>"> -->
  <link rel="shortcut icon" type="image/png" href="http://localhost/pos/uploads/images/favicon.ico"/>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body>
    <div class="form-body without-side">
        <div class="website-logo">
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?= base_url('uploads/assets/undraw_Artificial_intelligence_oyxx.svg') ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <!-- <h3 class="text-center">Login</h3> -->
                        <h4 class="text-center">Apps <b>STEGANOGRAPHY</b></h4>
                        <p class="text-center"></p>
                        
                        <?php $this->load->view('template/messages'); ?>
                        <form action="<?= site_url('auth/proses') ?>" method="post">
                            <div class="form-group has-feedback">
                              <div class="input-group">
                                  <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                  </div>
                              </div>
                              <div class="form-group has-feedback">
                                <div class="input-group">
                                  <div class="input-group-addon"><span class="fa fa-eye-slash" id="ikonku" onclick="ShowPassword2()" style="cursor:pointer"></span></div>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                  </div>
                              </div>
                              
                                <div class="">
                                  <!-- <input type="checkbox" onclick="ShowPassword()"> Show Password -->
                                </div>
                                <div class="pull-right">
                                  <button id="submit_button" name="login" type="submit" class="btn btn-primary btn-sm pull-right" onclick="LoadingLogin(this)">
                                    <span id="spinner" class="spinner-border" style="margin-right: 4px; display: none;" role="status" aria-hidden="true"></span>
                                    <i class="fa fa-sign-in"></i> Masuk
                                  </button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="http://localhost/pos/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="http://localhost/pos/assets/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript">

function LoadingLogin() {
        $('#spinner').css('display', 'inline-block');
        $('#submit_button').attr('disabled');
    }

    $(function(){
        var title = '<?= $this->session->flashdata("title") ?>';
        var text = '<?= $this->session->flashdata("text") ?>';
        var icon = '<?= $this->session->flashdata("icon") ?>';

        if(title){
            Swal.fire({
                title: title,
                text: text,
                icon : icon,
            });
        };
    });

    function ShowPassword() {
      var pass= document.getElementById("password");
      if (pass.type === "password") {
        pass.type = "text"
      }
      else {
        pass.type = "password"
      }
    }

    function ShowPassword2() {
      if (document.getElementById("password").type == 'password') {
          document.getElementById("password").type = 'text';
          document.getElementById("ikonku").classList.remove('fa-eye-slash');
          document.getElementById("ikonku").classList.add('fa-eye');
      } 
      else {
          document.getElementById("password").type = 'password';
          document.getElementById("ikonku").classList.remove('fa-eye');
          document.getElementById("ikonku").classList.add('fa-eye-slash');
      }
    }

    grecaptcha.ready(function() {
      grecaptcha.execute('6LegcvoUAAAAAD9odH3WOXmN8znnlUTm8k_xmz6q', {action: 'submit'})
      .then(function(token) {
          document.getElementById('g-recaptcha-response').value=token
      });
    });
</script>

</body>
</html>

