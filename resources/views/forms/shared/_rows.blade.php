<div class="container-sm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input value="{{ $form->name }}" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Title:</label>
        <textarea id="title" name="title">{{ $form->title }}</textarea>

    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $form->description }}</textarea>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#title'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>

</div>
