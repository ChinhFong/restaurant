<form class="" action="invocies.store" method="post">
  {{csrf_field()}}
  <input type="hidden" name="invoice_id" value="{{ $inv }}">
  <div class="modal fade bs-example-modal-sm-checkout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
          <div class="input-group">
            <span class="input-group-addon">Invoice:</span>
            <input type="text" class="form-control" placeholder="">

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="check-out btn btn-success" name="button" disabled="true">Pay</button>
          <button type="button" class="btn btn-warning cancel" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</form>
