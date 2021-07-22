@extends('layouts.admin')

@section('content')
<style>
    .border-left-primary {
        border-left: 0.25rem solid #ff7ec9
            /*#4e73df*/
             !important;
    }

    .border-left-secondary {
        border-left: 0.25rem solid #858796 !important;
    }

    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }

    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }

    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }

    .border-left-danger {
        border-left: 0.25rem solid #e74a3b !important;
    }

    .border-left-light {
        border-left: 0.25rem solid #f8f9fc !important;
    }

    .border-left-dark {
        border-left: 0.25rem solid #5a5c69 !important;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        //
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        //
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        //
    </div>

    <!-- Pending Requests Card Example -->

    <div class="col-xl-3 col-md-6 mb-4">
        //
    </div>

    <!-- Content Row -->

    @endsection