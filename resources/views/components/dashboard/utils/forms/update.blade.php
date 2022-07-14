<form
    method="post"
    action="{{ route($action, [$id]) }}"
    {!! $files ? 'enctype="multipart/form-data"' : '' !!}>
    @csrf
    @method('patch')

    {{ $slot }}
</form>
