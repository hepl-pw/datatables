<div>
    <div class="row">
        <form class="col" action="/">
            <div class="form-group">
                <label for="perPage">Per Page:</label>
                <select name="perPage"
                        wire:model="perPage"
                        class="form-control"
                        id="perPage">{{$perPage}}
                    <option wire:key="10" @if($qp['perPage'] === 10) selected @endif>10</option>
                    <option wire:key="15" @if($qp['perPage'] === 15) selected @endif>15</option>
                    <option wire:key="25" @if($qp['perPage'] === 25) selected @endif>25</option>
                </select>
            </div>
            @foreach($qp as $k => $p)
                @if($k!='perPage')
                    <input type="hidden" name="{{$k}}" value="{{$p}}">
                @endif
            @endforeach
            <noscript>
                <button type="submit">Change pagination</button>
            </noscript>
        </form>
        <form class="col" action="/">
            <div class="form-group">
                <label for="searchTerm">Search term or email:</label>
                <input type="search"
                       class="form-control"
                       wire:model="searchTerm"
                       name="searchTerm"
                       id="searchTerm"
                       value="{{$searchTerm}}"
                       placeholder="name or email"
                >
            </div>
            @foreach($qp as $k => $p)
                @if($k!='searchTerm')
                    <input type="hidden" name="{{$k}}" value="{{$p}}">
                @endif
            @endforeach
            <noscript>
                <button type="submit">Search</button>
            </noscript>
        </form>
    </div>
</div>
