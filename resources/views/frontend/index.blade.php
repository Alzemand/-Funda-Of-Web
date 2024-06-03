<x-app-web-layout>

<x-slot:title>
    Laravel 10 Ninja
</x-slot>

@php
    $message = 'This is a success message';
    $type = 'success';
@endphp

<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <x-alert-message :type="$type" :message="$message" />
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Welcome to Laravel 10 Tutorial</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">This is a simple tutorial for beginners to learn Laravel 10 from scratch.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p class="text-center">Please click on the links in the navigation bar to learn more about Laravel 10.</p>
        </div>
    </div>
</div>


<x-slot:scripts>
    <script>
        console.log('Hello from the index page');
    </script>
</x-slot>

</x-app-web-layout>
