<div class="container-fluid mb-5">
    <h2 class="text-center">Answers</h2>

    <div class="container-sm mt-5 ">
        <table class="table">
            <thead class="thead">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Label</th>
                <th scope="col">Label</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$session->id}}</td>
                <td>{{$session->hash}}</td>
                <td>{{$session->started_at}}</td>


            </tr>
            </tbody>
        </table>
    </div>
</div>
