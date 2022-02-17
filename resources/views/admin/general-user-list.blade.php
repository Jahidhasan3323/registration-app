@extends('master')

@section('mainContent')
    <div class="content">
        <div class="card card-default">
            <div class="card-header">
                <form method="get" action="">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="division" class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="name" name="name" value="{{request()->get('name')}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="division" class="form-label">Email</label>
                            <input type="text" class="form-control" placeholder="email" name="email" value="{{request()->get('email')}}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="division" class="form-label">Division</label>
                            <select class="form-select" id="division" name="division">
                                <option value>Select</option>
                                <?php
                                if (!empty($divisions)) {
                                foreach ($divisions as $division) { ?>
                                <option value="{{$division->id }}">{{$division->name }}</option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="district" class="form-label">District</label>
                            <select class="form-select" id="district" name="district">
                                <option value>Select</option>

                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="upazila" class="form-label">Upazila</label>
                            <select class="form-select" id="upazila" name="upazila">
                                <option value>Select</option>

                            </select>
                        </div>
                        <div class="col-md-4 mt-4 ">
                            <button class="btn btn-info mt-2" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="row mt-5">
                    <div class="col-md-12 ">
                        <table id="example1" class="table table-bordered table-hover table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Division</th>
                                <th>Disthict</th>
                                <th>Upazila</th>
                                <th>Insert Date</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            if (!empty($users)) {
                            foreach ($users as $user) { ?>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->division->name }}</td>
                                <td>{{ $user->district->name }}</td>
                                <td>{{ $user->upazila->name }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a href="{{route('general.user.edit',$user->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>
                            <?php }
                            } ?>
                        </table>
                        <div class="float-end">
                            {{$users->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        // apend field for eduction
        $(document).ready(function () {
            //get distric
            $(document).on('change', '#division', function () {
                var division_id = $(this).val();
                var div         = $(this).parent().parent().parent();
                var op          = " ";
                $.ajax({
                    type   : 'get',
                    url    : '{!! url('api/get-district') !!}',
                    data   : {
                        'division_id': division_id
                    },
                    success: function (data) {
                        // var data = $.parseJSON(data)
                        var data = data.data
                        op += '<option value>chose data</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option  value="' + data[i].id + '">' + data[i].name +
                                  '</option>';
                        }
                        div.find('#district').html(" ");
                        div.find('#district').append(op);
                    },
                    error  : function () {
                    }
                });
            });

            //get upazila
            $(document).on('change', '#district', function () {
                var district_id = $(this).val();
                var div         = $(this).parent().parent().parent();
                var op          = " ";
                $.ajax({
                    type   : 'get',
                    url    : '{!! url('api/get-upazila') !!}',
                    data   : {
                        'district_id': district_id
                    },
                    success: function (data) {
                        // var data = $.parseJSON(data)
                        var data = data.data
                        op += '<option value>chose data</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option  value="' + data[i].id + '">' + data[i].name +
                                  '</option>';
                        }
                        div.find('#upazila').html(" ");
                        div.find('#upazila').append(op);
                    },
                    error  : function () {
                    }
                });
            });
        });
    </script>
@endsection
