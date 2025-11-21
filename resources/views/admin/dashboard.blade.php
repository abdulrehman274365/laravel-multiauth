@extends('admin.layouts.admin')
@section('content')


<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            General Report
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="text-3xl font-medium leading-8 mt-6">156</div>
                    <div class="text-base text-slate-500 mt-1">Total Users</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="text-3xl font-medium leading-8 mt-6">40</div>
                    <div class="text-base text-slate-500 mt-1">Total Websites</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-12 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="text-3xl font-medium leading-8 mt-6">40000</div>
                    <div class="text-base text-slate-500 mt-1">Total Earning</div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop