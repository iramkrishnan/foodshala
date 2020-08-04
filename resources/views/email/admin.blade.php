@component('mail::message')
# Hi Admin,

@if($data['feedback'])
You received a new feedback from {{$data['email']}}

# Feedback:
{{$data['feedback']}}

@elseif($data->type == 'customer')
    New Customer has Registered on FoodShala
    Customer Name: {{$data['name']}}
    Customer Email: {{$data['email']}}
    Customer Phone: {{$data['phone']}}
    Customer Address: {{$data['address']}}
    Customer Diet Type: {{$data['diet_type']}}

@elseif($data->type == 'restaurant')
    New Restaurant has Registered on FoodShala
    Restaurant Name: {{$data['name']}}
    Restaurant Email: {{$data['email']}}
    Restaurant Phone: {{$data['phone']}}
    Restaurant Address: {{$data['address']}}
    Restaurant Cuisine Type: {{$data['cuisine']}}

@endif



Thanks,<br>
{{ config('app.name') }}
@endcomponent
