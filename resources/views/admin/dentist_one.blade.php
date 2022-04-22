@extends('layouts.adminDentist')

@section('navbar1')
    <p class="card-text">Statistics for: <b>{{$dentist1Name->dentist}}</b>
@endsection

@section('content1')
    <h5 class="card-title">Latest Appointment Booked For:</h5>
        @isset($dentist1AppL)
            <p class="card-text">Appointment with: <b>{{$dentist1AppL->name}}</b> on:
                <b>{{$dentist1AppL->date_of_appointment->format('d-M-Y')}}</b> at:
                <b>{{$dentist1AppL->time_of_appointment}} </b>
    @endisset
@endsection

@section('content2')
    <h5 class="card-title">Latest Appointment Booked For:</h5>
    @isset($dentist1AppE)
        <p class="card-text">Appointment with: <b>{{$dentist1AppE->name}}</b> on:
            <b>{{$dentist1AppE->date_of_appointment->format('d-M-Y')}}</b> at:
            <b>{{$dentist1AppE->time_of_appointment}} </b>
    @endisset
@endsection

@section('content3')
    <h5 class="card-title">Most Common Appointment Booked For:</h5>
        <p class="card-text">{{$dentist1CommonProcedure->type_of_appointment}}
@endsection

@section('content4')
    <h5 class="card-title">Least Popular Appointment:</h5>
    <p class="card-text">{{$dentist1LeastProcedure->type_of_appointment}}
@endsection
