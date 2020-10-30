<div>
    <table class="table">
        <thead>
        <tr>
            @php
                $qpf = array_filter($qp, fn($p) => $p !== 'sort-field' ,ARRAY_FILTER_USE_KEY);
            @endphp
            <th scope="col"><a href="/?sort-field=name&amp;{{http_build_query($qpf)}}">Name</a></th>
            <th scope="col"><a href="/?sort-field=email&amp;{{http_build_query($qpf)}}">Email</a></th>
            <th scope="col"><a href="/?sort-field=birthdate&amp;{{http_build_query($qpf)}}">Birthdate</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->birthdate}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <p>Displaying {{$contacts->perPage()}} on {{$contacts->total()}},
            from {{1 + $contacts->perPage() * ($contacts->currentPage()-1) }} to
            {{($contacts->hasMorePages()?$contacts->perPage():$contacts->count())
                +$contacts->perPage()*($contacts->currentPage()-1)}}</p>
    </div>
    {{$contacts->links()}}
</div>
