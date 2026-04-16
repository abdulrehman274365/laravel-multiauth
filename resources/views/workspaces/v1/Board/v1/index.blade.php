@extends('layouts.app')
@section('content')
@php
    $workspace = session()->get('workspace')
@endphp
<style>
    .kanban {
        display: flex;
        gap: 15px;
        padding: 15px;
        overflow-x: auto;
    }

    .column {
        overflow-x: auto;
        display: flex;
        flex-direction: column;
        height: fit-content;
        max-height: 70vh;
        min-width: 300px;
        border-radius: 3px;
        padding: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* hidden button */
    .add-task-btn {
        margin-top: 10px;
        width: 100%;
        padding: 8px;

        border: none;
        border-radius: 6px;

        background: rgba(0, 0, 0, 0.05);
        color: #333;

        font-weight: 500;
        cursor: pointer;
        opacity: 0;
        transition: 0.2s ease;
    }

    /* show on hover */
    .column:hover .add-task-btn {
        opacity: 1;
        visibility: visible;
    }

    .add-task-btn:hover {
        background: rgba(0, 0, 0, 0.15);
    }

    .column h6 {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .card-task {
        border-radius: 2px;
        padding: 10px;
        margin-bottom: 10px;
        background: rgba(233, 236, 239, 0.1);
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .card-task:hover {
        background: rgba(233, 236, 239, 0.5);
        border: 1px solid rgba(0, 0, 0, 0.5);
    }

    .task-list {
        min-height: 50px;
        max-height: calc(100vh - 180px);
        /* adjust header space */
        overflow-y: auto;
    }

    /* optional: hide scroll inside task list */
    .task-list::-webkit-scrollbar {
        display: none;
    }

    .placeholder {
        height: 50px;
        margin: 8px 0;
        border: 2px dashed #0d6efd;
        border-radius: 6px;
        background: rgba(13, 110, 253, 0.1);
    }

    .task-list.drag-over {
        background: rgba(0, 0, 0, 0.05);
    }

    .task-placeholder {
        border: 2px dashed #aaa;
        height: 45px;
        margin: 8px 0;
        border-radius: 6px;
    }

    .sortable-ghost {
        opacity: 0.4;
        background: #f1f1f1;
        border: 2px dashed #999;
    }

    .sortable-drag {
        transform: rotate(2deg);
        opacity: 0.9;
    }

    .card-task {
        transition: all 0.2s ease;
    }

    .sortable-chosen {
        background: #e9f5ff;
        border-left: 3px solid #fd0d0d;
    }

    .ticket-drop-area {
        overflow-x: auto;
        background-color: rgba(0, 0, 0, 0.03);
        padding: 10px;
        border-radius: 5px;

        /* Firefox */
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 0, 0, 0.15) transparent;
    }

    /* Chrome, Safari, Edge */
    .ticket-drop-area::-webkit-scrollbar {
        height: 6px;
    }

    .ticket-drop-area::-webkit-scrollbar-track {
        background: transparent;
    }

    .ticket-drop-area::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.15);
        /* low opacity */
        border-radius: 10px;
    }

    /* optional hover effect */
    .ticket-drop-area:hover::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.25);
    }

    .board-option {
        color: #333;
        padding: 5px 10px 5px 10px;
        background-color: rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: ;
    }
</style>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->


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
                                <li class="breadcrumb-item active">Board</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
        </section>
        @if($board_areas->isNotEmpty())
            <section>
                Show boards <a href="{{ route('board.create') }}">create more</a>

                <div class="kanban">
                    @foreach ($board_areas as $board_area)
                        <div class="column column_{{ $board_area->id }}"
                            style="background-color: rgba({{$board_area->background_color}},0.2);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <h6 class="text-uppercase">{{ $board_area->area_name }}</h6>
                                    </div>
                                    <div class="col-6 text-end">
                                        <div class="dropdown">
                                            <a class="board-option dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical" style="color: rgb(173, 172, 172);"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item">Edit</a></li>
                                                <li><a class="dropdown-item" href="#"
                                                        onclick="deleteColumn('{{ $board_area->id }}')">Delete</a></li>
                                                <li><a class="dropdown-item" href="#">Clear</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="ticket-drop-area">
                                <!-- TASKS -->
                                <div class="task-list" data-area-id="{{ $board_area->id }}">
                                    @foreach ($board_area->tickets as $ticket)
                                        <div class="card-task" data-id="{{ $ticket->id }}" data-rank="{{ $ticket->rank }}">
                                            {{ $ticket->title }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- CREATE BUTTON ALWAYS LAST -->
                            <button class="add-task-btn" data-bs-toggle="modal" data-bs-target="#createTaskModal"
                                data-id="{{ $board_area->id }}" data-name="{{ $board_area->area_name }}">
                                + Create
                            </button>
                        </div>
                    @endforeach
                </div>
            </section>
        @else
            <section>
                No board area found. Please create a board area to start using the board.
                <a href="{{ route('board.create') }}">Start making new board</a>
            </section>
        @endif
    </div>
</div>

<div class="modal fade" id="createTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Create Task for: <span id="boardAreaName"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="taskForm">

                    <input type="hidden" name="board_area_id" id="board_area_id">

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" id="description" class="form-control form-control-sm"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Priority</label>
                            <select name="priority_level" id="priority_level" class="form-select form-select-sm">
                                <option value="">Select</option>
                                <option value="low">Low</option>
                                <option value="medium"><i class="fa-solid fa-angle-up"></i> Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Type</label>
                            <select name="type" id="type" class="form-select form-select-sm">
                                <option value="task">Task</option>
                                <option value="bug">Bug</option>
                                <option value="feature">Feature</option>
                                <option value="enhancment">Enhancement</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3 text-end">
                        <button type="submit" class="btn btn-primary">
                            Create Task
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>


<script>
    function deleteColumn(columnId) {

        Swal.fire({
            title: 'Are you sure?',
            text: "This column will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {

            if (result.isConfirmed) {

                // 🔥 AJAX CALL
                $.ajax({
                   url: "{{ route('board.delete', ':id') }}".replace(':id', columnId),
                    type: 'DELETE', // or POST depending on your backend
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {

                        // ✅ remove column from UI
                        $('.column_' + columnId).remove();

                       toastr['success'](
                            'Column deleted successfully',
                            'Success'
                        );
                    },
                    error: function () {
                       toastr['error'](
                            'Failed to delete column',
                            'Error'
                        );
                    }
                });

            }
        });
    }
    document.addEventListener("DOMContentLoaded", function () {

        document.querySelectorAll(".task-list").forEach(function (list) {

            new Sortable(list, {
                group: "kanban",
                animation: 200,

                onEnd: function (evt) {

                    let item = evt.item;

                    let ticketId = item.getAttribute("data-id");

                    let newAreaId = item.closest(".task-list")
                        .getAttribute("data-area-id");

                    let prev = item.previousElementSibling;
                    let next = item.nextElementSibling;

                    let prevRank = prev ? prev.getAttribute("data-rank") : null;
                    let nextRank = next ? next.getAttribute("data-rank") : null;

                    fetch("{{ route('tickets.reorder') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            ticket_id: ticketId,
                            board_area_id: newAreaId,
                            prev_rank: prevRank,
                            next_rank: nextRank
                        })
                    });

                }
            });

        });

    });

    $(document).ready(function () {

        // 1. OPEN MODAL AND FILL DATA
        $('.add-task-btn').on('click', function () {

            let id = $(this).data('id');
            let name = $(this).data('name');

            $('#board_area_id').val(id);
            $('#boardAreaName').text(name);

            // reset form
            $('#taskForm')[0].reset();
        });


        // 2. FORM SUBMIT VIA AJAX
        $('#taskForm').on('submit', function (e) {
            e.preventDefault();

            let title = $('#title').val().trim();
            let priority = $('#priority_level').val();
            let type = $('#type').val();

            // 3. SIMPLE VALIDATION
            if (title === '') {
                alert('Title is required');
                return;
            }

            if (priority === '') {
                alert('Priority is required');
                return;
            }

            if (type === '') {
                alert('Type is required');
                return;
            }

            $.ajax({
                url: "{{ route('tickets.store') }}", // change to your route
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    board_area_id: $('#board_area_id').val(),
                    title: title,
                    description: $('#description').val(),
                    priority_level: priority,
                    type: type
                },
                success: function (response) {

                    let ticket = response.ticket;

                    let newCard = `
        <div class="card-task" id="task-${ticket.id}" data-id="${ticket.id}" data-rank="${ticket.rank}">
            ${ticket.title}
        </div>
    `;

                    let targetList = document.querySelector(
                        `.task-list[data-area-id="${ticket.board_area_id}"]`
                    );

                    targetList.insertAdjacentHTML("beforeend", newCard);

                    // ❌ NO sortable refresh needed

                    let modalEl = document.getElementById('createTaskModal');
                    let modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                    modal.hide();

                    document.getElementById('taskForm').reset();
                },
                error: function (xhr) {
                    alert('Something went wrong!');
                    console.log(xhr.responseText);
                }
            });

        });

    });
</script>

@stop