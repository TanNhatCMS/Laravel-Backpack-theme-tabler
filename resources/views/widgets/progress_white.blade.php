@php
  // defaults; backwards compatibility with Backpack 4.0 widgets
  $widget['wrapper']['class'] = $widget['wrapper']['class'] ?? $widget['wrapperClass'] ?? 'col-sm-6 col-lg-3';
  $accentColor = $widget['accentColor'] ?? 'info';
@endphp

@includeWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_start'))
  <div class="{{ $widget['class'] ?? 'card' }}">
    @if ($widget['ribbon'] ?? false)
        <div class="ribbon ribbon-{{ $widget['ribbon'][0] ?? 'top' }} bg-{{ $accentColor }} @if(($widget['ribbon'][0] ?? '') === 'bottom') mb-3 @endif">
            <i class="la {{ $widget['ribbon'][1] ?? '' }} fs-3"></i>
        </div>
    @endif
    <div class="card-body">
      @if (isset($widget['value']))
      <div class="text-value"><strong>{!! $widget['value'] !!}</strong></div>
      @endif

      @if (isset($widget['description']))
      <div>{!! $widget['description'] !!}</div>
      @endif

      @if (isset($widget['progress']))
      <div class="progress progress-xs my-2">
        <div class="{{ $widget['progressClass'] ?? 'progress-bar' }} bg-{{$accentColor}}" style="width: {{ $widget['progress']  }}%" role="progressbar" aria-valuenow="{{ $widget['progress']  }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $widget['progress']  }}% Complete">
            <span class="visually-hidden">{{ $widget['progress']  }}% Complete</span>
        </div>
    </div>
      @endif

      @if (isset($widget['hint']))
      <small>{!! $widget['hint'] !!}</small>
      @endif
    </div>

    @if (isset($widget['footer_link']))
    <div class="card-footer px-3 py-2">
      <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ $widget['footer_link'] ?? '#' }}"><span class="small font-weight-bold">{{ $widget['footer_text'] ?? 'View more' }}</span><i class="la la-angle-right"></i></a>
    </div>
    @endif
  </div>
@includeWhen(!empty($widget['wrapper']), backpack_view('widgets.inc.wrapper_end'))