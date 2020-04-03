@extends('layouts.head')

@section('content')
    <div class="container">
        <div class="col-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form id="add-form" class="form" action="" method="post" enctype="multipart/form-data">
                @if($id !== "")
                @method('PUT')
                @endif
                @csrf
                <h3 class="text-center text-info">{{($id === "" ? "ADD" : "EDIT")}} USER</h3>
                <div class="form-group">
                    <label class="text-info">Name:</label><br>
                    <input type="text" name="name" class="form-control" value="{{isset($data['name']) ? $data->name : ''}}">
                </div>
                <div class="form-group">
                    <label class="text-info">Email:</label><br>
                    <input type="text" name="email" class="form-control" value="{{isset($data['email']) ? $data->email : ''}}">
                </div>
                <div class="form-group">
                    <label class="text-info">File:</label><br>
                    <input type="file" name="file" >
                </div>
                <div class="form-group">
                    <label class="text-info">Address:</label><br>
                    <textarea name="address" class="form-control">{{isset($data['address']) ? $data->address : ''}}</textarea>
                </div>
                <div class="form-group">
                    <label class="text-info">Zip:</label><br>
                    <input type="text" name="zipcode" class="form-control" value="{{isset($data['zipcode']) ? $data->zipcode : ''}}">
                </div>
                <div class="form-group">
                    <label class="text-info">Mobile Number:</label><br>
                    <input type="text" name="mobile_number" class="form-control" value="{{isset($data['mobile_number']) ? $data->mobile_number : ''}}">
                </div>
                <div class="form-group">
                    <label class="text-info">Date:</label><br>
                    <input type="text" name="date" class="form-control" id="datetimepicker1" value="{{isset($data['date']) ? $data->date : ''}}">
                </div>
                <div class="form-group">
                    <label class="text-info">Time:</label><br>
                    <input type="text" name="time" class="form-control" id="datetimepicker2" value="{{isset($data['time']) ? $data->time : ''}}">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                ignoreReadonly: true,
                format: 'YYYY-MM-DD'
            });
            $('#datetimepicker2').datetimepicker({
                ignoreReadonly: true,
                format: 'HH:mm'
            });
        });
    </script>
@endsection