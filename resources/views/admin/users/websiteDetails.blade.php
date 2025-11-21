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

    .refund-website-modal {
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
    .withdrawal-credits-modal {
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
    .modal-withdrawal-dialog {
        background-color: #F1F5F9;
        padding: 30px;
        border-radius: 8px;
        width: 30%;
        max-width: 30%;
        position: relative;

    }

    .modal-refund-dialog {
        background-color: #F1F5F9;
        padding: 30px;
        border-radius: 8px;
        width: 30%;
        max-width: 30%;

        position: relative;

    }

    .modal-dialog {
        background-color: #F1F5F9;
        padding: 20px;
        border-radius: 8px;
        width: 20%;
        max-width: 30%;
        height: 40%;
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

    .modal-refund-body {
        padding-bottom: 20px;
    }
    .modal-withdrawal-body {
        padding-bottom: 60px;
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

     /* Modal Overlay */
     #modalOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        /* Modal Content */
        #modalContent {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            z-index: 1001;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
        }

        /* Modal Header */
        #modalHeader {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #modalHeader h3 {
            margin: 0;
        }

        #closeModal {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
        }

        /* Modal Footer */
        #modalFooter {
            margin-top: 20px;
            text-align: right;
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

       
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
</style>
@if (session('failed_message_one'))
    <div class="alert alert-success">
        {{ session('failed_message_one') }}
    </div>
@endif
@if (session('failed_message_two'))
    <div class="alert alert-success">
        {{ session('failed_message_two') }}
    </div>
@endif
@if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif

<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            General Report
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-12 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="text-3xl font-medium leading-8 mt-6">$ {{$total_earning}}</div>
                    <div class="text-base text-slate-500 mt-1">Total Earning</div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 ">


        <div class="dropdown">
     
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to
                            Excel </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to
                            PDF </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table id="websitesTable" class="table table-report -mt-2 display">
            <thead>
                <tr>
                    <th class=" whitespace-nowrap">BUYER</th>
                    <th class=" whitespace-nowrap">WEBSITE NAME</th>
                    <th class=" whitespace-nowrap">SITE</th>
                    <th class=" whitespace-nowrap">PRICE</th>
                    <th class=" whitespace-nowrap">STATUS </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($purchased_websites as $website )
                <tr>
                    <td>{{$website->user_name}}</td>
                    <td>{{$website->name}}</td>
                    <td>{{$website->website}}</td>
                    <td>{{$website->price}}</td>
                    <td>
                        @if($website->purchase_status == 1)
                        Subscribed
                        @endif

                    </td>
                </tr>
                
                @endforeach
            </tbody>

        </table>
    </div>
    <!-- END: Data List -->
</div>




@stop
