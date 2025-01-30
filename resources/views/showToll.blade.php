@extends('layout.app')

@php
    $tollId = $toll->id;
    $tollName = $toll->name;
    $tollCity = $toll->name;
    $stationValue = $toll->name;
@endphp

@section('title')
    {{ $tollName }}
@endsection

@section('content')
    <div class="flex flex-col flex-wrap gap-16 p-4 w-full">
        <div id="headerToll" class="flex flex-col gap-8 text-white border-2 border-black rounded-lg bg-[#434141] p-2">
            <div class="flex justify-center text-3xl font-bold ">
                {{ $tollName }}
            </div>
            <div class="flex text-2xl justify-around">
                <div>
                    <b>Id:</b> {{ $tollId }}
                </div>
                <div>
                    <b>City:</b> {{ $tollCity }}
                </div>
                <div>
                    <b>Station Value:</b> {{ $stationValue }} €
                </div>
            </div>
        </div>
        <div id="bodyToll" class="flex flex-wrap text-white justify-center gap-16">
            @foreach ($vehicles as $vehicle)
                @php
                    $totalCount = $vehicle->totalCount;
                    $ticketValue = $vehicle->toll_value;
                    $vehicle = $vehicle->vehicle;

                    $vehicleId = $vehicle->id;
                    $tuition = $vehicle->tuition;

                    $vehicleType = $vehicle->vehicleType;
                    $vehicleAxles = $vehicle->getAxles();

                    $type = $vehicleType->type;
                    $baseValue = $vehicleType->base_fee;
                    $totalValue = $ticketValue * $totalCount;

                    $totalCountText = $totalCount > 1 ? $totalCount . ' Times' : $totalCount . ' Time';
                @endphp
                <a href="{{ route('showVehicle', $vehicleId) }}"
                    class="flex flex-col border-2 w-56 h-64 justify-between bg-[#434141] hover:bg-[#5b5858] border-black rounded-lg p-2">
                    <div>
                        <div class="flex justify-center font-bold">
                            {{ $tuition }} <b>-</b> {{ $type }}
                        </div>
                        <div class="flex justify-between pt-2">
                            <div class="font-bold">Id: </div>
                            <div>{{ $vehicleId }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-bold">Axles: </div>
                            <div>{{ $vehicleAxles }}</div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between">
                            <div class="font-bold">Total Value: </div>
                            <div>{{ $totalValue }} €</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-bold">Ticket Value: </div>
                            <div>{{ $ticketValue }} €</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-bold">Base Value: </div>
                            <div>{{ $baseValue }} €</div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between">
                            <div class="font-bold">Passed: </div>
                            <div>{{ $totalCountText }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
