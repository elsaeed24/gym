@extends('layouts.app')
@section('body')
    <x-navbar></x-navbar>
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed h-100">
            <a href="#" class="brand-link">
                <img src="{{url('dist/img/AdminLTELogo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel App') }}</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="#" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">#</a>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <x-nav/>
            </div>
        </aside>
    </div>


    <div class="content-wrapper p-4">
        @yield('content')
    </div>
@endsection

