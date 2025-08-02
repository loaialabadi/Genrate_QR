@extends('layout')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 40px;">

  <div class="card shadow-sm rounded-4 border-0">
    <div class="card-header bg-primary text-white text-center fs-4 fw-bold">
      <i class="fas fa-plus-circle me-2"></i> إضافة إعلان جديد
    </div>
    <div class="card-body p-4">

      @if(session('success'))
        <div class="alert alert-success text-center fs-6 shadow-sm rounded-3">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="mb-3">
          <label for="owner" class="form-label fw-semibold">صاحب الإعلان</label>
          <input type="text" id="owner" name="owner" class="form-control @error('owner') is-invalid @enderror" placeholder="صاحب الإعلان" required value="{{ old('owner') }}">
          @error('owner') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="type" class="form-label fw-semibold">نوع الإعلان</label>
          <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="نوع الإعلان" required value="{{ old('type') }}">
          @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="size" class="form-label fw-semibold">المقاسات</label>
          <input type="text" id="size" name="size" class="form-control @error('size') is-invalid @enderror" placeholder="المقاسات" required value="{{ old('size') }}">
          @error('size') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="license_number" class="form-label fw-semibold">رقم الرخصة</label>
          <input type="text" id="license_number" name="license_number" class="form-control @error('license_number') is-invalid @enderror" placeholder="رقم الرخصة" required value="{{ old('license_number') }}">
          @error('license_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label for="start_date" class="form-label fw-semibold">بداية الرخصة</label>
            <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" required value="{{ old('start_date') }}">
            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="col-md-6">
            <label for="end_date" class="form-label fw-semibold">انتهاء الرخصة</label>
            <input type="date" id="end_date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" required value="{{ old('end_date') }}">
            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="mb-3 mt-3">
          <label for="coordinates" class="form-label fw-semibold">الإحداثيات</label>
          <textarea id="coordinates" name="coordinates" class="form-control @error('coordinates') is-invalid @enderror" rows="3" placeholder="الإحداثيات" required>{{ old('coordinates') }}</textarea>
          @error('coordinates') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 fs-5 mt-3">حفظ</button>
      </form>

    </div>
  </div>

</div>
@endsection
