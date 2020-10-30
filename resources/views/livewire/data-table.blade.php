<div>
    <table class="table">
        <thead>
        <tr>
            @php
                $qpf = array_filter($qp, fn($p) => $p !== 'sort-field' ,ARRAY_FILTER_USE_KEY);
            @endphp
            @foreach(['name','email','birthdate'] as $label)
                <th scope="col"><a wire:click.prevent="updateSortField('{{$label}}')"
                                   href="/?sort-field={{$label}}&amp;{{http_build_query($qpf)}}">{{ucwords($label)}}</a>
                </th>
            @endforeach
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
