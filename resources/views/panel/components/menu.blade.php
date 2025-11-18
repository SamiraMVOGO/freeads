@php
use Illuminate\Support\Facades\Auth;
use App\Models\User;
$id = Auth::id();
$user = User::findOrFail($id);
@endphp
<div class="bg-white p-6  h-auto ">
  <div class="flex  justify-end">
    <div class="text-lg">
      <span class="font-bold">Welcome {{ $user->login }} </span>
    </div>
  </div>
</div>