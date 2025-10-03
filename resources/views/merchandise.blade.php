@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="container-xxl py-5 bg-light">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Merchandise</h6>
            <h1 class="display-6 mb-4">Koleksi Resmi Future Football Educare</h1>
            <p>Dapatkan merchandise berkualitas tinggi dengan desain eksklusif Future Football Educare. Tampil percaya diri dengan produk resmi kami!</p>
        </div>
    </div>
</div>



<!-- Products Section -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($merchandise as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index }}s">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset($item['image']) }}" class="card-img-top product-image" alt="{{ $item['name'] }}" style="height: 300px; object-fit: cover;">
                        <div class="product-overlay">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <button class="btn btn-primary btn-lg rounded-pill mx-1" onclick="quickView({{ json_encode($item) }})">
                                    <i class="fas fa-eye"></i> Quick View
                                </button>
                                <a href="https://wa.me/628123456789?text=Halo, saya tertarik dengan {{ $item['name'] }}" 
                                   class="btn btn-success btn-lg rounded-pill mx-1" target="_blank">
                                    <i class="fab fa-whatsapp"></i> Order
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center p-4">
                        <h5 class="card-title mb-2">{{ $item['name'] }}</h5>
                        <p class="card-text text-muted mb-3" style="font-size: 0.9rem;">{{ Str::limit($item['description'], 80) }}</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <h4 class="text-primary mb-0 fw-bold">Rp {{ number_format($item['price'], 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="quickViewModalLabel">Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img id="modal-image" src="" class="img-fluid w-100" alt="" style="height: 400px; object-fit: cover;">
                    </div>
                    <div class="col-md-6 p-4">
                        <h3 id="modal-name" class="mb-3"></h3>
                        <p id="modal-description" class="text-muted mb-4"></p>
                        <h4 id="modal-price" class="text-primary fw-bold mb-4"></h4>
                        <div class="d-grid gap-2">
                            <a id="modal-order-btn" href="#" class="btn btn-success btn-lg" target="_blank">
                                <i class="fab fa-whatsapp me-2"></i>Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .product-card {
        transition: all 0.3s ease;
        border-radius: 15px;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }

    .product-image {
        transition: transform 0.3s ease;
        border-radius: 15px 15px 0 0;
    }

    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.7);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 15px 15px 0 0;
    }

    .product-card:hover .product-overlay {
        opacity: 1;
    }

    .product-card:hover .product-image {
        transform: scale(1.05);
    }

    .filter-btn.active {
        background-color: var(--mfp-blue, #0033a0);
        color: white;
        border-color: var(--mfp-blue, #0033a0);
    }

    .filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .modal-content {
        border-radius: 15px;
        overflow: hidden;
    }

    .btn-lg {
        padding: 12px 30px;
        border-radius: 25px;
    }

    .badge {
        font-size: 0.8rem;
        padding: 8px 12px;
        border-radius: 20px;
    }

    @media (max-width: 768px) {
        .product-overlay {
            opacity: 1;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        }
        
        .product-overlay .btn {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }
</style>

<!-- Custom JavaScript -->
<script>
    // Quick view modal
    function quickView(product) {
        document.getElementById('modal-image').src = "{{ asset('') }}" + product.image;
        document.getElementById('modal-name').textContent = product.name;
        document.getElementById('modal-description').textContent = product.description;
        document.getElementById('modal-price').textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(product.price);
        
        const orderBtn = document.getElementById('modal-order-btn');
        orderBtn.href = `https://wa.me/628123456789?text=Halo, saya tertarik dengan ${product.name}`;
        
        const modal = new bootstrap.Modal(document.getElementById('quickViewModal'));
        modal.show();
    }
</script>

@endsection