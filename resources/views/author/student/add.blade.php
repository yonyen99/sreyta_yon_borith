


@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            {{-- form add --}}
            <div class="card">
                <div class="card-header"><h4>Form Register</h4></div>
                <div class="card-body">
                    <form action="{{route('home.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="firstname" placeholder="firstname..." class="form-control">
                        <br>
                        <input type="text" name="lastname" placeholder="lastname..." class="form-control">
                        <br>
                        <input type="radio" id="male" name="gender" value="Male" checked> Male
                        <input type="radio" id="female" name="gender" value="Female"> Female
                        <br>
                        <select name="class" class="form-control">
                            <option value=""><---Select Class---></option>
                            <option value="WEP2020-A">WEP2020-A</option>
                            <option value="WEP2020-B">WEP2020-B</option>
                            <option value="SNA2020">SNA2020</option>
                            <option value="Class_A">Class_A</option>
                            <option value="Class_B">Class_B</option>
                            <option value="Class_C">Class_C</option>
                        </select>
                        <br>
                        <input type="radio" id="first year" name="year" value="first year" checked> First Year
                        <input type="radio" id="second year" name="year" value="second year"> Second Year
                        <input type="text" name="student_id" placeholder="student_id..." class="form-control">
                        <br>
                        <select name="province" id="province" class="form-control">
                            <option value=""><---Select Province---></option>
                            <option value="Phnom Penh">Phnom Penh</option>
                            <option value="Banteay Meanchey">Banteay Meanchey</option>
                            <option value="Battambang">Battambang</option>
                            <option value="Kampong Cham">Kampong Cham</option>
                            <option value="Kampong Chhnang">Kampong Chhnang</option>
                            <option value="Kampong Speu">Kampong Speu</option>
                        </select>
                        <br>
                        <input type="radio" id="follow up" name="status" value="follow up" checked> Follow Up
                        <input type="radio" id="out of follow up" name="status" value="out of follow up"> Out Of Follow Up
                        <br>
                        {{ csrf_field() }}
                        <label for="img">Choose Picture</label>
                        <input type="file" name="picture" required="">
                        <br>
                        <button type="submit" class="btn btn-info btn-block"> Add </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
