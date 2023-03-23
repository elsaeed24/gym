
<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    @if (session()->has($type))
        <div class="alert alert-{{ $type }}">
            {{ session()->get($type) }}
        </div>
    @endif
</div>
