<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Student;

class MainController extends Controller
{
    static $students, $nextnumber, $column = 'no', $asc = 'asc', $page = 1, $where = '';

    public function index(Request $request)
    {
        return view('listtable', $this -> prepareData($request));
    }

    public function searchResult(Request $request)
    {
        $this -> getInputs($request);
        $this -> getStudents(self::$where);
        return view('found', ['students' => self::$students, 'column' => self::$column, 'asc' => self::$asc, 'page' => self::$page, 'where' => self::$where]);
    }
    public function getLinks(Request $request)
    {
        $this -> prepareData($request);
        $page = self::$page;
        Paginator::currentPageResolver(function() use ($page){
            return $page;
        });

        return self::$students -> links('pagination::default', ['column' => self::$column, 'asc' => self::$asc, 'page' => self::$page, 'where' => self::$where]);
    }

    public function prepareData(Request $request)
    {
        $this->getInputs($request);
        $this->getStudents(self::$where);

        return ['students' => self::$students, 'nextnumber' => self::$nextnumber, 'column' => self::$column, 'asc' => self::$asc, 'page' => self::$students -> currentPage(), 'where' => self::$where];
    }

    public function getInputs(Request $request)
    {
        self::$column = $request -> input('col', 'no');
        self::$asc = $request -> input('asc', 'asc');
        self::$page = $request -> input('page', 1);
        self::$where = $request -> input('where', '');
    }

    public function getStudents($where)
    {
        self::$students = Student::orderBy(self::$column, self::$asc);
        $path = '/';

        if($where != ''){
            self::$students = self::$students -> where('no', 'LIKE', '%' . $where . '%')
                                               -> orWhere('name', 'LIKE', '%' . $where . '%')
                                                -> orWhere('surname', 'LIKE', '%' . $where . '%')
                                                 -> orWhere('department', 'LIKE', '%' . $where . '%');
                                      
            self::$students = self::$students -> forPage(self::$page + 1, 5) -> paginate(5);
        }
        else{
            $page = self::$page;
            $empty = self::$students -> paginate(5) -> isEmpty();

            if($page > 1)
                Paginator::currentPageResolver(function() use ($page, $empty) {
                    if($empty)
                        return $page - 1;
                    return $page;
                });
            
            self::$students = self::$students -> paginate(5) -> setPath($path) -> appends(['col' => self::$column, 'asc' => self::$asc, 'where' => self::$where]);
            
            $table = DB::select("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='university' AND TABLE_NAME='students'");
            self::$nextnumber = $table[0]->AUTO_INCREMENT;
        }
    }

    public function newForm(Request $request)
    {
        return view('new', $this -> prepareData($request));
    }

    public function newStudent(Request $request)
    {
        $name = $request -> input('name');
        $surname = $request -> input('surname');
        $department = $request -> input('department');
        if($name == '' && $surname == '' && $department == '')
            return redirect('/')->with('failure', 'Please enter information');

    
        Student::create(['name' => $name, 'surname' => $surname, 'department' => $department]);

        $this->getInputs($request);

        return redirect('/?col=' . self::$column . '&asc=' . self::$asc . '&page=' . self::$page . '&where=' . self::$where)->with('success','Student added successfully');
    }

    public function delete($no)
    {
        Student::destroy($no);
        return redirect()->back()->with('success', 'Student deleted successfully');
    }

    public function form(Request $request, $no)
    {
        $student = Student::find($no);
        $data = $this -> prepareData($request);
        $data['student'] = $student;
        return view('update', $data);
    }

    public function update(Request $request, $no)
    {
        $name = $request -> input('name');
        $surname = $request -> input('surname');
        $department = $request -> input('department');
        if($name == "" && $surname == "" && $department == "")
            return redirect()->back()->with('failure', 'Please enter information');
            
        $student = Student::find($no);

        $oldname = $student->name;
        $oldsurname = $student->surname;
        $olddepartment = $student->department;

        if($name == $oldname && $surname == $oldsurname && $department == $olddepartment)
            return redirect()->back()->with('failure', 'No fields have been changed');
        
        if($name != '')
            $student->name = $name;
        if($surname != '')
            $student->surname = $surname;
        if($department != '')
            $student->department = $department;
        $student->save();

        $this->getInputs($request);

        return redirect('/?col=' . self::$column . '&asc=' . self::$asc . '&page=' . self::$page . '&where=' . self::$where)->with('success', 'Updated successfully');
    }
    
}