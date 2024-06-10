<style>

    .alert-error {
        color: red;
    }
</style>

@if ($errors->any())
<div class="alert-error">
        @foreach ($errors->all() as $error)
            {{ $error }}
            <br>
        @endforeach
</div>
@endif