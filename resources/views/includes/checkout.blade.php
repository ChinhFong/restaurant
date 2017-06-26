<form class="" action="/dashboard/invoices/{{$inv}}" method="post">
  {{method_field('PATCH')}}
  {{csrf_field()}}

  <input type="hidden" name="invoice_id" value="{{ $inv }}">
  <div class="modal fade bs-example-modal-sm-checkout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          @php
            $amount_inRiel = $invoice->amount*$er->value;
            $amount_inRiel = number_format($amount_inRiel,0,'.',',');
          @endphp
          <input type="hidden" id="e_rate" name="" value="{{$er->value}}">
          <div class="alert alert-info" role="alert"><p style="text-align:center;font-size:18px">Check Out</p></div>
          <div class="alert alert-danger error" role="alert" id="error">
          <div class="">
            <button type="button" class="close_error pull-right" name="button"><span aria-hidden="true">x</span></button>
          </div>
          <br/>
          <div class="">
            Cash recieve must be greater than payment info
          </div>
        </div>
        </div>
        <div class="modal-body">
          <div class="input-group">
            <span class="input-group-addon">Payment Info :</span>
            <input type="text" class="form-control" placeholder="" name="invoice_amount_dollar" id="invoice_amount_dollar" value="Dollar: ${{$invoice->amount}}" disabled="">
            <input type="text" class="form-control" placeholder="" name="invoice_amount_riel" id="invoice_amount_riel" value="Riels : {{$amount_inRiel}}" disabled="">
            <input type="hidden" name="d_amount" id="d_amount" value="{{$invoice->amount}}">
            <input type="hidden" name="r_amount" id="r_amount" value="{{$amount_inRiel}}">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Cash Receive:</span>
            <input type="number" class="form-control creceive" placeholder="" min="1" name="creceive">
          </div>
          <div class="input-group">
            <span class="input-group-addon">Cash Return :&nbsp;</span>
            <input type="text" class="form-control" placeholder="" name="return_amount_dollar" id="return_dollar" value="Dollar: $" disabled="">
            <input type="text" class="form-control" placeholder="" name="return_amount_riel" id="return_riel" value="Riels : " disabled="">
          </div>
          <br/>
          <div class="">
            <label><input type="radio" id="doll" name="payment_type" value="" checked="true"> Dollar </label>
            <label><input type="radio" id="riel" name="payment_type" value=""> Riels </label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="check-out btn btn-success btn_pay" name="button" disabled="true">Pay</button>
          <button type="button" class="btn btn-warning cancel cancel_checkout" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>
