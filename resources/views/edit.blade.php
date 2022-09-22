@extends('master')
@section('title') Edit @endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('todo.update', $list->id) }}" method="post" class="d-flex justify-content-between">
                            @csrf
                            <input type="text" class="form-control me-2" placeholder="Todo List" name="list" value="{{ $list->list }}">
                            <input type="hidden" name="status" value="{{ $list->status }}">
                            <button class="btn btn-warning text-black px-3"><i class="feather-upload"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
