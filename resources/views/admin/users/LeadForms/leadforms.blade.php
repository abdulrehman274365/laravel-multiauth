@extends('admin.layouts.admin')
@section('content')


<style>
    .add-website-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-dialog {
        background-color: #F1F5F9;
        padding: 20px;
        border-radius: 8px;
        width: 90%;
        max-width: 90%;
        height: 90%;
        position: relative;
        overflow: hidden;
        /* Ensure content doesn't overflow the modal */
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 10px;
    }

    .modal-title {
        margin: 0;
        font-size: 1.5rem;
    }

    .close-modal {
        font-size: 1.5rem;
        cursor: pointer;
    }

    .modal-body {
        padding-bottom: 60px;
        /* Leave space for the button */
        overflow-y: auto;
        /* Enable vertical scrolling */
        max-height: calc(100% - 120px);
        /* Adjust to leave space for header and footer */
    }

    .modal-footer {
        position: absolute;
        bottom: 10px;
        right: 20px;
        /* Align the button to the right */
    }

    .form-label {
        font-weight: bold;
    }

    input.form-control {
        width: 100%;
        padding: 10px;
    }
</style>
<h2 class="intro-y text-lg font-medium mt-10">
    Lead Forms List
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="websitesTable" class="table table-report -mt-2 display">
            <thead>
                <tr>
                    <th class=" whitespace-nowrap">FIRST NAME</th>
                    <th class=" whitespace-nowrap">LAST NAME</th>
                    <th class=" whitespace-nowrap">EMAIL</th>
                    <th class=" whitespace-nowrap">PHONE</th>
                    <th class=" whitespace-nowrap">BUSINESS TYPE</th>

                </tr>
            </thead>
            <tbody>
                <!-- Data will be loaded here dynamically via AJAX -->
            </tbody>

        </table>
    </div>
    <!-- END: Data List -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        getFormList();
    });


    function getFormList() {
        if ($.fn.DataTable.isDataTable('#websitesTable')) {
            $('#websitesTable').DataTable().clear().destroy();
        }

        // Initialize the DataTable again
        $('#websitesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.getFormList') }}',
            columns: [
                { data: 'firstName', name: 'firstName' },
                { data: 'lastName', name: 'lastName' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'businessType', name: 'businessType' },
            ]
        });
    }

</script>

@stop