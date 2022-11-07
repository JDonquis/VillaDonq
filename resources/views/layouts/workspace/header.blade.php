<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset("assets/LTE/dist/img/AdminLTELogo.png")}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->

 @include("layouts.workspace.navbar")
  <!-- /.Navbar -->

  <!-- Lateral-menu -->

  @include("layouts.workspace.aside")

  <!-- /.Lateral-menu -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title-section')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->