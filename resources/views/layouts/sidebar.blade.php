
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index3.html" class="brand-link">
    <img src="/img/logo.png" alt="Laravel Starter" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Outdoor APP</span>
  </a>
  
  <div class="sidebar">    
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> {{auth()->user()->name!=null ? auth()->user()->name : "Administrator"}} </a>
      </div>
    </div>
    
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview {!! classActivePath(1,'outapp') !!}">
          <a class="nav-link {!! classActiveSegment(1, 'outapp') !!}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Administração
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">        
            <li class="nav-item">
              <a href="{{ route('outdoor') }}" class="nav-link {!! classActiveSegment(2, 'outdoor') !!}">
                <i class="fas fa-circle"></i>
                <p>Outdoor</p>
              </a>
            </li>                                                                   
          </ul>
        </li>        
      </ul>
    </nav>    
  </div>  
</aside>