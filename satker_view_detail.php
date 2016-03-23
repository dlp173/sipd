 <div class="modal fade" id="modal_form_detail" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Data Satker</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
  
        
<?php

 
            $i=1;
foreach ($info_by_id as $data) 
    
{
    echo $data->idsatker;
}
?> 
            No. Sakter : <br>
            Sakter : <br>
            Tanggal / No. Dipa : <br>
            PPK : <br>
            Bendahara :<br>
            
   
            
            
       </form>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  </div>