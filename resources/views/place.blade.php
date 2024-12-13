<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関西巡り</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/place.css') }}">

</head>

<body>
    <header id="header"></header>

    <nav>
        <ul id="ulSetection"></ul>
    </nav>

    <main style="background: linear-gradient(135deg, #4B8EC8 0%, #1B4B8F 100%); min-height: 100vh; padding-top: 80px;">
        <div class="container">
            <!-- ヘッダーセクション -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-white"
                    style="font-size: 3.5rem;
                        letter-spacing: 0.05em;
                        margin-bottom: 2rem;
                        background: linear-gradient(45deg, #ffffff, #e0e0e0);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);">
                    観光地の紹介
                </h1>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <aside class="filter-sidebar">
                        <div class="filter-content-wrapper">
                            <h3 class="filter-title">
                                <i class="bi bi-funnel-fill me-2"></i>
                                絞り込み検索
                            </h3>

                            <div class="filter-sections-container">
                                <!-- カテゴリーセクション -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        {{-- <h4>
                                            <i class="bi bi-grid me-2"></i>
                                            カテゴリー
                                        </h4> --}}
                                    </div>
                                    <div class="filter-content">
                                        <form action="{{ url('/Place') }}" method="GET">
                                            <!-- カテゴリーフィルター -->
                                            <div class="filter-section">
                                                <h4>カテゴリー</h4>
                                                @foreach($characteristics as $characteristic)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="characteristics[]" value="{{ $characteristic->characteristics }}"
                                                               id="characteristic_{{ $loop->index }}"
                                                               {{ in_array($characteristic->characteristics, request('characteristics', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="characteristic_{{ $loop->index }}">
                                                            {{ $characteristic->characteristics }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <!-- エリアフィルター -->
                                            <div class="filter-section">
                                                <h4>エリア</h4>
                                                @foreach($areas as $area)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="area[]" value="{{ $area->address }}"
                                                               id="area_{{ $loop->index }}"
                                                               {{ in_array($area->address, request('area', [])) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="area_{{ $loop->index }}">
                                                            {{ $area->address }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <button type="submit" class="search-btn">
                                                <i class="bi bi-search me-2"></i>検索する
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- Cards -->
                <div class="col-md-9">
                    <div class="row row-cols-1 row-cols-md-3 g-4" style="min-height: calc(100vh - 280px);">
                        @foreach ($places as $place)
                        <div class="col">
                            <div class="card h-100"
                                 data-category="{{ $place->characteristics }}"
                                 data-area="{{ $place->address }}">
                                <img src="{{ $place->im1}}"
                                     class="card-img-top"
                                     style="height: 200px; object-fit: cover; width: 100%;"
                                     alt="{{$place->placeName}}">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title" style="font-size: 1.2rem; margin-bottom: 0.75rem;">{{$place->placeName}}</h5>
                                    <p class="card-text">{{$place->shortDetail}}</p>
                                    <div class="d-flex gap-2 mt-auto">
                                        <a href="{{ route('place.detail', ['id' => $place->placeNumber]) }}" class="btn btn-outline-primary btn-sm" style="z-index: 1;">詳細</a>
                                        <button type="button"
                                                class="btn btn-primary btn-sm"
                                                style="z-index: 1;"
                                                onclick="addToCart({
                                                    id: '{{$place->placeNumber}}',
                                                    title: '{{$place->placeName}}',
                                                    description: '{{$place->shortDetail}}',
                                                    image_url: '{{ $place->image_url ?? 'https://prd-static.gltjp.com/glt/data/article/21000/20382/20230824_130026_34f0e5b2_w1920.webp' }}',
                                                    location: '{{$place->address}}',
                                                    category: '{{$place->characteristics}}',
                                                    type: 'place'
                                                })">
                                            <i class="bi bi-cart-plus"></i> カートに追加
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- ページネーション -->
                    <div class="pagination-container">
                        <div class="pagination-wrapper">
                            <div class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($places->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $places->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($places->getUrlRange(1, $places->lastPage()) as $page => $url)
                                    <li class="page-item {{ $places->currentPage() == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($places->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $places->nextPageUrl() }}">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </div>
                            <div class="total-count">
                                全{{ $places->total() }}件
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer"></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/place.js') }}"></script>
</body>

</html>
