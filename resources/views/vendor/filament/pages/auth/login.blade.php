@extends('filament::layouts.auth')

@section('content')
  <div class="flex items-center justify-center min-h-screen bg-[#1E293B]">
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
      <h2 class="text-2xl font-bold text-center text-[#FF5733]">تسجيل  -- الدخول</h2>

      {{ $this->form }}

      <button class="w-full mt-4 bg-[#FF5733] text-white py-2 rounded-lg hover:bg-[#D84315]">
        دخول
      </button>
    </div>
  </div>
@endsection
