<section class="content-header">
  <h1>
    {{ $title }}
    <small>{{ isset($description) ? $description : '' }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ Route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    @if (isset($breadcrumb))
      <?php $i = 1; ?>
      @foreach ($breadcrumb as $level => $level_url)
        @if ($i == count($breadcrumb))
        <li class="active">{{ $level }}</li>
        @else
        <li><a href="{{ $level_url }}">{{ $level }}</a></li>
        @endif
        
        <?php $i++; ?>
      @endforeach
    @endif
  </ol>
</section>