<div class="container-sm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input value="{{ $form->name }}" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Title:</label>
        <textarea type="text" name="title" id="title"
                  class="form-control tinymce-editor">{{ $form->title }}</textarea>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea type="text" name="description" id="description"
                  class="form-control tinymce-editor">{{ $form->description }}</textarea>
    </div>
</div>
