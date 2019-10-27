<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
-->

<!-- Remove Modal Category-->
<div class="modal fade" id="removeModalCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Delete! Are You Sure?
        <form id="removeForm" method="post">
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-js-type="modal-submit-cat">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal Category-->
<div class="modal fade" id="editModalCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post">
            <div class="form-group">
                <label for="Categ">Cate Name</label>
                <input type="text" class="form-control" name="cate" data-js-type="editedTextCat">
            </div>

         </form>
      </div>
      <div class="modal-footer">
        <form id="editFormCat">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">OK</button>
        </form>
        <!-- -->
      </div>
    </div>
  </div>
</div>


<!-- Remove Modal Agent-->
<div class="modal fade" id="removeModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               Delete! Are You Sure?
              <form id="removeForm" method="post">
               </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-js-type="modal-submit-agent">OK</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Modal Agent-->
<div class="modal fade" id="editModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form method="post">
                  <div class="form-group">
                      <label for="editedText">New Name</label>
                      <input type="text" class="form-control" name="editedText" data-js-type="editedTextAgent">
                  </div>
               </form>
            </div>
            <div class="modal-footer">
              <form id="editFormAgent">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">OK</button>
              </form>
              <!-- -->
            </div>
          </div>
        </div>
      </div>





<!-- Remove Modal Contract-->
<div class="modal fade" id="removeModalContract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               Delete! Are You Sure?
              <form id="removeForm" method="post">
               </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-js-type="modal-submit-contract">OK</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Modal Contract-->
<div class="modal fade" id="editModalContract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" >
                    <div class="form-group">
                        <label for="contractName">Contract Name</label>
                        <input type="text" class="form-control" name="contractName" data-js-type="contractName">
                    </div>
                    <div class="form-group">
                            <label for="contractStartDate">Contract Start Date</label>
                            <input type="text" class="form-control" name="contractStartDate" data-js-type="contractStartDate">
                    </div>
                    <div class="form-group">
                            <label for="contractEndDate">Contract End Date</label>
                            <input type="text" class="form-control" name="contractEndDate" data-js-type="contractEndDate">
                    </div>
                    <div class="form-group">
                            <label for="contractStatus">Contract Status</label>
                            <input type="text" class="form-control" name="contractStatus" data-js-type="contractStatus">
                        </div>
                        <div class="form-group">
                            <label for="contractDescription">Contract Description</label>
                            <input type="text" class="form-control" name="contractDescription" data-js-type="contractDescription">
                        </div>
                 </form>
            </div>
            <div class="modal-footer">
              <form id="editFormContract">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">OK</button>
              </form>
              <!-- -->
            </div>
          </div>
        </div>
      </div>
