<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
 <div class="container">
 <h2> INVOICE N° </h2>  

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Tax</th>
      <th scope="col">Sub total</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <form>
          <td>              
                <div class="form-group">                   
                    <select class="form-control" id="exampleFormControlSelect1">
                        @foreach ($products as $product) 
                        <option>{{$product->name}}</option>   
                        @endforeach                  
                    </select>
                  </div>
             
          </td>
          <td>
            <input type="number" name="price" class="form-control" id="price" placeholder="0">
          </td>
          <td>
            <input type="number" name="price" class="form-control" id="price" placeholder="0">
          </td>
        </form>
      </tr>

  </tbody>

</table>
</div>

</body>


</html>