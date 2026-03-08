<div>
    <form method="POST" action="{{ $action }}" class="needs-validation" novalidate>
        @csrf
        @if(isset($method))
            @method($method)
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Pavadinimas <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $conference->title ?? '') }}" required>
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Aprašymas <span class="text-danger">*</span></label>
            <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $conference->description ?? '') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lecturers" class="form-label">Lektoriai <span class="text-danger">*</span></label>
            <input type="text" name="lecturers" id="lecturers" class="form-control @error('lecturers') is-invalid @enderror"
                   value="{{ old('lecturers', $conference->lecturers ?? '') }}" required placeholder="Pvz.: Jonas Jonaitis, Ona Onaitytė">
            @error('lecturers')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="date" class="form-label">Data <span class="text-danger">*</span></label>
                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror"
                       value="{{ old('date', $conference->date ?? '') }}" required>
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="time" class="form-label">Laikas <span class="text-danger">*</span></label>
                <input type="time" name="time" id="time" class="form-control @error('time') is-invalid @enderror"
                       value="{{ old('time', $conference->time ?? '') }}" required>
                @error('time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Vieta / adresas <span class="text-danger">*</span></label>
            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror"
                   value="{{ old('location', $conference->location ?? '') }}" required>
            @error('location')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-3 mt-4">
            <button type="submit" class="btn btn-primary px-4">
                {{ $buttonText ?? 'Išsaugoti' }}
            </button>
            <a href="{{ route('admin.conferences.index') }}" class="btn btn-outline-secondary px-4">
                Atšaukti
            </a>
        </div>
    </form>
</div>
