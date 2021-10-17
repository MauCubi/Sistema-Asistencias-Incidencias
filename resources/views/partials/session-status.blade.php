@if (session('status'))
<div class="alert alert-success">
    <i class="fas fa-check"></i>
    {{ session('status') }}
</div>
@endif