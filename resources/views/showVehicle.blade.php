@extends('layout.app')

@php
    $vehicleId = $vehicle->id;
    $vehicleTuition = $vehicle->tuition;
    $vehicleTotalSum = $vehicle->totalSum;
    $vehicleAxles = $vehicle->getAxles();

    $vehicleType = $vehicle->vehicleType;

    $type = $vehicleType->type;
    $baseValue = $vehicleType->base_fee;
    $ticketValue = $vehicle->getTicket();
@endphp

@section('title')
    {{ $vehicleTuition }}
@endsection

@section('content')
    <div class="flex flex-col flex-wrap gap-16 p-4 w-full">
        <div id="headerVehicle" class="flex flex-col gap-8 text-white border-2 border-black rounded-lg bg-[#434141] p-2">
            <div class="flex justify-center text-3xl font-bold ">
                {{ $vehicleTuition }}
            </div>
            <div class="flex text-2xl justify-around">
                <div>
                    <b>Id:</b> {{ $vehicleId }}
                </div>
                <div>
                    <b>Type:</b> {{ $type }}
                </div>
                <div>
                    <b>Axles:</b> {{ $vehicleAxles }}
                </div>
                <div>
                    <b>Total:</b> {{ $vehicleTotalSum }} €
                </div>
            </div>
        </div>
        <div id="bodyVehicle" class="flex flex-wrap text-white justify-center gap-16">
            @foreach ($tolls as $toll)
                @php
                    $totalCount = $toll->totalCount;
                    $stationValue = $toll->stationValue;
                    $toll = $toll->tollStation;

                    $tollId = $toll->id;
                    $tollName = $toll->name;
                    $tollCity = $toll->city;

                    $totalCountText = $totalCount > 1 ? $totalCount . ' Times' : $totalCount . ' Time';
                @endphp
                <a href="{{ route('showToll', $tollId) }}"
                    class="flex flex-col border-2 w-56 h-64 justify-between bg-[#434141] hover:bg-[#5b5858] border-black rounded-lg p-2">
                    <div>
                        <div class="flex justify-center font-bold">
                            {{ $tollName }}
                        </div>
                        <div class="flex justify-between pt-2">
                            <div class="font-bold">Id: </div>
                            <div>{{ $tollId }}</div>
                        </div>
                        <div class="flex justify-between">
                            <div class="font-bold">City: </div>
                            <div>{{ $tollCity }}</div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between">
                            <div class="font-bold">Total Value: </div>
                            <div>{{ $stationValue }} €</div>
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
