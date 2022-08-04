<div class="flash-message" id="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('message') }}</p>
        @endif
    @endforeach
</div>