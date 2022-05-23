<div class="container-fluid mb-5">
    <h2 class="text-center">Answers</h2>
    @if($answers->count())

        <div class="container-sm mt-5 ">
            <table class="table">
                <thead class="thead">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Label</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Session</th>


                </tr>
                </thead>
                <tbody>
                @foreach($answers as $answer)
                    <tr>
                        <td>{{$answer->id}}</td>
                        <td>{{$answer->label}}</td>
                        <td>{{$answer->answer}}</td>
                        <td>{{$answer->created_at}}</td>
                        <td>{{$answer->session_id}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h2>Any answers yet</h2>
    @endif

</div>
