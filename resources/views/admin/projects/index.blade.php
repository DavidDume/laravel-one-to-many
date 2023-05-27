@extends('layouts.admin')

@section('content')
    
<a href="{{route('admin.projects.create')}}" class="btn btn-primary">Add a new project</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($projects as $proj)
        <tr>
            <th scope="row">{{$proj->id}}</th>
            <td>{{$proj->title}}</td>
            <td>{{$proj->link}}</td>
            <td>
                <a type="button" class="btn btn-primary" href="{{route('admin.projects.show', ['project' => $proj->id])}}">Mostra</a>
                <a type="button" class="btn btn-warning" href="{{route('admin.projects.edit', ['project' => $proj->id])}}">Modifica</a>
                <form action="{{route('admin.projects.destroy', ['project' => $proj->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>


@endsection