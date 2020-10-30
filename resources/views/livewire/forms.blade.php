<div>
    <div class="row">
        <form class="col" action="/">
            <div class="form-group">
                <label for="per-page">Per Page:</label>
                <select name="per-page"
                        wire:model="perPage"
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
                       wire:model="searchTerm"
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
</div>
