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
            <a href="{{route('admin.seller')}}">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="user" class="report-box__icon text-success"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                    title="22% Higher than last month"> 
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">Sellers</div>
                        <div class="text-base text-slate-500 mt-1">{{$sellers_count}}</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
            <a href="{{route('admin.buyers')}}">
            <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="user" class="report-box__icon text-warning"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-warning tooltip cursor-pointer"
                                    title="22% Higher than last month">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">Buyers</div>
                        <div class="text-base text-slate-500 mt-1">{{$buyers_count}}</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@stop