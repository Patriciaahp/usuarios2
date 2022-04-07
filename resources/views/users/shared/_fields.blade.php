<div class="container-sm">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Surname:</label>
        <input value="{{ $user->surname }}" type="text" name="surname" id="surname" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input value="{{ $user->email }}" type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Password:</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
</div>
