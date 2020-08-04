@component('mail::message')

    @if($data['type'] == 'customer')

        # Hi {{$data['name']}},

        Your Order has been successfully placed with Order #{{$data['orderId']}}. You can check the details of the order in your dashboard.

        Enjoy the food!

        Thanks,
        {{ config('app.name') }}

    @else

        Hi {{$data['name']}},

        A new order has arrived with Order #{{$data['orderId']}}. Please check for the details in your dashboard.

        Serve well!

        Thanks,
        {{ config('app.name') }}

    @endif

@endcomponent
