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

  <div class="uk-position-top-right">  
  <a href="#offcanvas-usage" class="uk-icon-link uk-margin-small-right" uk-icon="icon:  list; ratio: 2" uk-toggle="target: #offcanvas-push " ></a>
  </div>

  <h1 class="uk-heading-bullet uk-text-bolder ">Categories</h1>
  {{-- <hr class="uk-divider-icon"> --}}



<div class="uk-container">
<table class="uk-table uk-table-divider uk-table-hover uk-table-middle ">
  <thead>
      <tr>
        <th >ID</th>
        <th>Name</th>
        <th>Date of creation</th>
        <th>Last update</th>
        <th >
          <ul class="uk-iconnav uk-float-right">
          <li><a href="/add-category" uk-icon="icon: plus">&#160 &#160 </a></li>
          </ul>
        </th>
      </tr>
  </thead>
  <tbody>
    @foreach($categories as $category)
  <tr>
    <td class="uk-text-muted" > {{$category->id}} </th>
    <td>{{$category->name}}</td>
    <td>{{$category->created_at}} ({{$category->created_at->diffForHumans()}})</td>
    <td>{{$category->updated_at}} ({{$category->updated_at->diffForHumans()}})</td>
    <td >
      <div>
      <div class="uk-button-group uk-float-right">

        <form method="get" action="{{url('/edit-category/'.$category->id)}}">
          <button type="submit" class="uk-button uk-button-success" >Edit</button>
        </form>

      &nbsp 
  
        <form method="post" action="{{url('/delete-category/'.$category->id)}}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="uk-button uk-button-danger"  onclick="UIkit.notification({message: 'Product deleted!'})">Delete</button>
        </form>
      <div>
      </div>
    </td>
  </tr>
      @endforeach
</tbody>
</table>
</div>



<div id="offcanvas-push" uk-offcanvas="overlay: true; mode: push; flip: true ">
  <div class="uk-offcanvas-bar">

    <button class="uk-offcanvas-close" type="button" uk-close></button>

    <ul class="uk-nav uk-nav-default">

        <li class="uk-nav-header">Menu</li>
        <li><a href="categories"><span class="uk-margin-small-right" uk-icon="icon: tag"></span> <span class="uk-text-bold uk-text-italic">Categories </span> </a></li>
        <li><a href="products"><span class="uk-margin-small-right" uk-icon="icon: bag"></span> Products </a></li>
        <li><a href="organizations"><span class="uk-margin-small-right" uk-icon="icon: world"></span> Organizations</a></li>
        <li><a href="invoices"><span class="uk-margin-small-right" uk-icon="icon: database"></span> Invoices</a></li>
        <li class="uk-nav-divider"></li>
        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: sign-out"></span> logout</a></li>
    </ul>

</div>



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