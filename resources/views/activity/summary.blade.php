@extends('layouts.app')

@section('style')

    <style>
        .title{
            font-size: 26px;
            text-align: right;
            color: #00bcd4;
            font-family: 'Roboto', sans-serif;
            margin-bottom: 0;
            padding: 10px;
        }
        .value{
            font-size: 26px;
            font-family: Cambria, serif;
            padding: 10px;
        }
        .each{
            padding: 10px;
        }
    </style>

@endsection

@section('content')

    <main>
        <section class="portfolio-block hire-me" style="padding-top: 60px">
            <div class="container">
                <div class="heading" style="margin-bottom: 60px">
                    <h2>Summary of activity</h2>
                </div>

                <div class="col-md-12 row">
                    <div class="col-md-6 each row">
                        <label class="col-md-6 title">Name : </label>
                        <div class="col-md-6 value">{{$data->name}}</div>

                        <label class="col-md-6 title">Address : </label>
                        <div class="col-md-6 value">{{$data->address}}</div>

                        <label class="col-md-6 title">Start Date : </label>
                        <div class="col-md-6 value">{{$data->start_date}}</div>

                        <label class="col-md-6 title">End Date : </label>
                        <div class="col-md-6 value">{{$data->end_date}}</div>

                        <label class="col-md-6 title">Access Code : </label>
                        <div class="col-md-6 value">{{$data->access_code}}</div>

                        <label class="col-md-6 title">Participants : </label>
                        <div class="col-md-6 value">{{$data->number_participants}}</div>

                        <label class="col-md-6 title">Other Details : </label>
                        <div class="col-md-6 value">{{$data->other_details}}</div>

                        <label class="col-md-6 title">Status : </label>
                        <div class="col-md-6 value">{{$data->activity_status}}</div>
                    </div>

                    <div class="col-md-6 each">
                        <div class="row">
                            <label class="col-md-6 title">Total Cost : </label>
                            <div class="col-md-6 value">${{number_format($data->total_cost, 2)}}</div>
                        </div>

                        <div class="row">
                            <label class="col-md-6 title">Average Cost : </label>
                            <div class="col-md-6 value">${{number_format($data->average_cost, 2)}}</div>
                        </div>

                        {{--<h2 style="margin-top: 20px;color: red"> <b>Items Summary</b></h2>--}}

                        @foreach($data->items as $item)
                            <div class="row">
                                <label class="col-md-6 title">{{ucfirst($item->name)}} Cost : </label>
                                <div class="col-md-6 value">${{number_format($item->price, 2)}} , ${{number_format($item->extra_cost, 2)}}</div>
                            </div>
                        @endforeach
                    </div>



                </div>

                <br>

                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                        <a href="{{asset('/displayActivities')}}" class="btn btn-success" style="padding: 10px 33px"><b style="font-size: 19px">Back</b></a>
                    </div>
                </div>


            </div>

        </section>
    </main>

@endsection