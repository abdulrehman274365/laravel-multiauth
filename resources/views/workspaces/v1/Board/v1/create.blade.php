@extends('layouts.app')
@section('content')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
@php
    $workspace = session()->get('workspace')
@endphp

<div class="page-content">
    <div class="container-fluid">
        <section>
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Board</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                                <li class="breadcrumb-item "><a href="{{ route('board.index') }}">Board</a></li>
                                <li class="breadcrumb-item active">New Board</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
        </section>
        <section>
            Create new board
            Board number is {{ $last_board ? $last_board->area_order + 1 : 1 }}
            <form action="{{ route('board.store') }}" method="POST">
                @csrf

                <!-- Hidden fields -->
                <input type="hidden" name="workspace_id" value="{{ $workspace->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="area_order" value="{{ $last_board ? $last_board->area_order + 1 : 1 }}">

                <div class="mb-3">
                    <label for="board_name" class="form-label">Board Name</label>
                    <input type="text" class="form-control form-control-sm" id="board_name" name="area_name"
                        placeholder="Enter board name">
                </div>
                <div class="mb-3">
                    <label for="background_color" class="form-label">Background Color</label>
                    <input type="color" class="form-control form-control-sm" id="background_color" name="background_color"
                        placeholder="Enter background color">
                </div>

                @if($last_board && $last_board->area_order >= 1)
                    <div class="mb-3">
                        <label for="done_stage" class="form-label">Is Done Stage?</label>
                        <select name="done_stage" id="done_stage" class="form-select">
                            <option selected value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Create Board</button>
            </form>
        </section>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        console.log("Jquery is working!");
    });
</script>

@stop