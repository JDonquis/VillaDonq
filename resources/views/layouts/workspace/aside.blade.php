<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    <img src="{{asset("assets/img/Logo.png")}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">VillaDonq</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="image">
        <img src="{{asset('assets/img/user/guest.webp')}}" class="img-circle elevation-2" alt="User Image">
      </div>

      <div class="info">
        <a href="#" class="d-block"> {{session()->get('name')." ".session()->get('last_name')}} </a>
      </div>
    </div>



     <nav class="mt-2">

        @include("layouts.workspace.menus.".strtolower( session()->get('type_user_name')) )

     </nav>

  </div>
</aside>