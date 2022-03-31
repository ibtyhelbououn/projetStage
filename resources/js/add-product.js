

function addProduct()
{
    var tbody = document.getElementById('tbody');

    var html = '<tr>'+   
    '<td> '+         
    '<div class="form-group">  ' +                
        '<select class="form-control" id="exampleFormControlSelect1">'+
          '  @foreach ($products as $product) '+
    '        <option value={{$product->price}}>{{$product->name}}</option>  ' +
    '        @endforeach   '  +             
    '    </select>'+
    '</div>'+
    '</td>'+
    '<td>'+
    '<input value='{{$product->price}}' type="number" name="price" class="form-control" id="price" placeholder="{{$product->price}}">'+
    '</td>'+
    '<td>'+
    '<input type="number" name="quantity" class="form-control" id="quantity" placeholder="0">'+
    '</td>'+
    '<td>'+
    '<input type="number" name="tax" class="form-control" id="tax" placeholder="0">'+
    '</td>'+
    '<td>'+
    '<input type="number" name="subTotal" class="form-control" id="subTotal" placeholder="0">'+
    '</td>'+
    '</tr>';

    tbody.appendChild(html);

}
