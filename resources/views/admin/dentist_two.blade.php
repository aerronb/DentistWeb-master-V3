@extends('layouts.adminDentist')

@section('navbar1')
    <p class="card-text">Statistics for: <b>{{$dentist2Name->dentist}}</b>
@endsection

@section('content1')
    <h5 class="card-title">Latest Appointment Booked For:</h5>
    @isset($dentist2AppL)
        <p class="card-text">Appointment with: <b>{{$dentist2AppL->name}}</b> on:
            <b>{{$dentist2AppL->date_of_appointment->format('d-M-Y')}}</b> at:
            <b>{{$dentist2AppL->time_of_appointment}} </b>
    @endisset
@endsection

@section('content2')
    <h5 class="card-title">Latest Appointment Booked For:</h5>
    @isset($dentist2AppE)
        <p class="card-text">Appointment with: <b>{{$dentist2AppE->name}}</b> on:
            <b>{{$dentist2AppE->date_of_appointment->format('d-M-Y')}}</b> at:
            <b>{{$dentist2AppE->time_of_appointment}} </b>
    @endisset
@endsection

@section('content3')
    <h5 class="card-title">Most Common Appointment Booked For:</h5>
    <p class="card-text">{{$dentist2CommonProcedure->type_of_appointment}}
@endsection

@section('content4')
    <h5 class="card-title">Least Popular Appointment:</h5>
    <p class="card-text">{{$dentist2LeastProcedure->type_of_appointment}}
@endsection