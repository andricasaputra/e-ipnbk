 <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}"  alt="logo" /></a>
    {{-- <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a> --}}
  </div>
  <ul class="nav">

    <li class="nav-item nav-profile">
      <a href="{{ route('admin.home.index') }}" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset('assets/images/faces/face1.jpg') }}" id="container_foto" alt="profile" />
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column pr-3">
          <span class="font-weight-medium mb-2" id="container_nama"></span>
          <span class="font-weight-normal" id="container_nip"></span>
        </div>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.home.index') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.survey.history') }}">
        <i class="mdi mdi-file-document menu-icon"></i>
        <span class="menu-title">Survey</span>
      </a>
    </li>

    @can('admin')

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.setting.index') }}">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Jadwal</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.question.index') }}">
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        <span class="menu-title">Pertanyaan</span>
      </a>
    </li>

     <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.answer.index') }}">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Jawaban</span>
      </a>
    </li>

    @endcan

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.statistik.index') }}">
        <i class="mdi mdi-chart-bar menu-icon"></i>
        <span class="menu-title">Statistik</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ asset('permentan_37_2020.pdf') }}" target="_blank">
          <i class="mdi mdi-bank menu-icon"></i>
        Dasar Hukum</a>
      </li>

   {{--  <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="{{ route('admin.setting.index') }}" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        <span class="menu-title">Setting</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
          </li>
        </ul>
      </div>
    </li> --}}

{{-- 
    <li class="nav-item">
      <a class="nav-link" href="pages/charts/chartjs.html">
        <i class="mdi mdi-chart-bar menu-icon"></i>
        <span class="menu-title">Charts</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/tables/basic-table.html">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Tables</span>
      </a>
    </li>

    <li class="nav-item">
      <span class="nav-link" href="#">
        <span class="menu-title">Docs</span>
      </span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
    <li class="nav-item sidebar-actions">
      <div class="nav-link">
        <div class="mt-4">
          <div class="border-none">
            <p class="text-black">Notification</p>
          </div>
          <ul class="mt-4 pl-0">
            <li>Sign Out</li>
          </ul>
        </div>
      </div>
    </li> --}}
  </ul>
</nav>