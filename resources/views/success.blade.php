
<style>
    .alert-success {
        color: green;
    }

</style>
@if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif