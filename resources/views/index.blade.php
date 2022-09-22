@extends('master')
@section('title') Todo List @endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-12 col-md-6">
                <div class="card my-3">
                    <div class="card-body">
                        <form action="{{ route('todo.store') }}" method="post" class="d-flex justify-content-between">
                            @csrf
                            <input type="text" class="form-control me-2" placeholder="Todo List" name="list">
                            <input type="hidden" name="status" value="1">
                            <button class="btn btn-warning text-black px-3"><i class="feather-plus"></i></button>
                        </form>
                    </div>
                </div>

                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card mt-3">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($lists as $list)
                                <li class="list-group-item list-group-item-action">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text">

                                            @if($list->status == '0')
                                                <a href="{{ route('todo.uncheck', $list->id) }}"><i class="feather-check-square"></i></a>
                                            @else
                                                <a href="{{ route('todo.check', $list->id) }}"><i class="feather-square"></i></a>
                                            @endif

                                            <span

                                                @if($list->status == '0')
                                                    class="text-decoration-line-through"
                                                @endif

                                            >{{ $list->list }}</span>

                                        </div>
                                        <div class="control">
                                            <a href="{{ route('todo.edit', $list->id) }}" class="btn btn-outline-warning btn-sm"><i class="feather-edit-3"></i></a>
                                            <form action="{{ route('todo.destroy', $list->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger btn-sm"><i class="feather-trash-2"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
