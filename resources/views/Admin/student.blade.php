<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('css/bootstrap.min.js') }}"></script>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="register-link" class="text-right">
                <a href="{{ route('home') }}" class="text-info">Students List</a>
            </div>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="saveform">
                            <h3 class="text-center text-info">Add Student</h3>
                            <label style="color:red">@isset($msg)
                                {{ $msg }}
                            @endisset </label>
                            <div class="form-group">
                                <label for="username" class="text-info">Roll No :</label><br>
                                <input type="number" name="roll_no" id="roll_no" autocomplete="off" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Student Name :</label><br>
                                <input type="text" name="student_name" id="student_name" autocomplete="off" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Department :</label><br>
                                <select type="text" name="department_id" id="department_id" autocomplete="off" required class="form-control">
                                    <option value="" selected disabled >Select One</option>
                                    @foreach ($data as $datas)
                                    <option value="{{ $datas->department_id }}">{{ $datas->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Gender :</label><br>
                                <select type="text" name="gender_id" id="gender_id" autocomplete="off" required class="form-control">
                                <option value="" selected disabled >Select One</option>
                                    @foreach ($data1 as $datas)
                                    <option value="{{ $datas->gender_id }}">{{ $datas->gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Address:</label><br>
                                <textarea type="text" name="address" id="address" autocomplete="off" required class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="button" id="save" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $('#save').click(function() {
        if (document.getElementById('roll_no').value.trim().length == 0) {
            alert('Please fill all mandatory feilds');
        } else if (document.getElementById('student_name').value.trim().length == 0) {
            alert('Please fill all mandatory feilds');
        } else if (document.getElementById('department_id').value.trim().length == 0) {
            alert('Please fill all mandatory feilds');
        } else {
            var formdata = new FormData($('#saveform')[0]);
            formdata.append('_token','{{ csrf_token() }}')
            $.ajax({
                method: "post",
                url: " {{ route('add_student') }}",
                data: formdata,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    alert(data.msg);
                    document.getElementById('saveform').reset();
                }
            })
        }
    })
</script>
