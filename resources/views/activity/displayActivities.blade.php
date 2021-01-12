@extends('layouts.app')

@section('style')
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">--}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        table#example tbody tr td{
            padding-bottom: 7px;
        }
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
@endsection

@section('content')

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">--}}
    <main>
        <section class="portfolio-block" style="padding-top: 60px">

                <div class="heading" style="margin-bottom: 60px">
                    <h2>display your activities</h2>
                </div>

                <div class="container" style="margin-top: 60px; max-width: 1343px">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th style="width: 86px">Address</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Access Code</th>
                            <th>Participants</th>
                            <th>Other Details</th>
                            <th>Status</th>
                            <th style="width: 211px">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $n = 1?>
                        @foreach($activities as $activity)
                            <tr>
                                <td>{{$n}}</td>
                                <td>{{$activity->name}}</td>
                                <td>{{$activity->address}}</td>
                                <td>{{$activity->start_date}}</td>
                                <td>{{$activity->end_date}}</td>
                                <td>{{$activity->access_code}}</td>
                                <td>{{$activity->number_participants}}</td>
                                <td>{{$activity->other_details}}</td>
                                <td><b>{{$activity->activity_status}}</b></td>
                                <td>
                                    @if($activity->activity_status == 'Finished')

                                        <a href="{{asset('/activity/edit')}}/{{$activity->id}}" class="btn btn-success disabled" style="border-radius: 4px;padding: 4px 8px" >Edit</a>
                                    @else
                                        <a href="{{asset('/activity/edit')}}/{{$activity->id}}" class="btn btn-success" style="border-radius: 4px;padding: 4px 8px">Edit</a>
                                    @endif

                                    <button class="btn btn-danger" type="button" data-toggle="modal" style="border-radius: 4px;padding: 4px 8px"
                                            data-target="#deleteActivityModal" data-id="{{$activity->id}}">Delete</button>

                                    @if($activity->activity_status == 'Finished')
                                        <button class="btn btn-primary" type="button" data-toggle="modal" style="border-radius: 4px;padding: 4px 8px"
                                            data-target="#checkItemModal" data-items="{{$activity->items}}" disabled>Check Items</button>
                                    @else
                                        <button class="btn btn-primary" type="button" data-toggle="modal" style="border-radius: 4px;padding: 4px 8px"
                                                data-target="#checkItemModal" data-items="{{$activity->items}}">Check Items</button>
                                    @endif
                                </td>
                            </tr>
                            <?php $n+=1 ?>
                        @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Access Code</th>
                            <th>Participants</th>
                            <th>Other Details</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                            <a href="{{asset('/home')}}" class="btn btn-success" style="padding: 10px 33px"><b style="font-size: 19px">Back</b></a>
                        </div>
                    </div>

                </div>


        </section>
    </main>

    <!-- Delete Modal HTML -->
    <div id="deleteActivityModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content modal-col-deep-orange">
                <form action="{{url('activity/delete')}}" method="post">
                    {{--{{csrf_field() }}--}}
                    <input name="_token" type="hidden" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Activity</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Activity?</p>
                        <p><small>This action cannot be undone.</small></p>
                        <input type="hidden" name="id" id="u_id" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary waves-effect" value="Delete">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Check Item Modal HTML -->
    <div id="checkItemModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content modal-col-deep-orange">
                <form action="{{url('activity/finish')}}" method="post">
                    {{--{{csrf_field() }}--}}
                    <input name="_token" type="hidden" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <h4 class="modal-title">Check Items</h4>
                    </div>
                    <div class="modal-body" style="padding-left: 30px">
                        <p>Are you sure you want to delete this Activity?</p>
                        <p><small>This action cannot be undone.</small></p>

                        <input type="hidden" name="id" id="u_id" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary waves-effect" value="Finish">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

        $('#deleteActivityModal').on('show.bs.modal',function(event) {
            console.log('modal opened');
            button = $(event.relatedTarget);
            u_id = button.data('id');

            const modal = $(this);
            modal.find('.modal-body #u_id').val(u_id);
        });

        $('#checkItemModal').on('show.bs.modal',function(event) {
            console.log('modal opened');
            button = $(event.relatedTarget);
            items = button.data('items');

            const modal = $(this);
            modal.find('.modal-body').html('');

            for (i=0;i<items.length;i++){

                //console.log(items[i]);
                modal.find('.modal-body').append('<div class="checkbox">\n' +
                    '  <label style="font-size: 18px"><input type="checkbox" name = "checked_item[]" value="'+items[i]['id']+'">'+' '+ items[i]['name']+' $' + items[i]['price']+'</label>\n' +
                    '</div>');
                u_id = items[i]['id'];
            }

            modal.find('.modal-body').append('<input type="hidden" name="u_id" id="u_id" value="'+u_id+'">');

        });

        $(document).ready(function () {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if(Session::get('create')){
                toastr['success']("New Activity created successfully.", "Success!");
            }
            @endif

            @if(Session::get('delete')){
                toastr['success']("Activity deleted successfully.", "Success!");
            }
            @endif

            @if(Session::get('update')){
                toastr['success']("Activity updated successfully.", "Success!");
            }
            @endif

        });


    </script>

@endsection