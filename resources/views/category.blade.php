@extends('layouts.productLayout')

@section('title', 'Category')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-bottom: 5rem;">
        <div class="col-lg-3 col-sm-6 col-md-4">
            <div class="card card-cat mb-5">
                <img src="{{ asset('img/chair2.jpg') }}" class="card-img-top preview-img" style="height: 15rem;" alt="...">
                <model-viewer 
                    src="{{ asset('assets/chair.glb') }}" 
                    class="card-img-top model-3d" 
                    style="height: 15rem; display: none;" 
                    auto-rotate 
                    camera-controls 
                    alt="3D Model">
                </model-viewer>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-4">
            <div class="card card-cat mb-5">
                <img src="{{ asset('img/chair2.jpg') }}" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-4">
            <div class="card card-cat mb-5">
                <img src="{{ asset('img/chair2.jpg') }}" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-4">
            <div class="card card-cat mb-5">
                <img src="{{ asset('img/chair2.jpg') }}" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll(".card-cat").forEach(card => {
        let img = card.querySelector(".preview-img");
        let model = card.querySelector(".model-3d");
        card.addEventListener("mouseenter", () => {
            img.style.display = "none";
            model.style.display = "block";
        });
        card.addEventListener("mouseleave", () => {
            img.style.display = "block";
            model.style.display = "none";
        });
    });
</script>
@endsection