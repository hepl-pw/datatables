<div>
    <table class="table">
        <thead>
        <tr>
            @php
                $qpf = array_filter($qp, fn($p) => ($p !== 'sortField' && $p !== 'sortOrder') ,ARRAY_FILTER_USE_KEY);
            @endphp
            @foreach(['name','email','birthdate'] as $label)
                <th scope="col"><a wire:click.prevent="updateSortField('{{$label}}')"
                                   href="/?sortField={{$label}}&amp;sortOrder={{$sortOrder==='asc'?'desc':'asc'}}&amp;{{http_build_query($qpf)}}">{{ucwords($label)}}</a>
                </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($this->contacts as $contact)
            <tr>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->birthdate}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <!-- TODO: Fix limit cases (dor instance, last page with few elements, etc.)  -->
        <p>Displaying {{$this->contacts->perPage()}} on {{$this->contacts->total()}},
            from {{1 + $this->contacts->perPage() * ($this->contacts->currentPage()-1) }} to
            {{($this->contacts->hasMorePages()?$this->contacts->perPage():$this->contacts->count())
                +$this->contacts->perPage()*($this->contacts->currentPage()-1)}}</p>
    </div>
    {{$this->contacts->links()}}
</div>
