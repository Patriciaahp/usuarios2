@extends('layouts.layout')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container-sm">
    <div class="teal row ">
        <div class="container-sm col col-4">
            <h1 class="text-center">Welcome</h1>
        </div>
        <div class="container-sm col col-4 white">
            <h3 class=" text-center">Login</h3>
            <div class="">
                <form method="POST" action="{{ route('log') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">Sing in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
