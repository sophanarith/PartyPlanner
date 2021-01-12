@extends('layouts.app')

@section('content')

    <main class="page hire-me-page">
        <section class="portfolio-block hire-me">
            <div class="row space-rows">

                <div class="col">
                    <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950">
                        <div class="card-header" style="background-color: rgb(0,163,255);"><span class="space"><a href="#"></a></span>
                            <div class="cardheader-text">
                                <p id="cardheader-subtext">Creating an activity is fun&nbsp;Creating an activity is fun&nbsp;Creating an activity is fun&nbsp;Creating an activity is fun&nbsp;Creating an activity is fun&nbsp;Creating an activity is fun&nbsp;Creating an activity
                                    is fun&nbsp;Creating an activity is fun&nbsp;Creating an activity is fun&nbsp;</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{asset('/createActivity')}}" style="background-color: rgb(255,159,14);width: 158px;/*margin-left: auto;*//*margin-right: auto;*//*align-items: center;*/">CREATE</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card cards-shadown cards-hover" data-aos="slide-right" data-aos-duration="950">
                        <div class="card-header" style="background-color: rgb(0,163,255);"><span class="space"><a href="#"></a></span>
                            <div class="cardheader-text"></div>
                            <p id="cardheader-subtext">Display Your activities...Display Your activities...Display Your activities...Display Your activities...Display Your activities...Display Your activities...Display Your activities...Display Your activities...Display Your activities...</p>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{asset('/displayActivities')}}" style="background-color: rgb(255,159,14);width: 158px;">DISPLAY</a>
                        </div>
                    </div>
                </div>

            </div>
            <ul></ul>
        </section>
    </main>
@endsection
