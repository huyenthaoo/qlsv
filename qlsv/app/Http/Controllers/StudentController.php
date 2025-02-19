<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            // Tìm sinh viên theo ID
            $student = Student::findOrFail($id);
        
            // Trả về view hiển thị thông tin chi tiết sinh viên
            return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // Tìm sinh viên theo ID
       $student = Student::findOrFail($id);
        
       // Trả về view hiển thị thông tin chi tiết sinh viên
       return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // Xác nhận dữ liệu đầu vào
        $request->validate([
            'ten' => 'required|string|max:255',
            'lop' => 'required|string|max:255',
            'nganh' => 'required|string|max:255',
            'khoa' => 'required|string|max:255',
        ]);

        // Tìm sinh viên theo ID và cập nhật thông tin
        $student = Student::findOrFail($id);
        $student->update([
            'ten' => $request->ten,
            'lop' => $request->lop,
            'nganh' => $request->nganh,
            'khoa' => $request->khoa,
        ]);

        // Chuyển hướng về trang danh sách sinh viên với thông báo thành công
        return redirect()->route('students.index')->with('success', 'Cập nhật thông tin sinh viên thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
