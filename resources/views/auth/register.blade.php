<div>
    @extends('layouts.app')

@section('title', 'Registracija')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Registracija</h4>
                </div>
                <div class="card-body p-4">

                    <!-- Pranešimai -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <!-- Vardas -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Vardas ir pavardė <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" 
                                   required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- El. paštas -->
                        <div class="mb-3">
                            <label for="email" class="form-label">El. paštas <span class="text-danger">*</span></label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slaptažodis -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Slaptažodis <span class="text-danger">*</span></label>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control @error('password') is-invalid @enderror"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Slaptažodžio patvirtinimas -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Pakartokite slaptažodį <span class="text-danger">*</span></label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mygtukas -->
                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Registruotis
                        </button>
                    </form>

                    <!-- Nuoroda į prisijungimą -->
                    <div class="text-center mt-4">
                        Jau turite paskyrą? 
                        <a href="{{ route('login') }}" class="text-decoration-none">Prisijunkite čia</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
</div>