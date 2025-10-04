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
        <!-- Category Filter -->
        @php
            $categories = $merchandise->pluck('category')->unique()->sort();
        @endphp
        
        @if($categories->count() > 1)
        <div class="row mb-5">
            <div class="col-12">
                <div class="text-center">
                    <h5 class="mb-3">Filter Kategori</h5>
                    <div class="btn-group flex-wrap justify-content-center" role="group">
                        <button type="button" class="btn btn-outline-primary filter-btn active mx-1 mb-2" data-filter="all">
                            Semua Produk
                        </button>
                        @foreach($categories as $category)
                        <button type="button" class="btn btn-outline-primary filter-btn mx-1 mb-2" data-filter="{{ $category }}">
                            {{ $category }}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row g-4" id="products-container">
            @foreach($merchandise as $item)
            <div class="col-lg-4 col-md-6 wow fadeInUp product-item" data-wow-delay="0.{{ $loop->index }}s" data-category="{{ $item->category }}">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative overflow-hidden">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" class="card-img-top product-image" alt="{{ $item->name }}" style="height: 300px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                        <div class="product-overlay">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <button class="btn btn-primary btn-lg rounded-pill mx-1" onclick="quickView({{ $item->id }})">
                                    <i class="fas fa-eye"></i> Quick View
                                </button>
                                <a href="https://wa.me/628123456789?text=Halo, saya tertarik dengan {{ $item->name }}" 
                                   class="btn btn-success btn-lg rounded-pill mx-1" target="_blank">
                                    <i class="fab fa-whatsapp"></i> Order
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center p-4">
                        <div class="mb-2">
                            <span class="badge bg-info">{{ $item->category }}</span>
                        </div>
                        <h5 class="card-title mb-2">{{ $item->name }}</h5>
                        <p class="card-text text-muted mb-3" style="font-size: 0.9rem;">{{ Str::limit($item->description, 80) }}</p>
                        <div class="d-flex justify-content-center align-items-center">
                            <h4 class="text-primary mb-0 fw-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($merchandise->hasPages())
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    {{ $merchandise->links() }}
                </div>
            </div>
        @endif

        <!-- Info jika tidak ada produk -->
        @if($merchandise->count() == 0)
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="fas fa-box-open text-muted" style="font-size: 5rem;"></i>
                        <h4 class="text-muted mt-3">Belum Ada Produk</h4>
                        <p class="text-muted">Merchandise sedang dalam proses persiapan. Silakan kembali lagi nanti!</p>
                    </div>
                </div>
            </div>
        @endif
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
        display: flex;
        align-items: center;
        justify-content: center;
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

    .product-item {
        transition: all 0.3s ease;
    }

    .product-item.filtered-out {
        opacity: 0;
        transform: translateY(30px);
        pointer-events: none;
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
            opacity: 0;
            background: rgba(0,0,0,0.8);
        }
        
        .product-overlay.show {
            opacity: 1;
        }
        
        .product-overlay .btn {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
        
        .product-card {
            cursor: pointer;
            position: relative;
        }
    }
</style>

<!-- Custom JavaScript -->
<script>
    // Quick view modal
    function quickView(productId) {
        // Cari data produk dari halaman
        const productCards = document.querySelectorAll('.product-card');
        let productData = null;
        
        // Ambil data dari card yang diklik
        productCards.forEach(card => {
            const quickViewBtn = card.querySelector('[onclick*="' + productId + '"]');
            if (quickViewBtn) {
                const img = card.querySelector('.product-image');
                const name = card.querySelector('.card-title').textContent;
                const description = card.querySelector('.card-text').textContent;
                const price = card.querySelector('.text-primary').textContent;
                const category = card.querySelector('.badge').textContent;
                
                productData = {
                    id: productId,
                    image: img ? img.src : '',
                    name: name.trim(),
                    description: description.trim(),
                    price: price.trim(),
                    category: category.trim()
                };
            }
        });
        
        if (productData) {
            document.getElementById('modal-image').src = productData.image;
            document.getElementById('modal-name').textContent = productData.name;
            document.getElementById('modal-description').textContent = productData.description;
            document.getElementById('modal-price').textContent = productData.price;
            
            const orderBtn = document.getElementById('modal-order-btn');
            orderBtn.href = `https://wa.me/628123456789?text=Halo, saya tertarik dengan ${productData.name}`;
            
            const modal = new bootstrap.Modal(document.getElementById('quickViewModal'));
            modal.show();
        }
    }
    
    // Smooth scroll dan loading animation
    document.addEventListener('DOMContentLoaded', function() {
        // Add loading animation
        const cards = document.querySelectorAll('.product-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Mobile overlay functionality
        function isMobile() {
            return window.innerWidth <= 768;
        }

        // Handle mobile card taps
        if (isMobile()) {
            cards.forEach(card => {
                const overlay = card.querySelector('.product-overlay');
                let isOverlayVisible = false;
                
                card.addEventListener('click', function(e) {
                    // Jika click pada button, biarkan default behavior
                    if (e.target.closest('.btn')) {
                        return;
                    }
                    
                    e.preventDefault();
                    
                    // Hide all other overlays
                    cards.forEach(otherCard => {
                        if (otherCard !== card) {
                            const otherOverlay = otherCard.querySelector('.product-overlay');
                            otherOverlay.classList.remove('show');
                        }
                    });
                    
                    // Toggle current overlay
                    if (!isOverlayVisible) {
                        overlay.classList.add('show');
                        isOverlayVisible = true;
                    } else {
                        overlay.classList.remove('show');
                        isOverlayVisible = false;
                    }
                });
                
                // Reset overlay visibility when card is no longer visible
                card.addEventListener('touchend', function() {
                    setTimeout(() => {
                        if (!card.matches(':hover')) {
                            isOverlayVisible = overlay.classList.contains('show');
                        }
                    }, 100);
                });
            });
            
            // Hide overlay when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.product-card')) {
                    cards.forEach(card => {
                        const overlay = card.querySelector('.product-overlay');
                        overlay.classList.remove('show');
                    });
                }
            });
        }

        // Category filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        const productItems = document.querySelectorAll('.product-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Filter products
                productItems.forEach(item => {
                    const category = item.getAttribute('data-category');
                    
                    if (filter === 'all' || category === filter) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, 100);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(30px)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
                
                // Update product count
                setTimeout(() => {
                    const visibleProducts = document.querySelectorAll('.product-item[style*="block"]').length;
                    console.log(`Menampilkan ${visibleProducts} produk untuk kategori: ${filter}`);
                }, 400);
            });
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            // Reset overlays when switching between mobile and desktop
            cards.forEach(card => {
                const overlay = card.querySelector('.product-overlay');
                overlay.classList.remove('show');
            });
        });
    });
</script>

@endsection