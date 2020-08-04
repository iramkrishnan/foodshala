@component('mail::message')

    @if($data->type == 'customer')

        # Hi {{$data['name']}},

        Welcome to FoodShala!

        Here's the details we got from you, for your reference:

        Name: {{$data['name']}}
        Email: {{$data['email']}}
        Phone: {{$data['phone']}}
        Address: {{$data['address']}}
        Diet Type: {{$data['diet_type']}}
        Enjoy the food!

        Thanks,<br>
        {{ config('app.name') }}

    @else

        Hi {{$data['name']}},

        Welcome to FoodShala!

        Here's the details we got from you, for your reference:

        Name: {{$data['name']}}
        Email: {{$data['email']}}
        Phone: {{$data['phone']}}
        Address: {{$data['address']}}
        Cuisine Type: {{$data['cuisine']}}

        Serve well!

        Thanks,<br>
        {{ config('app.name') }}

    @endif

@endcomponent
