<form
    method="post"
    action="{{ route($action) }}"
    {!! $files ? 'enctype="multipart/form-data"' : '' !!}>
    @csrf

    {{ $slot }}
</form>
