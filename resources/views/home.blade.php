@extends('layout.app')

@section('content')
    <div class="flex flex-wrap justify-around p-4 w-full">
        <div id="tolls"
            class="flex flex-col bg-[#434141] rounded-lg text-white font-bold w-[17rem] overflow-hidden gap-2">
            <div class="flex text-2xl justify-center pt-1 px-1">Tolls</div>
            <div class="text-lg">
                @forelse ($tolls as $toll)
                    <a class="flex justify-around gap-1 min-w-56 border-t-[1px] p-1.5 cursor-pointer hover:bg-[#5b5858]"
                        href="{{ route('showToll', $toll->id) }}">
                        <div>
                            {{ $toll->id }}
                        </div>
                        <div>
                            {{ $toll->name }}
                        </div>
                        <div class="font-normal">
                            {{ $toll->station_value }} €
                        </div>
                    </a>
                @empty
                    <div class="flex justify-center pb-1">
                        There are no tolls :(
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
