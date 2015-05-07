<div class="modal fade" id="approve-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Setuju terhadap Pembayaran</h4>
      </div>
      <div class="modal-body">
        <p>Ketika Anda menyetujui <b>Pembayaran no {{ $payment_id }}</b> berarti Anda telah memastikan bahwa donasi yang dilakukan oleh donatur telah terkirim di rekening BagiKasih.</p>
        <p>Proses ini hanya dapat dilakukan sekali, dan tidak dapat dikembalikan ke status semula.</p>
        <p>Proses ini akan diikuti dengan pemgiriman email ke donatur.</p>
      </div>
      <div class="modal-footer">
        <form method="post" action="{{ route('admin.payment.approve', $payment->id) }}">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Setujui</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Batalkan Pembayaran</h4>
      </div>
      <div class="modal-body">
        <p>Ketika Anda membatalkan <b>Pembayaran no {{ $payment_id }}</b> berarti Anda telah meminta donatur untuk melakukan konfirmasi pembayaran ulang.</p>
        <p>Proses ini hanya dapat dilakukan sekali, dan tidak dapat dikembalikan ke status semula.</p>
        <p>Proses ini akan diikuti dengan pemgiriman email ke donatur.</p>
      </div>
      <div class="modal-footer">
        <form method="post" action="{{ route('admin.payment.delete', $payment->id) }}">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-danger">Batalkan</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
