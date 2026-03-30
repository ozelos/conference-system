<div>
    @extends('layouts.app')

@section('title', 'Prisijungimas')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Prisijungimas</h4>
                </div>
                <div class="card-body p-4">

                    <!-- Pranešimai -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf

                        <!-- El. paštas -->
                        <div class="mb-3">
                            <label for="email" class="form-label">El. paštas <span class="text-danger">*</span></label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" 
                                   required autofocus>
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

                        <!-- Remember me -->
                        <div class="mb-4 form-check">
                            <input type="checkbox" 
                                   name="remember" 
                                   id="remember" 
                                   class="form-check-input">
                            <label class="form-check-label" for="remember">
                                Prisiminti mane
                            </label>
                        </div>

                        <!-- Mygtukas -->
                        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">
                            Prisijungti
                        </button>
                    </form>

                    <!-- Nuorodos -->
                    <div class="text-center">
                        <p class="mb-2">
                            Neturite paskyros? 
                            <a href="{{ route('register') }}" class="text-decoration-none">Registruokitės čia</a>
                        </p>
                        
                        <!-- Jei vėliau norėsite "Pamiršau slaptažodį" -->
                        <!-- <a href="#" class="text-muted small">Pamiršau slaptažodį?</a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
</div>