@extends('layout.app')

@section('content')
    <div class="flex flex-wrap justify-around p-4 w-full">
        <div id="headerToll">
            <div>
                {{ $toll->name }}
            </div>
            <div>
                <div>
                    <b>Id:</b> {{ $toll->id }}
                </div>
                <div>
                    <b>City:</b> {{ $toll->city }}
                </div>
                <div>
                    <b>Station Value:</b> {{ $toll->station_value }} €
                </div>
            </div>
        </div>
        <div id="bodyToll">
            @foreach ($vehicles as $vehicle)
                @php
                    $totalCount = $vehicle->totalCount;
                    $ticketValue = $vehicle->toll_value;
                    $vehicle = $vehicle->vehicle;

                    $vehicleType = $vehicle->vehicleType;

                    $vehicleId = $vehicle->id;
                    $tuition = $vehicle->tuition;
                    $type = $vehicleType->type;

                    $totalValue = $ticketValue * $totalCount;
                    $baseValue = $vehicleType->base_fee;

                    $totalCountText = $totalCount > 1 ? $totalCount . ' Times' : $totalCount . ' Time';
                @endphp
                <div>
                    <div>
                        <div>
                            {{ $tuition }} <b>-</b> {{ $type }}
                        </div>
                        <div>
                            <b>Id: </b> {{ $vehicleId }}
                        </div>
                        <div>
                            <b>Axles: </b> {{ $vehicle->getAxles() }}
                        </div>
                    </div>
                    <div>
                        <div>
                            <b>Total Value: </b> {{ $totalValue }} €
                        </div>
                        <div>
                            <b>Ticket Value: </b> {{ $ticketValue }} €
                        </div>
                        <div>
                            <b>Base Value: </b> {{ $baseValue }} €
                        </div>
                    </div>
                    <div>
                        <div>
                            <b>Passed: </b> {{ $totalCountText }}
                        </div>
                    </div>
                </div>
        </div>
        {{--   --}}
        @endforeach
    </div>
    </div>
@endsection
