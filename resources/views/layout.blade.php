<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>لوحة التحكم</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  
  <!-- App CSS -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

</head>
<body>

  <div class="topbar">
    <div class="logo">لوحة التحكم لإعلانات الباركود - محافظة قنا</div>
    <div class="actions">
      <i class="fas fa-bell" title="الإشعارات"></i>
      <i class="fas fa-user-circle" title="حسابي"></i>
      <i id="toggleSidebar" class="fas fa-bars" title="تبديل القائمة"></i>
    </div>
  </div>

  <div class="sidebar" id="sidebar">
    <h4>القائمة</h4>
    <a href="{{ route('products.dashboard') }}" class="{{ request()->routeIs('products.dashboard') ? 'active' : '' }}">
      <i class="fas fa-home"></i> <span>الرئيسية</span>
    </a>
    <a href="{{ route('products.create') }}" class="{{ request()->routeIs('products.create') ? 'active' : '' }}">
      <i class="fas fa-plus-circle"></i> <span>إضافة إعلان</span>
    </a>
    <a href="{{ route('products.near') }}" class="{{ request()->routeIs('products.near') ? 'active' : '' }}">
      <i class="fas fa-clock"></i> <span>قرب الانتهاء</span>
    </a>
    <a href="{{ route('products.expired') }}" class="{{ request()->routeIs('products.expired') ? 'active' : '' }}">
      <i class="fas fa-times-circle"></i> <span>المنتهية</span>
    </a>
    <a href="{{ route('products.all') }}" class="{{ request()->routeIs('products.all') ? 'active' : '' }}">
      <i class="fas fa-list"></i> <span>كل الإعلانات</span>
    </a>
  </div>

  <div class="content container">

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle"></i>
        <strong>تم بنجاح!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="إغلاق"></button>
      </div>
    @endif

    @yield('content')

  </div>

  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');

    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      if (sidebar.classList.contains('collapsed')) {
        content.style.marginRight = '70px';  // تعديل هنا
      } else {
        content.style.marginRight = '250px'; // تعديل هنا
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')

</body>
</html>
