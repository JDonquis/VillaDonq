
  <!-- Navbar -->

 @include("layouts.workspace.navbar")
  <!-- /.Navbar -->

  <!-- Lateral-menu -->

  @include("layouts.workspace.aside")

  <!-- /.Lateral-menu -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('includes.message_error')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title-section')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item text-primary">@yield('title-section')</li>
              <li class="breadcrumb-item active">Workspace v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->