<div>
    @extends('layouts.app')

    @section('title', 'Redaguoti naudotoją')

    @section('content')
        <h1 class="mb-4">Redaguoti naudotoją</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Vardas ir pavardė <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">El. paštas</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}" readonly>
                        <div class="form-text">El. pašto keitimas šiuo metu neleidžiamas</div>
                    </div>

                    <!-- Jei nori leisti keisti rolę -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Rolė</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                            <option value="client"   {{ old('role', $user->role) == 'client'   ? 'selected' : '' }}>Klientas</option>
                            <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>Darbuotojas</option>
                            <option value="admin"    {{ old('role', $user->role) == 'admin'    ? 'selected' : '' }}>Administratorius</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            Išsaugoti pakeitimus
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary px-4">
                            Atšaukti
                        </a>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</div>
