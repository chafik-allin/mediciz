
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Mediciz | Créer un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <body class="fixed-header menu-pin menu-behind">
    <div class="register-container full-height sm-p-t-30">
      <div class="d-flex justify-content-center flex-column full-height ">
      
        <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
        <h3>Bonjour {{request()->user()->name}}</h3>
        <p>
          Dans cette page vous allez créer des nouveaux utilisateurs 
        </p>
          @if(count($errors->all())>0)
        <div class="alert alert-danger">
          <ul>          
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">{!! session('success') !!}</div>
        @endif
        <form id="form-register" class="p-t-15" role="form" action="{{route('register')}}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Nom</label>
                <input type="text" name="name" placeholder="nom complet" class="form-control" required value="{{old('name')}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Email</label>
                <input type="email" name="email" placeholder="mail@example.com" class="form-control" required value={{old('email')}}>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe" class="form-control" required >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default">
                <label>Confirmer mot de passe</label>
                <input type="password" name="password_confirmation" placeholder="confirmer mot de passe" class="form-control" required>
              </div>
            </div>
          </div>
          @if(Auth::check() && Auth::user()->isSuperAdmin())
          <div class="row">
            <div class="col-md-12">
              <div class="form-group form-group-default">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                  <option value="-1">Utilisateur</option>
                  @foreach(App\Models\Role::get() as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row" id="company">
            <div class="col-md-12">
              <div class="form-group form-group-default">
                <label for="company_id">Entreprise</label>
                <select name="company_id" id="company_id" class="form-control">
                  @foreach(App\Models\Company::get() as $company)
                  <option value="{{$company->id}}">{{$company->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>          
          @endif
          <div class="row m-t-10">
            <div class="col-lg-6">
              <p><small>I agree to the <a href="#" class="text-info">Pages Terms</a> and <a href="#" class="text-info">Privacy</a>.</small></p>
            </div>  
            <div class="col-lg-6 text-right">
              <a href="#" class="text-info small">Help? Contact Support</a>
            </div>
          </div>
          <button class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
        </form>
      </div>
    </div>

  
    <!-- BEGIN VENDOR JS -->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="assets/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="assets/plugins/classie/classie.js"></script>
    <script src="assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <script src="pages/js/pages.min.js"></script>
    <script>
    $(function()
    {
      $('#form-register').validate()
      $('#role').change(function()
      {
        if($(this).find('option:selected').text() == "superadmin")
          $("#company").css('display','none');
        else
          $("#company").css('display','block');

      })

      if($(this).find('option:selected').text() == "superadmin")
        $("#company").css('display','none');
      else
        $("#company").css('display','block');

      
    })
    </script>
  </body>
</html>