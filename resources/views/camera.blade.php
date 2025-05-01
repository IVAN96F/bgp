<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Try On AR - {{ $product->name }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
  <style>
    html, body {
      margin: 0;
      height: 100%;
      background-color: #000;
      color: white;
    }

    .btn-back {
      position: absolute;
      top: 20px;
      left: 20px;
      z-index: 10;
      background-color: rgba(0, 0, 0, 0.5);
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 8px;
      text-decoration: none;
    }

    .btn-back:hover {
      background-color: rgba(0, 0, 0, 0.7);
    }

    model-viewer {
      width: 100vw;
      height: 100vh;
    }
  </style>
</head>
<body>

  <a href="{{ url()->previous() }}" class="btn-back">← Back</a>

  <model-viewer
  src="{{ asset('storage/' . $product->glb_file) }}"
  ar
  ar-modes="webxr scene-viewer quick-look"
  camera-controls
  auto-rotate
  autoplay
  ios-src="{{ asset('storage/' . $product->glb_file) }}"
  ar-scale="auto"
  ar-status="not-presenting"
  style="width: 100vw; height: 100vh;"
>
  <button slot="ar-button" class="btn btn-light position-absolute bottom-0 start-50 translate-middle-x mb-3">
    👓 Lihat di AR
  </button>
</model-viewer>




<script>
    document.querySelector('model-viewer').addEventListener('ar-status', (event) => {
      if (event.detail.status === 'failed') {
        alert('Perangkat atau browser kamu tidak mendukung AR markerless.');
      }
    });
  </script>
  
</body>
</html>
