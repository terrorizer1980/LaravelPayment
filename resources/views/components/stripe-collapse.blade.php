<label class="mt-3" for="card-element">
    Card details:
</label>

<div id="cardElement">
    
</div>

<small class="form-text text-muted" id="cardErrors" role="alert"></small>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe(`${{{ config('services.stripe.key') }}}`);
    
    const elements = stripe.elements({ locale: 'en' });
    
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
        },
    };
    
    const cardElement = elements.create('card', {style});
    
    cardElement.mount('#cardElement');
</script>
@endpush