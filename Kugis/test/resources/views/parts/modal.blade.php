<div class="modal fade" id="ItemModalBox">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detaļas pievienošana</h4>
			</div>
			<div class="modal-body">

				<div class="form-group">
					<input class="form-control"
						type="text" 
						id="mdItemName"
						placeholder="Detaļas nosaukums" 
						maxlength="255">
				</div>

				<div class="form-group">
					<input class="form-control"
						type="text" 
						id="mdFindCategory"
						placeholder="Meklēt kategoriju" 
						onkeyup="fnFindCategoryTimer()" 
						maxlength="255">
				</div>

				<div class="list_box" id="mdCategoryList"></div>

				<div class="clearfix"></div>

			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-lg-8 text-left" id="mdAlertBox"></div>
					<div class="col-lg-4">
						<button type="button" class="btn btn-default" data-dismiss="modal">Aizvērt</button>
						<button type="button" class="btn btn-primary" onclick="fnAddItem(); return false">Saglabāt</button>
					</div>
				</div>


			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->