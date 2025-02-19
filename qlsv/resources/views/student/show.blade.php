@extends('student.master')
@section('tittle','Thông tin chi tiết')
@section('content')
<div class="container mt-3">
        <h1 class="text-black text-center mb-3">
            <b>Thông tin chi tiết sinh viên</b>
        </h1>

        <div class="card">
            <div class="card-header">
                <h4>Thông tin sinh viên</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="ten" class="form-label">Tên sinh viên</label>
                        <input type="text" class="form-control" id="ten" value="{{ $student->ten }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="lop" class="form-label">Lớp</label>
                        <input type="text" class="form-control" id="lop" value="{{ $student->lop }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="nganh" class="form-label">Ngành</label>
                        <input type="text" class="form-control" id="nganh" value="{{ $student->nganh }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="khoa" class="form-label">Khoa</label>
                        <input type="text" class="form-control" id="khoa" value="{{ $student->khoa }}" disabled>
                    </div>
                </form>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('students.index') }}" class="btn btn-primary mx-2">Quay lại danh sách</a>
            </div>
        </div>
    </div>
@endsection
