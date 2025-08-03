@extends('layout')

@section('content')
<div class="container" style="max-width: 900px; margin-top: 20px;">

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
</div>
      <form method="POST" action="{{ route('products.store') }}">
        @csrf

    

        <div class="mb-3">
          <label for="owner" class="form-label fw-semibold">اسم العميل</label>
          <input type="text" id="owner" name="owner" class="form-control @error('owner') is-invalid @enderror" value="{{ old('owner') }}" required>
          @error('owner') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>


            <div class="mb-3">
          <label for="license_number" class="form-label fw-semibold">كود الترخيص</label>
          <input type="text" id="license_number" name="license_number" class="form-control @error('license_number') is-invalid @enderror" value="{{ old('license_number') }}" required>
          @error('license_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="category" class="form-label fw-semibold">فئة الإعلان</label>
          <input type="text" id="category" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" required>
          @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="national_id" class="form-label fw-semibold">الرقم القومي</label>
          <input type="text" id="national_id" name="national_id" class="form-control @error('national_id') is-invalid @enderror" value="{{ old('national_id') }}" required>
          @error('national_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <label for="start_date" class="form-label fw-semibold">تاريخ بداية الترخيص</label>
            <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" required>
            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="col-md-6">
            <label for="end_date" class="form-label fw-semibold">تاريخ نهاية الترخيص</label>
            <input type="date" id="end_date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" required>
            @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="mb-3 mt-3">
          <label for="location" class="form-label fw-semibold">عنوان الموقع</label>
          <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" required>
          @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="road_class" class="form-label fw-semibold">فئة الطريق</label>
          <input type="text" id="road_class" name="road_class" class="form-control @error('road_class') is-invalid @enderror" value="{{ old('road_class') }}" required>
          @error('road_class') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="type" class="form-label fw-semibold">نوع الإعلان</label>
          <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" required>
          @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="size" class="form-label fw-semibold">المقاسات</label>
          <input type="text" id="size" name="size" class="form-control @error('size') is-invalid @enderror" value="{{ old('size') }}" required>
          @error('size') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="coordinates" class="form-label fw-semibold">الإحداثيات</label>
          <textarea id="coordinates" name="coordinates" rows="3" class="form-control @error('coordinates') is-invalid @enderror" placeholder="مثال: خط العرض, خط الطول" required>{{ old('coordinates') }}</textarea>
          @error('coordinates') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 fs-5 mt-2">حفظ</button>
      </form>

    </div>
  </div>

</div>
@endsection
