@extends('layouts.admin')

{{-- 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@section('title', 'Admin Dashboard')

@section('content')
    {{-- <h1 class="breadcrumb-item active mt-2">Dashboard</h1> --}}

    {{-- <div class="container">
        <div class="text-center mt-2">
            <h2 class="fw-semibold m-0" style="font-family:Georgia, 'Times New Roman', Times, serif">USERS</h2>
            <hr class="m-3">
        </div>

        <table class="table" style="border: 1px solid #dadada">
            <thead class="table-light">
                <tr class="text-center mx-5">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Orders</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $userdata)
                    <tr class="text-center">
                        <td class="p-3">{{ $userdata->first_name }} {{ $userdata->last_name }}</td>
                        <td class="p-3">{{ $userdata->email }}</td>
                        <td class="p-3"> <a href="/admin/viewdetail/{{ $userdata->id }}">View Orders</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="text-center pt-3">
            
        </div>
    </div> --}}

    <div class="container mt-4">
        @php $i = 1 @endphp
        <div class="text-center mt-4">
            <span class="fs-2 fw-semibold p-1 px-2" style="font-family:'Times New Roman', Times, serif; border-radius: 5px; background-color:#eaeaea">User Details</span>
            <hr class="m-3">
        </div>
        <div class="row">
            @foreach ($users as $userdata)
                <div class="card col-md-4 p-0 m-3" style="width: 400px;">
                    <div class="card-body p-2">

                        <div class="">
                            <div class="m-1 fw-semibold">User ID: {{ $userdata->id }} </div>
                            <div class="m-1"><span class="fw-semibold"> Name: </span> {{ $userdata->first_name }} {{ $userdata->last_name }}</div>
                            <div class="m-1"><span class="fw-semibold"> Email:</span> {{ $userdata->email }}</div>
                            <div class="mt-2"> <a href="/admin/vieworder/{{ $userdata->id }}"> <button class="btn btn-primary"> View Orders </button> </a> </div>
                        </div>
                    </div>
                </div>
                @php $i++ @endphp
            @endforeach
        </div>
    </div>

@endsection
