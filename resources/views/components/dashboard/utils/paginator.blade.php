<ul class="pagination mb-0">
    <li class="page-item {{ ($paginator->currentPage() === 1) ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1).'&year='.$year }}" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a class="page-link" href="{{ $paginator->url($i).'&year='.$year }}">
                {{ $i }}
                @if ($i === $paginator->CurrentPage())
                    <span class="sr-only">(current)</span>
                @endif
            </a>
        </li>
    @endfor
    <li class="page-item {{ ($paginator->currentPage() === $paginator->lastPage()) ? 'disabled' : '' }}">
        <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1).'&year='.$year }}">
            <i class="fas fa-chevron-right"></i>
        </a>
    </li>
</ul>
