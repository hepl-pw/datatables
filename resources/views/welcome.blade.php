<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Mes contacts</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">
</head>
<body>
<main class="container">
    <h1>Mes Contacts</h1>
    <div class="row">
        <form class="col" action="/">
            <div class="form-group">
                <label for="per-page">Per Page:</label>
                <select name="per-page"
                        class="form-control"
                        id="per-page">
                    <option value="10" {{$perPage == 10 ? 'selected' : ''}}>10</option>
                    <option value="15" {{$perPage == 15 ? 'selected' : ''}}>15</option>
                    <option value="25" {{$perPage == 25 ? 'selected' : ''}}>25</option>
                </select>
            </div>
            @foreach($qp as $k => $p)
                @if($k!='per-page')
                    <input type="hidden" name="{{$k}}" value="{{$p}}">
                @endif
            @endforeach
            <noscript>
                <button type="submit">Change pagination</button>
            </noscript>
        </form>
        <form class="col" action="/">
            <div class="form-group">
                <label for="search-term">Search term or email:</label>
                <input type="search"
                       class="form-control"
                       name="search-term"
                       id="search-term"
                       value="{{$searchTerm}}"
                       placeholder="name or email"
                >
            </div>
            @foreach($qp as $k => $p)
                @if($k!='search-term')
                    <input type="hidden" name="{{$k}}" value="{{$p}}">
                @endif
            @endforeach
            <noscript>
                <button type="submit">Search</button>
            </noscript>
        </form>
    </div>
    <hr>
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
            from {{1+$contacts->perPage()*($contacts->currentPage()-1)}} to
            {{($contacts->hasMorePages()?$contacts->perPage():$contacts->count())
                +$contacts->perPage()*($contacts->currentPage()-1)}}</p>
    </div>
    {{$contacts->appends($qp)->links()}}
</main>
</body>
</html>
