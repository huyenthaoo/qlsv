@extends('student.master')
@section('title','Home')

@section('content')
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5">
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container">
        <h1 class="text-black mt-3 text-center"><b>Quản lý sinh viên</b></h1>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{ route('students.create') }}" class="btn btn-success btn-sm float-end">
                        Thêm mới 
                    </a>
                </div>
            </div>
        </div> 

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Lớp</th>
                    <th class="text-center">Ngành</th>
                    <th class="text-center">Khoa</th>
                    <th class="text-center">Hành động</th>
                </tr>
                @if(count($students) > 0)
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->ten }}</td>
                            <td class="text-center">{{ $student->lop }}</td>
                            <td class="text-center">{{ $student->nganh }}</td>
                            <td class="text-center">{{ $student->khoa }}</td>
                            <td class="text-center">
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-success mx-2">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning mx-2">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <a href="javascript:void(0)" class="btn btn-danger mx-2" onclick="showDeleteForm({{ $student->id }})">
                                    <i class="fa-solid fa-trash"></i> 
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Không có dữ liệu</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>

    <!-- Form xóa sinh viên (ẩn theo ID) -->
    @foreach($students as $student)
    <div id="delete-form-{{$student->id}}" class="delete-form" style="display:none;">
        <div class="card mt-3">
            <div class="card-header">
                <h4 class="text-black">Thông tin sinh viên</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <!-- Hiển thị thông tin sinh viên -->
                    <div class="mb-3 row">
                <label for="ten" class="col-sm-3 col-form-label">Tên sinh viên</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="ten" value="{{ $student->ten }}" disabled>
                </div>
            </div>

                <div class="mb-3 row">
                    <label for="lop" class="col-sm-3 col-form-label">Lớp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lop" value="{{ $student->lop }}" disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nganh" class="col-sm-3 col-form-label">Ngành</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nganh" value="{{ $student->nganh }}" disabled>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="khoa" class="col-sm-3 col-form-label">Khoa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="khoa" value="{{ $student->khoa }}" disabled>
                    </div>
                </div>


                    <!-- Nút xác nhận xóa -->
                    <button type="submit" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-secondary" onclick="hideDeleteForm({{ $student->id }})">Hủy</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Thêm style cho form xóa -->
    <style>
        .delete-form {
            padding: 20px;
            border-radius: 5px;
            color: white;
            max-width: 1000px;
            width: 90%;
            margin-top: 20px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.7); /* Để phần form có nền mờ */
        }

        /* Khi form xóa được hiển thị */
        .delete-form form {
            background-color: white;
            color: black;
            padding: 20px;
            border-radius: 5px;
        }
    </style>

    <!-- JavaScript để hiển thị/ẩn form xóa -->
    <script>
        // Hàm hiển thị form xóa
        function showDeleteForm(studentId) {
            document.getElementById('delete-form-' + studentId).style.display = 'block';
        }

        // Hàm ẩn form xóa
        function hideDeleteForm(studentId) {
            document.getElementById('delete-form-' + studentId).style.display = 'none';
        }
    </script>
@endsection
