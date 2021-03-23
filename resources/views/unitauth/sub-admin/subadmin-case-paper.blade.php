@if($paper == 'null')
            null
@else
    @forelse(json_decode($paper, true) as $datapaper)
        {{$datapaper}},
    @empty
    @endforelse
    @if(empty($paperno))
    @else
        {{$paperno}}
    @endif
@endif
