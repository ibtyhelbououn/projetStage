<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="bootstrap.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit-icons.min.js"></script>
    </head>

<body>

  <h1 class="uk-heading-bullet uk-text-bolder">Add product here!</h1>

  <div class="uk-container-small uk-align-center">
<form class="uk-form-stacked" method="post" action="{{url('/add-product')}}">

  {{ csrf_field() }}


  <div class="uk-margin">
    <label for="name" class="uk-form-label">Product name</label>
    <div class="uk-form-controls">
      <input type="text" name="name" class="uk-input" id="name" placeholder="xxx">
    </div>
  </div>
  <div class="uk-margin">
    <label for="description" class="uk-form-label">Description</label>
    <div class="uk-form-controls">
      <input type="text" name="description" class="uk-input" id="description" placeholder="xxx">
    </div>
  </div>
  <div class="uk-margin">
    <label class="uk-form-label" for="category">Category</label>
    <div class="uk-form-controls">
    <select name="categoryID" class="uk-select" id="Category">

        @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    </div>
  </div>
  <div class="uk-margin">
    <label for="price" class="uk-form-label">Price (TND)</label>
    <div class="uk-form-controls">
      <input type="number" step="0.01" name="price" class="uk-input" id="price" placeholder="xxx">
    </div>
  </div>
  <div class="uk-margin">
    <label for="tax" class="uk-form-label">tax (%)</label>
    <div class="uk-form-controls">
      <input type="number" step="0.01" name="tax" class="uk-input" id="tax" placeholder="xxx">
    </div>
  </div>

  <div class="uk-button-group uk-float-right">
    <a class="uk-button uk-button-default" href="products">cancel</a>
  &nbsp 
  <button type="submit" class="uk-button uk-button-secondary"  onclick="UIkit.notification({message: 'Product added successfully'})">add</button>
  </div>



</form>

</div>


</body>

</html>


