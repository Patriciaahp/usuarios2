<div>
    <div class="modal-header">
        <h2 class="modal-title"> Send Email</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <h1 class="col"></h1>
        <div class="container-fluid white p-4">
            <form action="{{route('send.email', ['id' => $form->id])}}" method="POST">
                @csrf
                <label for="email">Send this form to: </label>
                <input id="email" name="email" type="email">
                <button type="submit">Send form</button>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
