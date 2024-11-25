<x-filament-panels::page>
  {{-- <h1 class="text-2xl font-bold text-center">Valid Missions</h1> --}}


  {{-- <div class="container">
    <h1>Valid Missions</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Reference</th>
          <th>Description</th>
          <th>Valid</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($missions as $mission)
          <tr>
            <td>{{ $mission->id }}</td>
            <td>{{ $mission->refmission }}</td>
            <td>{{ $mission->refdemande }}</td>
            <td>{{ $mission->datedebutmission ? 'نعم' : 'لا' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div> --}}
  <!-- Add your custom logic to display valid missions -->
  {{-- <ul>
    @foreach ($missions as $mission)
      <li>{{ $mission->refmission }}</li>
    @endforeach
  </ul> --}}

  {{-- @extends('layouts.app') <!-- Or your custom layout -->

  @section('content')
    <div class="container">
      <h1>Valid Missions</h1>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Reference</th>
            <th>Description</th>
            <th>Valid</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($missions as $mission)
            <tr>
              <td>{{ $mission->id }}</td>
              <td>{{ $mission->refmission }}</td>
              <td>{{ $mission->refdemande }}</td>
              <td>{{ $mission->datedebutmission ? 'نعم' : 'لا' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endsection --}}

</x-filament-panels::page>
