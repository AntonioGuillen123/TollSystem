@extends('layout.app')

@section('content')
    <div class="flex flex-wrap gap-5 justify-around p-4 w-full">
        <div id="tolls"
            class="flex flex-col bg-[#434141] rounded-lg border-2 border-black text-white font-bold w-80 overflow-hidden gap-2">
            <div class="flex text-2xl justify-center pt-1 px-1">Tolls</div>
            <div class="text-lg">
                @forelse ($tolls as $toll)
                    <a class="flex justify-around border-t-[1px] p-1.5 cursor-pointer hover:bg-[#5b5858]"
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
        <div id="vehicles"
            class="flex flex-col bg-[#434141] rounded-lg border-2 border-black text-white font-bold w-80 overflow-hidden gap-2">
            <div class="flex text-2xl justify-center pt-1 px-1">Vehicles</div>
            <div class="text-lg">
                @forelse ($vehicles as $vehicle)
                    <a class="flex justify-between items-center border-t-[1px] p-1.5 px-4 cursor-pointer hover:bg-[#5b5858]"
                        href="{{ route('showVehicle', $vehicle->id) }}">
                        <div class="flex">
                            {{ $vehicle->id }}
                        </div>
                        <div>
                            {{ $vehicle->tuition }}
                        </div>
                        <div class="flex justify-end font-normal w-12">
                            {{ $vehicle->vehicleType->type }}
                        </div>
                    </a>
                @empty
                    <div class="flex justify-center pb-1">
                        There are no vehicles :(
                    </div>
                @endforelse
            </div>
        </div>
       {{--  <div id="vehicles" class="bg-[#434141] rounded-lg border-2 border-black text-white font-bold w-80 overflow-hidden">
            <div class="text-2xl text-center pt-1 pb-1">Vehicles</div>
            <div class="text-lg flex flex-col">
                @forelse ($vehicles as $vehicle)
                    <a class="flex justify-between items-center border-t-[1px] px-4 py-2 cursor-pointer hover:bg-[#5b5858]"
                        href="{{ route('showVehicle', $vehicle->id) }}">
                        <div class="w-1/6 text-center">{{ $vehicle->id }}</div>
                        <div class="w-2/6 text-center">{{ $vehicle->tuition }}</div>
                        <div class="w-3/6 text-center font-normal">{{ $vehicle->vehicleType->type }}</div>
                    </a>
                @empty
                    <div class="flex justify-center py-2">
                        There are no vehicles :(
                    </div>
                @endforelse
            </div>
        </div>
    </div> --}}
@endsection
