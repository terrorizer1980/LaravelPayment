@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('dashboard.payments.make') }}</div>

                <div class="card-body">
                  <form action="#" method="post" id="paymentForm">
                      @csrf
                      <div class="row">
                        <div class="col-auto">
                          <label>@lang('dashboard.payments.amount'):</label>
                          <input type="number" name="amount" min="5" step="0.01" class="form-control" value="{{ mt_rand(500, 100000) / 100 }}" />
                        </div>
                        <div class="text-center mt-3">
                          <button id="btnPay"  class="btn btn-primary btn-lg" action="submit">@lang('dashboard.payments.pay')</button>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
