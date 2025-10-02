@extends('layouts.app')

@section('content')
<div id="kontak" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Kontak Kami</h6>
            <h1 class="display-6 mb-4">Hubungi Future Football Educare</h1>
            <p>Silakan hubungi kami untuk informasi pendaftaran, kerjasama, atau pertanyaan lainnya.</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <form action="{{ url('/contact') }}" method="post" class="bg-light rounded p-4">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Anda" value="{{ old('email') }}" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <input type="text" name="subjek" class="form-control @error('subjek') is-invalid @enderror" placeholder="Subjek" value="{{ old('subjek') }}" required>
                            @error('subjek')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" rows="5" placeholder="Pesan" required>{{ old('pesan') }}</textarea>
                            @error('pesan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 text-end">
                            <button class="btn btn-danger rounded-pill py-2 px-4" type="submit">Kirim Pesan</button>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    @endif
                </form>
            </div>
            <div class="col-lg-12 mt-5 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white rounded p-2 h-100 text-center">
                    <h5 class="mb-3 text-primary">Lokasi Kami</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5209.1547955045025!2d110.41775431165587!3d-7.769393392217625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b9b6f6c75b%3A0xb0fad1f3eaec3439!2sMaguwoharjo%20Football%20Park!5e1!3m2!1sid!2sid!4v1748438359336!5m2!1sid!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
