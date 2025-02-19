@extends('student.master')
@section('tittle','Sửa thông tin')
@section('content')
<div class="container mt-3">
    <h1 class="text-black text-center mb-3">
        <b>Sửa thông tin sinh viên </b>
    </h1>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Thông tin sinh viên</h4>
                <a href="{{route('students.index')}}" class="btn btn-secondary ">Tất cả thông tin sinh viên</a>
        </div>
        <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT') 

                <div class="mb-3">
                    <label for="ten" class="form-label">Tên sinh viên</label>
                    <input type="text" class="form-control" id="ten" name="ten" value="{{ $student->ten }}" required>
                </div>
                <div class="mb-3">
                    <label for="lop" class="form-label">Lớp</label>
                    <input type="text" class="form-control" id="lop" name="lop" value="{{ $student->lop }}" required>
                </div>
                <div class="mb-3">
                    <label for="nganh" class="form-label">Ngành</label>
                    <input type="text" class="form-control" id="nganh" name="nganh" value="{{ $student->nganh }}" required>
                </div>
                <div class="mb-3">
                    <label for="khoa" class="form-label">Khoa</label>
                    <input type="text" class="form-control" id="khoa" name="khoa" value="{{ $student->khoa }}" required>
                </div>

                <!-- Nút cập nhật thông tin -->
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection
