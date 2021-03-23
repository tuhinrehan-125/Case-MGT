@if(!empty($case) && $case !=null)
    @foreach($case as $info)
        @php
            $cr=$crime->where('id',$info ?? '')->first();
        @endphp
        {{$cr->crime ?? ''}},
    @endforeach
@else
    Null
@endif

