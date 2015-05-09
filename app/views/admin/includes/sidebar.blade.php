<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li @if ($menu == 'dashboard')class="active"@endif><a href="{{ Route('admin.dashboard') }}"><span>Dashboard</span></a></li>

      <li @if ($menu == 'social-target')class="active"@endif><a href="{{ Route('admin.social-target') }}"><span>Target Sosial</span></a></li>
      
      <li @if ($menu == 'social-action')class="active"@endif><a href="{{ Route('admin.social-action') }}"><span>Aksi Sosial</span></a></li>
      
      <li @if ($menu == 'event')class="active"@endif><a href="{{ Route('admin.event') }}"><span>Event</span></a></li>

      <li @if ($menu == 'user')class="active"@endif><a href="{{ Route('admin.user') }}"><span>User</span></a></li>

      <li @if ($menu == 'photo')class="active"@endif><a href="{{ Route('admin.photo') }}"><span>Photos</span></a></li>

      <li @if ($menu == 'newsletter')class="active"@endif><a href="{{ Route('admin.newsletter') }}"><span>Newsletter</span></a></li>
      
      <li @if ($menu == 'report')class="active"@endif><a href="{{ Route('admin.report') }}"><span>Laporan</span></a></li>

      <li @if ($menu == 'donation')class="active"@endif><a href="{{ Route('admin.donation') }}"><span>Donasi & Pembayaran</span></a></li>
      
      <li class="treeview @if ($menu == 'master')active @endif">
        <a href="{{ URL::route('admin.dashboard') }}"><span>Master</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ Route('admin.country') }}">Negara</a></li>
          <li><a href="{{ Route('admin.city') }}">Kota</a></li>
          <li><a href="{{ Route('admin.social-target-category') }}">Kategori Target Sosial</a></li>
          <li><a href="{{ Route('admin.social-action-category') }}">Kategori Aksi Sosial</a></li>
          <li><a href="{{ Route('admin.event-category') }}">Kategori Event</a></li>
        </ul>
      </li>

      <li @if ($menu == 'setting')class="active"@endif><a href="{{ Route('admin.setting') }}"><span>Pengaturan</span></a></li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>