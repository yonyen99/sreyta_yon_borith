


@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            {{-- form add --}}
            <div class="card">
                <div class="card-header"><h4>Form Edit</h4></div>
                <div class="card-body">
                    <form action="{{route('admin.student.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <input type="text" class="form-control" name="first_name" value="{{$student->first_name}}"> 
                        <br>
                        <input type="text" class="form-control" name="last_name" value="{{$student->last_name}}" >
                        <br>
                        {{-- <input type="radio" id="male" name="gender" value="Male" checked> Male
                        <input type="radio" id="female" name="gender" value="Female"> Female --}}
                        @if ($student->gender == 'Female')
                        
                            <input class="form-radio-input" checked type="radio" name="gender" value="Female">
                            <span class="form-radio-sign">Female</span>
                        </label>                      
                        
                            <input class="form-radio-input"  type="radio" name="gender" value="Male">
                            <span class="form-radio-sign">Male</span>
                        </label>     
                    @else
                        
                            <input class="form-radio-input" checked type="radio" name="gender" value="Female">
                            <span class="form-radio-sign">Female</span>
                        </label>                      
                        
                            <input class="form-radio-input" checked  type="radio" name="gender" value="Male">
                            <span class="form-radio-sign">Male</span>
                        </label>    
                    @endif

                        <br>
                        <input type="text" class="form-control" name="class" required value="{{$student->class}}" >
                        <br>
                        <input type="text" class="form-control" name="student_id" required value="{{$student->student_id}}">
                        <br>
                        <input class="form-control" type="number" name="year" required value="{{$student->year}}">
                        <br>
                        <input class="form-control" type="text" name="province" required value="{{$student->province}}">
                        <br>
                      
                      
                        <button type="submit" class="btn btn-info btn-block"> Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
