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
                        <h4 class="mb-sm-0">Sprint Create</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Appzia</a></li>
                                <li class="breadcrumb-item "><a href="{{ route('sprint.index') }}">Sprint</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
        </section>
        <section>
            Create new board
            Sprint number is ____
            <form action="{{ route('sprint.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Sprint Days</label>
                    <input type="number" name="sprint_days" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Create Sprint</button>
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