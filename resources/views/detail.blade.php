@extends('master')

@section('navbar-menu')

@auth

<li class="nav-item">
    <a class="nav-link" href="/profile">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#8F3F09" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href={{route('cart.index')}}>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#8F3F09" class="bi bi-cart-fill" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
    </a>
  </li>


@else
<li class="nav-item">
    <a class="nav-link" href="/login">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#8F3F09" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/login">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#8F3F09" class="bi bi-cart-fill" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
    </a>
  </li>

@endif
@endsection

@section('page-content')
<div class="container">
  <div class="row">
    <div class="col-4" id="book-detail-image">
      <img class="card-img-top" alt="Picture" src={{$bookdata['img']}}>
    </div>

    <div class="col">
      <div class="row">
        <div class="col" id="bookdetail-writer-name">
          <h4>{{$bookdata->author['name']}}</h4>
          <h1>{{$bookdata['title']}}</h1>
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#book-format" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Book Format</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#book-description" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Description</button>
            </div>
          </nav>
        </div>

        <div class="col">
          <div class="buy">
            
            <div class="card m-3" id="add-quantity-card" style="width: 20vw; height: 13vh">
            
              <form action={{ route('cartDetail.store')}} method="POST">
                @csrf
                <input type="hidden" name="book_id" value={{$bookdata['id']}}>
                <div class="row">
                  <div class="col">
                    <label>Quantity</label>
                  </div>
                  <div class="col">
                    <h6>Stock: {{$bookdata['stock']}}</h6>
                  </div>
                </div>

                <div class="row">
                  <input name="qty" type="number" placeholder="Enter quantity"><br>
                </div>
                
                <button class="button btn-primary" type="submit">Add to My Cart</button>
            
              </form>
            
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="book-format" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <h4>Avaible Format</h4>
              <div class="col">
                <div class="card" id="book-format-choice">
                  <h5>Hard Cover</h5>
                </div>
            </div>

            <div class="col">
              <div class="card" id="book-format-choice">
                <h5>E-book</h5>
              </div>
            </div>
            </div>

          </div>
          <div class="tab-pane fade" id="book-description" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
              <div class="col">
                <h5>{{$bookdata['description']}}</h5>
              </div>

              <div class="col-5">
                <div class="row">
                  <div class="col">
                    <h5>ISBN: </h5>
                  </div>
                  <div class="col">
                    <h5>{{$bookdata['ISBN']}}</h5>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col">
                    <h5>Publisher: </h5>
                  </div>
                  <div class="col">
                    <h5><h5>{{$bookdata->publisher['name']}}</h5></h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5>Year: </h5>
                  </div>
                  <div class="col">
                    <h5><h5>{{$bookdata['year']}}</h5></h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5>Language: </h5>
                  </div>
                  <div class="col">
                    <h5><h5>{{$bookdata['language']}}</h5></h5>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5>Page: </h5>
                  </div>
                  <div class="col">
                    <h5><h5>{{$bookdata['page']}}</h5></h5>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- More Recomendation -->
  <div class="more-recommendation">
    <div class="home-title d-flex">
        <h2 class="fw-bold fs-1 mt-3">More Books Like This</h2>
    </div>  

    <div class="d-flex">
    @foreach($bookRec as $data)
      <div class="card" style="width: 18rem;">
        <a href="/books/{{$data['id']}}" class="text-decoration-none text-black">
          <img src="{{$data['img']}}" class="card-img-top" alt="Picture">
            <div class="card-body">
              <h5 class="card-title">{{$data['title']}}</h5>
              <p class="card-text fs-5">Rp. {{$data['price']}}</p>
            </div>
        </a>
      </div>
    @endforeach
  </div>
</div>

  </div>
</div>

<style>
  .container{
    margin-top: 5vh;
    color: #8F3F09;
  }
  #bookdetail-writer-name h1{
    font-size: 64px;
    margin-bottom: 4vh;
  }
  #bookdetail-writer-name h4{
    margin-top: 3vh;
    font-size: 35px;
    margin-bottom: 3vh;
    color: #C9C9C9;
  }

  #add-quantity-card{
    padding-left: 5vh;
    padding-right: 5vh;
    padding-top: 1vh;
    padding-bottom: 1vh;
  }
  #nav-tab{
    color: #8F3F09;
  }
  .nav-link{
    color: #8F3F09;
  }
  #nav-tabContent{
    margin-top: 5vh;
  }
  #book-format-choice{
    border-color: #8F3F09;
    border-radius: 20px;
    width: 15rem;
    padding: 3vh;
    align-items: center;
  }
</style>

@endsection

