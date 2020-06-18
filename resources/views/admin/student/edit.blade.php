@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            {{-- form edit --}}
            <div class="card">
                <div class="card-header"><h4>Edit Student</h4></div>
                <div class="card-body">
                    <form action="{{route('home.update',$students->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="firstname" value="{{$students->firstName}}" class="form-control">
                        <br>
                        <input type="text" name="lastname" value="{{$students->lastName}}" class="form-control">
                        <br>
                        <label for="gender">Gender</label><br>      
                            @if ($students->gender == 'Male')
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" checked type="radio" name="gender" value="Male">
                                    <span class="form-radio-sign">Male</span>
                                </label>                      
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input"  type="radio" name="gender" value="Female">
                                    <span class="form-radio-sign">Female</span>
                                </label>     
                            @else
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" checked type="radio" name="gender" value="Male">
                                    <span class="form-radio-sign">Male</span>
                                </label>                      
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" checked  type="radio" name="gender" value="Female">
                                    <span class="form-radio-sign">Female</span>
                                </label>    
                            @endif
                        <br>
                        <select name="class" class="form-control">
                            <option value="" disabled><---Select Province---></option>
                            @if ($students->class=='WEP2020-A')   
                                <option value="WEP2020-A" selected>WEP2020-A</option>
                                <option value="WEP2020-B">WEP2020-B</option>
                                <option value="SNA2020">SNA2020</option>
                                <option value="Class_A">Class_A</option>
                                <option value="Class_B">Class_B</option>
                                <option value="Class_C">Class_C</option>
                            @endif
                            @if ($students->class=='WEP2020-B')
                            <option value="WEP2020-A">WEP2020-A</option>
                            <option value="WEP2020-B" selected>WEP2020-B</option>
                                <option value="SNA2020">SNA2020</option>
                                <option value="Class_A">Class_A</option>
                                <option value="Class_B">Class_B</option>
                                <option value="Class_C">Class_C</option>
                            @endif
                            @if ($students->class=='SNA2020')
                            <option value="WEP2020-A">WEP2020-A</option>
                            <option value="WEP2020-B">WEP2020-B</option>
                            <option value="SNA2020" selected>SNA2020</option>
                                <option value="Class_A">Class_A</option>
                                <option value="Class_B">Class_B</option>
                                <option value="Class_C">Class_C</option>
                            @endif
                            @if ($students->class=='Class_A')
                            <option value="WEP2020-A">WEP2020-A</option>
                            <option value="WEP2020-B">WEP2020-B</option>
                            <option value="SNA2020">SNA2020</option>
                            <option value="Class_A" selected>Class_A</option>
                                <option value="Class_B">Class_B</option>
                                <option value="Class_C">Class_C</option>
                            @endif
                            @if ($students->class=='Class_B')
                            <option value="WEP2020-A">WEP2020-A</option>
                            <option value="WEP2020-B">WEP2020-B</option>
                            <option value="SNA2020">SNA2020</option>
                            <option value="Class_A">Class_A</option>
                            <option value="Class_B" selected>Class_B</option>
                                <option value="Class_C">Class_C</option>
                            @endif
                            @if ($students->class=='Class_C')
                            <option value="WEP2020-A">WEP2020-A</option>
                            <option value="WEP2020-B">WEP2020-B</option>
                            <option value="SNA2020">SNA2020</option>
                            <option value="Class_A">Class_A</option>
                            <option value="Class_B">Class_B</option>
                            <option value="Class_C" selected>Class_C</option>
                            @endif
                        </select>
                        <br>
                        @if ($students->year == 'First Year')
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" checked type="radio" name="year" value="First Year">
                                <span class="form-radio-sign">First Year</span>
                            </label>                      
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input"  type="radio" name="year" value="Second Year">
                                <span class="form-radio-sign">Second Year</span>
                            </label>     
                        @else
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" checked type="radio" name="year" value="First Year">
                                <span class="form-radio-sign">First Year</span>
                            </label>                      
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" checked  type="radio" name="year" value="Second Year">
                                <span class="form-radio-sign">Second Year</span>
                            </label>    
                        @endif
    
                        
                        <input type="text" name="student_id" value="{{$students->student_id}}" class="form-control">
                        <br>
                        <select name="province" id="province" class="form-control">
                            <option value="" disabled><---Select Province---></option>
                            @if ($students->province=='Phnom Penh')
                                <option value="Phnom Penh" selected>Phnom Penh</option>
                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                <option value="Battambang">Battambang</option>
                                <option value="Kampong Cham">Kampong Cham</option>
                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                <option value="Kampong Speu">Kampong Speu</option>
                            @endif
                            @if ($students->province=='Banteay Meanchey')
                                <option value="Phnom Penh">Phnom Penh</option>
                                <option value="Banteay Meanchey" selected>Banteay Meanchey</option>
                                <option value="Battambang">Battambang</option>
                                <option value="Kampong Cham">Kampong Cham</option>
                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                <option value="Kampong Speu">Kampong Speu</option>
                            @endif
                            @if ($students->province=='Battambang')
                                <option value="Phnom Penh">Phnom Penh</option>
                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                <option value="Battambang" selected>Battambang</option>
                                <option value="Kampong Cham">Kampong Cham</option>
                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                <option value="Kampong Speu">Kampong Speu</option>
                            @endif
                            @if ($students->province=='Kampong Cham')
                                <option value="Phnom Penh">Phnom Penh</option>
                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                <option value="Battambang">Battambang</option>
                                <option value="Kampong Cham" selected>Kampong Cham</option>
                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                <option value="Kampong Speu">Kampong Speu</option>
                            @endif
                            @if ($students->province=='Kampong Chhnang')
                                <option value="Phnom Penh">Phnom Penh</option>
                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                <option value="Battambang">Battambang</option>
                                <option value="Kampong Cham">Kampong Cham</option>
                                <option value="Kampong Chhnang" selected>Kampong Chhnang</option>   
                                <option value="Kampong Speu">Kampong Speu</option>
                            @endif
                            @if ($students->province=='Kampong Speu')
                                <option value="Phnom Penh">Phnom Penh</option>
                                <option value="Banteay Meanchey">Banteay Meanchey</option>
                                <option value="Battambang">Battambang</option>
                                <option value="Kampong Cham">Kampong Cham</option>
                                <option value="Kampong Chhnang">Kampong Chhnang</option>
                                <option value="Kampong Speu" selected>Kampong Speu</option>   
                            @endif
                            
                        </select>
                        <br>
                        @if ($students->status=='Follow Up')
                            
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" checked type="radio" name="status" value="Follow Up">
                                <span class="form-radio-sign">Follow Up</span>
                            </label>                      
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input"  type="radio" name="status" value="Out Of Follow Up">
                                <span class="form-radio-sign">Out Of Follow Up</span>
                            </label>     
                        @else
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" checked type="radio" name="status" value="Follow Up">
                                <span class="form-radio-sign">Follow Up</span>
                            </label>                      
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" checked  type="radio" name="status" value="Out Of Follow Up">
                                <span class="form-radio-sign">Out Of Follow Up</span>
                            </label>    
                        @endif
                        <br>
                        <label for="img">Choose Picture</label>
                        <input type="file" name="picture">
                        <br>
                        <input type="submit" class="btn btn-info btn-block" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
