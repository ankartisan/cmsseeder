<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php $lastmod = "2018-02-22T13:36:28+00:00" @endphp
    {{--EN--}}
    @foreach ($companies as $company)
        <url>
            <loc>https://feelena.com/en/{{ $company->slug_locale }}</loc>
            <lastmod>{{ $company->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($products as $product)
        <url>
            <loc>https://feelena.com/en/{{ $product->company->slug_locale }}/{{ $product->slug_locale }}</loc>
            <lastmod>{{ $product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($categories as $category)
        @if($category->parent)
            <url>
                <loc>https://feelena.com/en/c/{{ $category->parent->slug_locale }}/{{ $category->slug_locale }}</loc>
                <lastmod>{{ $lastmod }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @else
            <url>
                <loc>https://feelena.com/en/c/{{ $category->slug_locale }}</loc>
                <lastmod>{{ $lastmod }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endif
    @endforeach
    @foreach ($ingredients as $ingredient)
        <url>
            <loc>https://feelena.com/en/ingredients/{{ $ingredient->slug_locale }}</loc>
            <lastmod>{{ $lastmod }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.2</priority>
        </url>
    @endforeach
    @foreach ($posts as $post)
        <url>
            <loc>https://feelena.com/en/{{ $post->url_prefix }}/{{ $post->slug_locale }}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.2</priority>
        </url>
    @endforeach
    {{--RS--}}
    @php \Illuminate\Support\Facades\App::setLocale('rs'); @endphp
    @foreach ($companies as $company)
        <url>
            <loc>https://feelena.com/rs/{{ $company->slug_locale }}</loc>
            <lastmod>{{ $company->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($products as $product)
        <url>
            <loc>https://feelena.com/rs/{{ $product->company->slug_locale }}/{{ $product->slug_locale }}</loc>
            <lastmod>{{ $product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
    @foreach ($categories as $category)
        @if($category->parent)
            <url>
                <loc>https://feelena.com/rs/c/{{ $category->parent->slug_locale }}/{{ $category->slug_locale }}</loc>
                <lastmod>{{ $lastmod }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @else
            <url>
                <loc>https://feelena.com/rs/c/{{ $category->slug_locale }}</loc>
                <lastmod>{{ $lastmod }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.6</priority>
            </url>
        @endif
    @endforeach
    @foreach ($ingredients as $ingredient)
        <url>
            <loc>https://feelena.com/rs/ingredients/{{ $ingredient->slug_locale }}</loc>
            <lastmod>{{ $lastmod }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.2</priority>
        </url>
    @endforeach
    @foreach ($posts as $post)
        <url>
            <loc>https://feelena.com/rs/{{ $post->url_prefix }}/{{ $post->slug_locale }}</loc>
            <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.5</priority>
        </url>
    @endforeach
</urlset>

