@if (session('error'))
<div class="alert alert-danger">
    <i class="fas fa-times"></i>
    {{ session('error') }}
</div>
@endif