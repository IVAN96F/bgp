@extends('layouts.productLayout')

@section('title', 'Category')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-bottom: 5rem;">
        @foreach($products as $product)
        <div class="col-lg-3 col-sm-6 col-md-4">
            <div class="card card-cat mb-5">
                <img src="{{ asset('img/chair2.jpg') }}" class="card-img-top" style="height: 15rem;" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $product->name }}</strong></h5>
                    <p class="card-text" style="color: red;">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
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
    </div>
</div>
<script>
    document.querySelectorAll(".card-cat").forEach(card => {
        let img = card.querySelector(".preview-img");
        let model = card.querySelector(".model-3d");

        card.addEventListener("mouseenter", () => {
            img.classList.add("hidden"); // Mulai efek transparan
            setTimeout(() => {
                img.style.display = "none"; // Sembunyikan setelah transisi selesai
                model.style.display = "block";
                setTimeout(() => model.classList.remove("hidden"), 10); // Tampilkan dengan efek
            }, 500); // Sesuaikan dengan durasi transisi
        });

        card.addEventListener("mouseleave", () => {
            model.classList.add("hidden");
            setTimeout(() => {
                model.style.display = "none";
                img.style.display = "block";
                setTimeout(() => img.classList.remove("hidden"), 10);
            }, 500);
        });
    });

</script>
@endsection