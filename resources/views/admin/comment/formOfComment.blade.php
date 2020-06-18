@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
            
            <form method="POST"action="{{route('admin.addComment', $students->id)}}">
                @csrf
             

                {{-- body --}}
                <div class="form-group row">
                    <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}</label>

                    <div class="col-md-6">
                        <input id="body" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment"  autofocus>

                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
