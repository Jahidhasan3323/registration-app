@extends('master')

@section('mainContent')
    <div class="card">
        <div class="card-header">
            Registration Form
        </div>
        <div class="card-body">
            <form id="registration_form" method="post" action=""
                  enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required value="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required value="{{$user->email}}">
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="division" class="form-label">Division</label>
                        <select class="form-select" id="division" name="division" required>
                            <option value="">Select</option>
                            <?php
                            if (!empty($divisions)) {
                            foreach ($divisions as $division) { ?>
                            <option
                                value="{{$division->id }}" {{$division->id == $user->division_id ? 'selected' : ''}}>{{$division->name}}</option>

                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="district" class="form-label">District</label>
                        <select class="form-select" id="district" name="district" required>
                            <option value="">Select</option>
                            <?php
                            if (!empty($districts)) {
                            foreach ($districts as $district) { ?>
                            <option
                                value="{{$district->id }}" {{$district->id == $user->division_id ? 'selected' : ''}}>{{$district->name}}</option>

                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="upazila" class="form-label">Upazila</label>
                        <select class="form-select" id="upazila" name="upazila" required>
                            <option value="">Select</option>
                            <?php
                            if (!empty($upazilas)) {
                            foreach ($upazilas as $upazila) { ?>
                            <option
                                value="{{$upazila->id }}" {{$upazila->id == $user->division_id ? 'selected' : ''}}>{{$upazila->name}}</option>

                            <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" required
                           value="{{$user->address}}">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Photo</label>
                        <input type="file" id="photo" class="form-control" name="photo">
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">CV</label>
                        <input type="file" id="cv" class="form-control" name="cv">
                    </div>
                </div>
                @php
                    $languages = [];
                        foreach ($user->languages as $language){
                                array_push($languages, $language->language);
                            }
                @endphp
                <div class="row">
                    <label class="form-check-label mb-3 border-bottom">Language Proficiency </label>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="0" id="english"
                                   name="language[]" {{in_array(0, $languages) ? 'checked' : ''}}>
                            <label class="form-check-label" for="english">
                                Enlish
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="bangla"
                                   name="language[]" {{in_array(1, $languages) ? 'checked' : ''}}>
                            <label class="form-check-label" for="bangla">
                                Bangla
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="2" id="french"
                                   name="language[]" {{in_array(2, $languages) ? 'checked' : ''}}>
                            <label class="form-check-label" for="french">
                                French
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="form-check-label border-bottom mb-3">Education Qualification </label>
                </div>
                @php $edu=0 @endphp
                @if(!empty($user->educationalQualifications))
                    @foreach ($user->educationalQualifications as $educationalQualification)
                        <input type="hidden" name="educations[{{$edu}}][id]" value="{{$educationalQualification->id}}">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Exam Name</label>
                                <select class="form-select" name="educations[{{$edu}}][exam_id]" required>
                                    <option value="">Select</option>
                                    <?php
                                    if (!empty($exams)) {
                                    foreach ($exams as $exam) { ?>
                                    <option
                                        value="<?= $exam->id ?>" {{$exam->id == $educationalQualification->exam_id ? 'selected' : ''}}><?= $exam->name ?></option>

                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Institute</label>
                                <select class="form-select" name="educations[{{$edu}}][institute_id]" required>
                                    <option value="">Select</option>
                                    <?php if (!empty($institutes)) { ?>
                                    <?php foreach ($institutes as $institute) { ?>
                                    <option
                                        value="<?= $institute->id ?>" {{$institute->id == $educationalQualification->institute_id ? 'selected' : ''}}><?= $institute->name ?></option>

                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Board</label>
                                <select class="form-select" name="educations[{{$edu}}][board_id]" required>
                                    <option value="">Select</option>
                                    <?php
                                    if (!empty($boards)) {
                                    foreach ($boards as $board) { ?>
                                    <option
                                        value="<?= $board->id ?>" {{$board->id == $educationalQualification->board_id ? 'selected' : ''}}><?= $board->name ?></option>

                                    <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Result</label>
                                <input type="number" step="0.01" class="form-control" name="educations[{{$edu}}][result]"
                                       required value="{{$educationalQualification->result}}">
                            </div>
                        </div>
                        @php $edu++ @endphp
                    @endforeach
                @endif
                <div id="education_area"></div>
                <div class="row mb-3 ">
                    <div class="col-md-12 mb-3 ">
                        <button type="button" class="btn btn-primary mt-4 btn-small float-end"
                                id="add_education_area">+
                        </button>
                    </div>
                </div>
                <div class="row">
                    <label class="form-check-label border-bottom mb-3">Training {{$user->trainings ? 'checked' : ''}}</label>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-check">
                                <input class="form-check-input " type="radio" name="training"
                                       id="training_no" value="0" {{count($user->trainings) <=0 ? 'checked' : ''}}>
                                <label class="form-check-label" for="training_no">
                                    No
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input " type="radio" name="training" value="1"
                                       id="training_yes" {{count($user->trainings) > 0 ? 'checked' : ''}}>
                                <label class="form-check-label" for="training_yes">
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="training_area" style="display: none;">

                    @php $tai=0 @endphp
                        @if($user->trainings)
                        @foreach ($user->trainings as $training)
                            <input type="hidden" name="training_opt[{{$tai}}][id]" value="{{$training->id}}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="training_opt[{{$tai}}][name]" value="{{$training->name}}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Details</label>
                                    <textarea name="training_opt[{{$tai}}][details]" class="form-control" rows="1">{{$training->details}}</textarea>
                                </div>
                            </div>
                            @php $tai++ @endphp
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name </label>
                                <input type="text" class="form-control" name="training_opt[0][name]" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Details</label>
                                <textarea name="training_opt[0][details]" class="form-control" rows="1"></textarea>
                            </div>
                        </div>
                    @endif
                    <div id="training_area"></div>
                    <div class="row mb-3 ">
                        <div class="col-md-12 mb-3 ">
                            <button type="button" class="btn btn-primary mt-4 btn-small float-end"
                                    id="add_training_area">+
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-3 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('script')

    <script>
        let abc = {{count($user->trainings)}}
        if (abc > 0) {
            $(".training_area").show();
        } else {
            $(".training_area").hide();
        }
        $('input:radio[name="training"]').change(function () {
            if ($(this).val() == '1') {
                $(".training_area").show();
            } else {
                $(".training_area").hide();
            }
        });
        // apend field for eduction
        var edu = {{$edu !=0 ? $edu-1 : 0}};
        $("#add_education_area").click(function () {
            ++edu;
            $("#education_area").append(
                '<div class="row education" > <div class="col-md-3 mb-3"> <label class="form-label">Exam Name</label> <select class="form-select" name="educations['
                + edu
                + '][exam_id]" required> <option value="">Select</option> <?php foreach ($exams as $exam) { ?> <option value="<?= $exam->id ?>"><?= $exam->name ?></option> <?php } ?> </select> </div> <div class="col-md-3 mb-3"> <label class="form-label">Institute</label> <select class="form-select" name="educations['
                + edu
                + '][institute_id]" required> <option value="">Select</option> <?php foreach ($institutes as $institute) { ?> <option value="<?= $institute->id ?>"><?= $institute->name ?></option> <?php } ?> </select> </div> <div class="col-md-3 mb-3"> <label class="form-label">Board</label> <select class="form-select" name="educations['
                + edu
                + '][board_id]" required> <option value="">Select</option> <?php foreach ($boards as $board) { ?> <option value="<?= $board->id ?>"><?= $board->name ?></option> <?php } ?> </select> </div> <div class="col-md-2 mb-3"> <label class="form-label">Result</label> <input type="text" class="form-control" name="educations['
                + edu
                + '][result]" required> </div><div class="col-md-1 mt-4"><a  class="btn btn-danger btn-sm delete-row pull-right">-</a></div> </div>'
            );
            // remove education field
            $("#education_area").on('click', '.delete-row', function () {
                $(this).closest(".education").remove();
            });
        });
        // append field for training
        var training = {{$tai !=0 ? $tai-1 : 0}};
        $("#add_training_area").click(function () {
            ++training;
            $("#training_area").append(
                '<div class="row training"> <div class="col-md-5 mb-3"> <label class="form-label">Name</label> <input type="text" class="form-control" name="training_opt['
                + training
                + '][name]" > </div> <div class="col-md-6 mb-3"> <label class="form-label">Details</label> <textarea name="training_opt['
                + training
                + '][details]" class="form-control" rows="1" ></textarea> </div><div class="col-md-1 mt-4"><a  class="btn btn-danger btn-sm delete-row pull-right">-</a></div></div>'
            )
        });
        // remove training field
        $("#training_area").on('click', '.delete-row', function () {
            $(this).closest(".training").remove();
        });
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
                        op += '<option value="0" selected disabled>chose data</option>';
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
                        op += '<option value="0" selected disabled>chose data</option>';
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
            //submit registration form
            $('#registration_form').submit(function (e) {
                e.preventDefault();
                const Toast   = Swal.mixin({
                    toast            : true,
                    position         : 'top-end',
                    showConfirmButton: false,
                    timer            : 3000,
                    timerProgressBar : true,
                    didOpen          : (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                var photo = $('#photo').prop('files')[0];
                var cv = $('#cv').prop('files')[0];
                var form_data = new FormData(this);
                if(photo){
                    form_data.append('photo',photo)
                }
                if(cv){
                    form_data.append('cv',cv)
                }
                // return
                $.ajax({
                    type   : 'post',
                    url    : '{!! url('api/general-user-edit/'.$user->id) !!}',
                    data   : form_data,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        let message = '';
                        if (data.status == 400) {
                            Object.values(data.errors).map((ele) => {
                                ele.map((msg) => {
                                    message = message + msg + "<br>"
                                })
                            })
                            Toast.fire({
                                icon : 'error',
                                title: message
                            })
                        } else if (data.status == 200) {
                            Toast.fire({
                                icon : 'success',
                                title: data.msg
                            })
                            window.location.reload();
                        }
                    },
                    catch  : function (errors) {
                        Toast.fire({
                            icon : 'error',
                            title: errors
                        })
                    }
                });
            });
        });
    </script>
@endsection
