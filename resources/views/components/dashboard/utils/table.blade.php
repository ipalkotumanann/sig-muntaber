<div class="table-responsive">
    <table class="table table-striped">
        <tbody>
            <tr>
                <th width="100px" class="text-center">No</th>
                @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
                <th width="200px">Aksi</th>
            </tr>
            @if(count($model) >= 1)
                @foreach ($model as $data)
                    <tr>
                        <td class="text-center">{{ $loop->iteration + $model->firstItem() - 1 }}</td>
                        @foreach ($props as $prop)
                            @if(is_array($prop))
                                <td>{{ $data[$prop[0]]->{$prop[1]} }}</td>
                            @else
                                <td>{{ $data[$prop] }}</td>
                            @endif
                        @endforeach
                        <td>
                            <a
                                href="{{ route($links['update']['href'], [$data['id']]) }}"
                                class="btn btn-sm btn-info">
                                <i class="far fa-edit"></i>
                                Edit
                            </a>
                            <button
                                class="btn btn-sm btn-danger"
                                onclick="deleteConfirm(this)"
                                data-href="{{ route($links['delete']['href'], [$data['id']]) }}">
                                <i class="fas fa-trash-alt"></i>
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="{{ count($props) + 3 }}" class="text-center">
                        <h3 class="my-5">Tidak ada data</h3>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
