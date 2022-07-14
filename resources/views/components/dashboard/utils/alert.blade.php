<div class="alert {{ $callback['classes'] ?? 'alert-primary' }} alert-has-icon mb-4">
    <div class="alert-icon">
        <i class="{{ $callback['icon'] }}"></i>
    </div>
    <div class="alert-body">
        <div class="alert-title">{{ $callback['title'] }}</div>
        {{ $callback['caption'] }}.
    </div>
</div>
