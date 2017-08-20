<!DOCTYPE html>
<html ng-app="app">
<head>
	<title></title>
  
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/select2.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="/js/jquery.min.js" ></script>
  <script src="/js/bootstrap.min.js" ></script>
  <script src="/js/select2.min.js" ></script>


</head>
<body>
  <nav class="navbar navbar-default header-bg" style="border-style: none">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <span class="navbar-brand" href="#"><img src="/img/benfeitoria_logo.png"></span>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-right header-content" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('post.index') }}">Inicio</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" style="background-color: #e41847" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrativo <span class="caret"></span></a>
              <ul class="dropdown-menu header-bg">
                <li><a href="{{ route('post.create') }}">Criar post</a></li>
                <li><a href="{{ route('post.index') }}">Lista de posts</a></li>
              </ul>
            </li>
          </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="content">
    <div class="container">
      @yield('content')
    </div>
  </div>

  <script src="/assets/ckeditor/ckeditor.js"></script>
  <script src="/assets/ckeditor/adapters/jquery.js"></script>
  <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
  <script src="/assets/js/letter-icons.js"></script>
  <!-- start: JavaScript Event Handlers for this page -->
  <script src="/assets/js/form-text-editor.js"></script>
  <script>
    jQuery(document).ready(function() {
      TextEditor.init();
    });
  </script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#tags").select2();
    $("#authors").select2();
  })
</script>
@include('shared.script.angular')

</body>
</html>