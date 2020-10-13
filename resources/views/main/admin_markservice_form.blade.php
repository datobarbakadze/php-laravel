<br>
<div class="row">
    <br>
   <div class="float-left col-12"> <h5>{{ $title }}</h5></div>
    <br>

    <div class="col col-sm-12 mark-container ">
        @foreach($objects as $object)
            <div class="row ">
                @if($section=="gallery")
                    <div class="col col-sm-8 float-left p-0 m-0 ml-4">
                        <img src="{{ asset("storage/s_".$object->image) }}" width="44" height="44" alt="">
                    </div>
                @else
                    <div  class="mark-title col col-sm-8 float-left p-0 m-0 ml-4">{{ $object->title }}</div>
                @endif
                <div class="float-right  p-0 m-0 ml-5">
                    <button class="btn {{ $object->mark == 0 ? 'btn-primary' : 'btn-danger' }} service-mark-btn"
                            command="{{ $object->mark == 0 ? 'mark' : 'unmark' }}"
                            itemId="{{ $object->id }}" section="{{ $section }}"
                            action="{{ route("mark",["id"=>$object->id]) }}"
                            id="{{ $section }}-{{ $object->id }}">{{ $object->mark == 0 ? 'მონიშვნა' : 'განიშვნა' }}</button>
                </div>
            </div>
        @endforeach
    </div>

</div>

