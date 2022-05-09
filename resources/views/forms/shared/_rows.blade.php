<div class="container-sm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input value="{{ old('name', $form->name) }}" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Title:</label>
        <textarea id="title" name="title">{{ old('title', $form->title) }}</textarea>

    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description', $form->description) }}</textarea>
    </div>
</div>
