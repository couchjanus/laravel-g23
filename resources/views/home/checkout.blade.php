<x-web-layout>

<div class="leading-loose">
    @if($errors->count() > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('order.place') }}">
        @csrf
      <p class="text-gray-800 font-medium">Customer information</p>
      <div class="">
        <label class="block text-sm text-gray-00" for="customer_name">Name</label>
        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="customer_name" name="customer_name" type="text" value="{{ \Auth::user()->name }}" aria-label="Name">
        @error('customer_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mt-2">
        <label class="block text-sm text-gray-600" for="customer_email">Email</label>
        <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="customer_email" name="customer_email" type="email" value="{{ \Auth::user()->email }}" aria-label="Email">

        @if($errors->has('customer_email'))
            <div class="invalid-feedback">
                {{ $errors->first('customer_email') }}
            </div>
        @endif
      </div>
      <div class="mt-2">
        <label class=" block text-sm text-gray-600" for="street">Address</label>
        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="street" name="street" type="text" placeholder="Street" aria-label="Email">
      </div>
      <div class="mt-2">
        <label class="hidden text-sm block text-gray-600" for="city">City</label>
        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="city" name="city" type="text" placeholder="City" aria-label="Email">
      </div>
      <div class="inline-block mt-2 w-1/2 pr-1">
        <label class="hidden block text-sm text-gray-600" for="customer_phone">Phone</label>
        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="customer_phone" name="customer_phone" type="text" placeholder="Phone number" aria-label="Phone">
      </div>
      <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
        <label class="hidden block text-sm text-gray-600" for="postcode">Postcode</label>
        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="postcode"  name="postcode" type="text"  placeholder="postcode" aria-label="postcode">
      </div>
      <p class="mt-4 text-gray-800 font-medium">Payment information</p>
      <div class="">
        <label class="block text-sm text-gray-600" for="cus_card">Card</label>
        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_card" name="cus_card" type="text" placeholder="Card Number MM/YY CVC" aria-label="Name">
      </div>
      <div class="mt-4">
        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Place Order</button>
      </div>
    </form>
  </div>
</x-web-layout>
