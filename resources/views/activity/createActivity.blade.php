@extends('layouts.app')

@section('content')

    <main>
        <section class="portfolio-block hire-me" style="padding-top: 60px">
            <div class="container">
                <div class="heading" style="margin-bottom: 60px">
                    <h2>create your activity</h2>
                </div>

                <form action="{{asset('/postCreateActivity')}}" method="post" style="margin-bottom: 20px">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6"> <label for="name">Activity Name</label><input class="form-control" id="name" type="text" name="name" value="{{old('name')}}" required></div>
                            <div class="col-md-6"><label for="address">Address</label><input class="form-control" id="address" type="text" name="address" value="{{old('address')}}" required></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6"><label for="start-date">Start Date</label><input class="form-control" id="start-date" type="date" name="start_date" value="{{old('start_date')}}" required></div>
                            <div class="col-md-6"><label for="end-date">End Date</label><input class="form-control" id="end-date" type="date" name="end_date" value="{{old('end_date')}}" required></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6"><label for="access_code">Access Code</label><input class="form-control" id="access_code" type="text" name="access_code" value="{{old('access_code')}}" required></div>
                            <div class="col-md-6"><label for="number_participants">Number Participants</label><input class="form-control" id="number_participants" type="text" name="number_participants" value="{{old('number_participants')}}" required></div>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-sm-12"><label for="other_details">Other Details</label><input class="form-control" id="other_details" type="text" name="other_details" value="{{old('other_details')}}" required></div>
                        </div>
                    </div>

                    <label for="subject">Item to buy</label>
                    <hr style="margin-top: 0">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-9 row item">
                                <div class="col-md-6"><input class="form-control item_name_0"  name="item_name[]" type="text" placeholder="Name" required></div>
                                <div class="col-md-6" style="margin-bottom: 5px"><input class="form-control item_price_0" name="item_price[]" type="text" placeholder="Price" required></div>
                            </div>
                            <div class="col-md-3" style="text-align: center">
                                <button class="btn btn-primary" type="button" id="item_add">ADD</button>
                            </div>
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-5"><button class="btn btn-primary btn-block" type="submit">CREATE</button></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5"><a class="btn btn-primary btn-block" href="{{asset('/home')}}">BACK</a></div>

                    </div>

                </form>

                @if($errors->any())

                <div class="col-md-7 alert alert-danger" style="margin: auto;">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>

                @endif

            </div>
        </section>
    </main>


@endsection

@section('script')

    <script>

        var i = 0;

        $('button#item_add').click(function (e) {
            if (($('input.item_name_' + i).val() == '') || $('input.item_price_' + i).val() == '' ){
                alert("Please input Item name and price")
            }else {
                i++;
                $("div.item").append('<div class="col-md-6" style="margin: 5px 0"><input class="form-control item_name_'+ i +'" name="item_name[]" type="text" placeholder="Name" required></div>\n' +
                    '                                <div class="col-md-6" style="margin: 5px 0"><input class="form-control item_price_'+i+'" name="item_price[]" type="text" placeholder="Price" required></div>')
            }
        });



    </script>

@endsection