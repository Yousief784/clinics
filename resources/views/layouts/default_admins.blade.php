@extends('layouts.default')

@section('dashboard')
    <li class="sidebar-item pt-2">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
           aria-expanded="false">
            <i class="far fa-clock" aria-hidden="true"></i>
            <span class="hide-menu">All Doctors</span>
        </a>
    </li>

    <li class="sidebar-item pt-2">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.doctor_in_pending_list') }}"
           aria-expanded="false">
            <i class="far fa-clock" aria-hidden="true"></i>
            <span class="hide-menu">All Doctors in Pending List</span>
        </a>
    </li>

    <li class="sidebar-item pt-2">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
           aria-expanded="false">
            <i class="far fa-clock" aria-hidden="true"></i>
            <span class="hide-menu">All Paients</span>
        </a>
    </li>

    <li class="sidebar-item pt-2">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.create_new_major') }}"
           aria-expanded="false">
            <i class="far fa-clock" aria-hidden="true"></i>
            <span class="hide-menu">Add new Major</span>
        </a>
    </li>

    <li class="sidebar-item pt-2">
        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.create_new_major') }}"
           aria-expanded="false">
            <i class="far fa-clock" aria-hidden="true"></i>
            <span class="hide-menu">Messages</span>
        </a>
    </li>
@endsection
