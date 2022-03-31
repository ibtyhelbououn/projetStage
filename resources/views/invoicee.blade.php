

	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	      <h6 class="m-0 font-weight-bold text-primary"> Sales Inoice Details </h6>
	    </div>
	    
	    <div class="card-body">
	    	<div class="row clearfix justify-content-md-center">
	    		<div class="col-md-6">
	    			<div class="no_padding no_margin"> <strong>Customer:</strong> </div>
	    			<div class="no_padding no_margin"><strong>Email:</strong> </div>
	    			<div class="no_padding no_margin"><strong>Phone:</strong></div>
	    		</div>
	    		<div class="col-md-3"></div>
	    		<div class="col-md-3">
	    			<div class="no_padding no_margin"><strong>Date:</strong>  </div>
	    			<div class="no_padding no_margin"><strong>Challen No:</strong>  </div>
	    		</div>
	    	</div>
	    	<div class="invoice_items">
	    		<table class="table table-borderless ">
	    			<thead>
	    				<th>SL</th>
	    				<th>Product</th>
	    				<th>Price</th>
	    				<th>Qty</th>
	    				<th>Total</th>
	    				<th class="text-right">-</th>
	    			</thead>
	    			<tbody>
	    	
		    				<tr>
		    					<td>  </td>
		    					<td>  </td>

		    					<td class="text-right">
		    						<form 
		    							method="POST" 

		    						>
					              		@csrf
					              		@method('DELETE')
					              		<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
					              			<i class="fa fa-trash"></i>  
					              		</button>	
					              	</form>
		    					</td>
		    				</tr>
	    		
	    			</tbody>
	    			<tfoot>
	    				<th></th>
	    				<th> 
	    					<button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#newProduct">
	    						<i class="fa fa-plus "></i> Add Product 
	    					</button> 
	    				</th>
	    				<th colspan="2" class="text-right"> Total: </th>
	    				<th>  </th>
	    				<th></th>
	    			</tfoot>
	    		</table>
	    	</div>
	    </div>

	</div>



	{{-- Modal For Add new Product --}}
	<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">

		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="newProductModalLabel"> New Sale Invoice </h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      	<div class="modal-body">	
					  
					<div class="form-group row">
					    <label for="product" class="col-sm-3 col-form-label text-right">Product <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					    
					    </div>
					</div>

					<div class="form-group row">
					    <label for="price" class="col-sm-3 col-form-label  text-right">Unite Price <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      
					    </div>
					</div>

					<div class="form-group row">
					    <label for="quantity" class="col-sm-3 col-form-label  text-right">Quantity <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      
					    </div>
					</div>

					<div class="form-group row">
					    <label for="total" class="col-sm-3 col-form-label  text-right">Total <span class="text-danger">*</span> </label>
					    <div class="col-sm-9">
					      
					    </div>
					</div>
					  
		    	</div>

		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        	<button type="submit" class="btn btn-primary">Submit</button>	
		      	</div>

		    </div>

		 </div>
	</div>

