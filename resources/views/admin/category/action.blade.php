<div class="project-actions text-right">
    <form action="{{route('categories.destroy', $row->id)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <a href="{{ route('categories.edit', $row->id) }}" class="btn btn-info btn-sm">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
        <a href="{{ route('categories.show', $row->id) }}" class="btn btn-sm btn-primary">
            <i class="fas fa-folder">
            </i> Show
        </a>
        <button id="btnDelete" class="btn btn-danger btn-sm"> <i class="fas fa-trash">
            </i> Delete</button>
    </form>
</div>
