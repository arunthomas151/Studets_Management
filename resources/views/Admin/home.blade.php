<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('css/bootstrap.min.js') }}"></script>

<body>
    <div id="login">
        <div class="container">
            <div id="register-link" class="text-right">
                <a href="{{ route('student') }}" class="text-info">Add Student</a>
            </div>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-12">
                    <div id="login-box" class="col-md-12">
                    <h3 class="text-center text-info">Students List</h3>
                        <table border="4">
                        <tr>
                        <th>Roll No</th>
                        <th>Student Name</th>
                        <th>Departmant</th>
                        <th>Gender</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($student as $students)
                        <tr id="{{ $students->student_id }}">
                        <td>{{ $students->roll_no }}</td>
                        <td>{{ $students->student_name }}</td>
                        <td>{{ $students->department_name }}</td>
                        <td>{{ $students->gender }}</td>
                        <td><a href="{{ route('edit_student',$students->student_id) }}"><input type="button"value="Edit"></a><input type="button" id="{{ $students->student_id }}" class="delete" value="Delete"></td>
                        </tr>
                        @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).on('click', '.delete', function() {
        var sid = this.id;
        alert(sid)
        $.ajax({
            method: "post",
            url: "{{ route('delete_student') }}",
            data: {
                'student_id': this.id,
                _token: '{{ csrf_token() }}',
            },  
            success: function(data) {
                alert(data.msg);
                document.getElementById(sid).remove();
            }
        });
    })
</script>
