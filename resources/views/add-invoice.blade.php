<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/css/uikit.min.css" />
<link rel="stylesheet" href="bootstrap.min.css">

<script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit-icons.min.js"></script>

</head>

@auth
<body>
  <form method="post" action="{{url('/add-invoice')}}">
    {{ csrf_field() }}

 <div class="container">
 <h2> Add invoice</h2>
 <div class="form-group float-end">                   
  <select class="form-control " name="organizationID" id="organizationID">
      @foreach ($organizations as $organization) 
      <option value="{{$organization->id}}">{{$organization->name}}</option>   
      @endforeach                  
  </select>
</div>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Tax (%)</th>
      <th scope="col">Sub total</th>
      <th><button type="button" class="btn btn-success rounded-circle" id="addProduct">✚</button></th>
    </tr>
  </thead>
  <tbody id="tbody">
      <tr> 
          <td>1</td>   
          <td>              
                <div class="form-group">                   
                    <select class="form-control productID" name="productID[]" id="productID">
                        <option> select item</option>
                        @foreach ($products as $product) 
                        <option data-price="{{$product->price}}" data-tax="{{$product->tax}}" value={{$product->id}}>{{$product->name}}</option>   
                        @endforeach                
                    </select>
                  </div>
             
          </td>
          <td>
            <input value='{{$product->price}}' type="number" name="price[]" class="form-control" id="price">
          </td>
           
          <td>
            <input type="number" name="quantity" class="form-control" id="quantity">
          </td>
          <td>
            <input value="{{$product->tax}}" type="number" name="tax[]" class="form-control" id="tax">
          </td>
          <td>
            <input type="number" step="0.01" name="subTotal[]" class="form-control subTotal" id="subTotal" onchange="calcul()">
          </td>
          <td><button type="button" class="btn btn-danger rounded-circle " disabled>☓</button></td>
          <td><button class="uk-close-large" type="button" uk-close></button></td>      
      </tr>

      


  </tbody>

</table>

</div>

<button type="button" class="btn btn-primary btn-sm" id="calcul">Save changes</button>


<div class="col-md-2 float-end">
  <div class="card">
    <div class="card-header">
      <h4> Total (TND) <input type="number" step="0.01" name="total" class="form-control total" id="total"></h4>
    </div>
  </div>   
</div>
<br>
<br>
<br>
<div class="d-grid gap-2 col-6 mx-auto">
  <button class="btn btn-secondary" type="submit">save</button>
</div>

  </form>
</body>
@endauth

@guest

<body class="uk-background-muted">

<div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-position-center">
  <h3 class="uk-card-title">Access denied!</h3>
  <p>You do not have permission to access this page. <br>Please <a href="login">log in</a> and try again.</p>
</div>

</body>


@endguest


</html>

<script type="text/javascript" src="{{ URL::asset('js\jquery.min.js') }}"></script>


<script>
  // $(document).ready(function(){
  //   alert(1);
  // })
    $('#addProduct').on('click',function(){
      var product = $('productID').html();
      var num = ($('#tbody tr').length - 0) +1;
      var tr = '<tr><td>'+ num + '</td><td>'+             
                '<div class="form-group">'+                 
                    '<select class="form-control" name="productID[]" id="productID">'+ 
                    '@foreach ($products as $product) '+
                    '<option data-price="{{$product->price}}" data-tax="{{$product->tax}}" value={{$product->id}}>{{$product->name}}</option> '+  
                      '@endforeach '+ 
                    '</select>'+
                  '</div>'+
             
          '</td>'+
          '<td><input  type="number" value={{$product->id}} name="price[]" class="form-control" id="price" ></td>'+
          '<td><input type="number" name="quantity[]" class="form-control" id="quantity" ></td>'+
          '<td><input type="number" value="{{$product->tax}}" name="tax[]" class="form-control" id="tax" ></td>'+
          '<td><input type="number" step="0.01" name="subTotal[]" class="form-control subTotal" id="subTotal"></td>'+
          '<td><button type="button" class="btn btn-danger rounded-circle delete " >☓</button></td>'+   
        '</tr>';
        $('#tbody').append(tr);
    });

    $('#tbody').delegate('.delete','click',function(){
      $(this).parent().parent().remove();  

    });

    function total(){
      var total = 0;

      $('.subTotal').each(function(i,e){
        var amount = $(this).val() -0;
        total +=amount;
      });
           
      $('.total').val(total);
    }

    $('#tbody').delegate('#productID','change',function(){
      console.log('action')
      var tr = $(this).parent().parent().parent();
      var price = tr.find('#productID option:selected').attr('data-price');
      var tax = tr.find('#productID option:selected').attr('data-tax');

      tr.find('#price').val(price);
      tr.find('#tax').val(tax);
       
             
      var quantity = tr.find('#quantity').val()-0;
      var tax = tr.find('#tax').val()-0;
      var price = tr.find('#price').val()-0;
      var subTotal = (quantity*price) + ((quantity*price*tax)/100);

      tr.find('#subTotal').val(subTotal);
      

      total();
      

    });

    // $("#quantity").change(function(){
    //   var tr = $(this).parent().parent().parent();
    //   var price = tr.find('#productID option:selected').attr('data-price');
    //   var tax = tr.find('#productID option:selected').attr('data-tax');

    //   tr.find('#price').val(price);
    //   tr.find('#tax').val(tax);
      
        
    //   var quantity = tr.find('#quantity').val()-0;
    //   var tax = tr.find('#tax').val()-0;
    //   var price = tr.find('#price').val()-0;
    //   var subTotal = (quantity*price) + ((quantity*price*tax)/100);
    //   tr.find('#subTotal').val(subTotal);
      
    // });

    $('#tbody').delegate('#quantity','change',function(){
      var tr = $(this).parent().parent();
      // var html = '<td>test</td>';
      // tr.append(html)
 
            
      var quantity = tr.find('#quantity').val()-0;
      var tax = tr.find('#tax').val()-0;
      var price = tr.find('#price').val()-0;
      var subTotal = (quantity*price) + ((quantity*price*tax)/100);
      tr.find('#subTotal').val(subTotal);
      total();
    });

    $('#calcul').on('click',function(){

      var total = 0;

      $('#subTotal').each(function(i,e){
        var amount = $(this).val() -0;
        total +=amount;
      });
      alert(total);
      $('#total').val(total);


    })

    // document.querrySelector('#tbody').addEventListener('change',()=>{
    //   let total = 0;

    //   let trs = document.getElementsByClassName('s')
    // })



</script>

