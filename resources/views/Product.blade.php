<!DOCTYPE html>

<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Produk</title>
{{-- Bootstrap CDN --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
<div class="row justify-content-center mt-5">
<div class="col-md-10">
<h2 class="mb-4">Daftar Produk</h2>

        {{-- Menampilkan pesan sukses dari redirect (jika ada) --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            {{-- Diarahkan ke rute 'product.create' (Form Tambah) --}}
            <a href="{{ route('product.create') }}" class="btn btn-success">
                Tambah Produk Baru
            </a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->created_at->format('d M Y') }}</td> {{-- Menampilkan data Tanggal Dibuat --}}
                            <td>
                                {{-- Tombol Edit: Diarahkan ke form edit produk --}}
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="btn btn-sm btn-primary me-2">Edit</a>
                                
                                {{-- Form Hapus --}}
                                <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                    style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data produk.</td> {{-- Diperbarui menjadi 5 kolom --}}
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>