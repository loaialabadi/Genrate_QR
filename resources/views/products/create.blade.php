@extends('layout')

@section('content')
<div class="container" style="max-width: 600px; margin-top: 30px;">
    <h2 class="mb-4 text-center">إضافة إعلان جديد</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="mb-3">
            <label for="owner" class="form-label">صاحب الإعلان</label>
            <input type="text" id="owner" name="owner" class="form-control" placeholder="صاحب الإعلان" required value="{{ old('owner') }}">
            @error('owner') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">نوع الإعلان</label>
            <input type="text" id="type" name="type" class="form-control" placeholder="نوع الإعلان" required value="{{ old('type') }}">
            @error('type') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="size" class="form-label">المقاسات</label>
            <input type="text" id="size" name="size" class="form-control" placeholder="المقاسات" required value="{{ old('size') }}">
            @error('size') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="license_number" class="form-label">رقم الرخصة</label>
            <input type="text" id="license_number" name="license_number" class="form-control" placeholder="رقم الرخصة" required value="{{ old('license_number') }}">
            @error('license_number') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">بداية الرخصة</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required value="{{ old('start_date') }}">
            @error('start_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">انتهاء الرخصة</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required value="{{ old('end_date') }}">
            @error('end_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="coordinates" class="form-label">الإحداثيات</label>
            <textarea id="coordinates" name="coordinates" class="form-control" rows="3" placeholder="الإحداثيات" required>{{ old('coordinates') }}</textarea>
            @error('coordinates') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">حفظ</button>
    </form>
</div>
@endsection
