<?php

declare(strict_types=1);

$posts = array_merge(
    require __DIR__ . '/posts-1.php',
    require __DIR__ . '/posts-2.php'
);

$bySlug = [];
foreach ($posts as $post) {
    $slug = $post['slug'];
    if (isset($bySlug[$slug]) || !preg_match('/^[a-z0-9-]+$/', $slug)) {
        fwrite(STDERR, "Bad or duplicate slug: {$slug}\n");
        exit(1);
    }
    $bySlug[$slug] = $post;
}

if (count($posts) < 50) {
    fwrite(STDERR, 'Need at least 50 posts, found ' . count($posts) . "\n");
    exit(1);
}

foreach ($posts as $post) {
    foreach ($post['related'] as $related) {
        if (!isset($bySlug[$related])) {
            fwrite(STDERR, "{$post['slug']} related missing: {$related}\n");
            exit(1);
        }
    }
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function nav(): string
{
    return <<<'HTML'
<nav id="navbar">
  <a href="../index.html" class="nav-logo">Code<span>Craft</span> Technologies</a>
  <ul class="nav-links">
    <li><a href="../index.html">Home</a></li>
    <li class="has-sub">
      <a href="../services.html">Services <span class="caret" aria-hidden="true"></span></a>
      <ul class="submenu submenu-wide">
        <li><a href="../services.html#websites">Websites and stores<small>From GH₵2,000</small></a></li>
        <li><a href="../enterprise.html">Enterprise<small>From GH₵25,000</small></a></li>
        <li><a href="../services.html#software">Custom software<small>From GH₵5,200</small></a></li>
        <li><a href="../services.html#ai">AI<small>Quoted from the brief</small></a></li>
        <li><a href="../calculator.html">Price calculator<small>Build a starting figure</small></a></li>
      </ul>
    </li>
    <li><a href="../portfolio.html">Portfolio</a></li>
    <li class="has-sub">
      <a href="../resources.html" class="active">Resources <span class="caret" aria-hidden="true"></span></a>
      <ul class="submenu">
        <li><a href="index.html">Blog</a></li>
        <li><a href="../resources.html?tab=faq">FAQs</a></li>
        <li><a href="../resources.html?tab=booking">Book a call</a></li>
        <li><a href="../contact.html">Contact</a></li>
      </ul>
    </li>
    <li><a href="../contact.html" class="nav-cta">Get a Quote</a></li>
  </ul>
  <div class="nav-burger" onclick="toggleNav()"><span></span><span></span><span></span></div>
</nav>
HTML;
}

function footer(): string
{
    return <<<'HTML'
<footer>
  <div class="footer-bottom">
    <span>© 2026 Codecraft Technologies. GM-108 Adam Street, Accra.</span>
    <span><a href="mailto:hello@codecraftgh.com">hello@codecraftgh.com</a> · <a href="https://wa.me/233549739010">+233 549 739 010</a></span>
  </div>
</footer>
<script src="../motion.js"></script>
HTML;
}

function layout(string $title, string $description, string $canonical, string $body, string $jsonLd): string
{
    $t = h($title);
    $d = h($description);
    $c = h($canonical);

    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{$t}</title>
  <meta name="description" content="{$d}">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="canonical" href="{$c}">
  <meta property="og:type" content="article">
  <meta property="og:title" content="{$t}">
  <meta property="og:description" content="{$d}">
  <meta property="og:url" content="{$c}">
  <meta property="og:image" content="https://codecraftgh.com/assets/images/og-share-image.jpg">
  <meta property="og:locale" content="en_GH">
  <link rel="icon" type="image/svg+xml" href="../favicon.svg">
  <link rel="stylesheet" href="../styles.css?v=12">
  <script type="application/ld+json">{$jsonLd}</script>
</head>
<body>
{$body}
</body>
</html>
HTML;
}

$published = '2026-11-14';
$groups = [];
foreach ($posts as $post) {
    $groups[$post['group']][] = $post;
}

$cards = '';
foreach ($groups as $group => $items) {
    $cards .= '<section><span class="section-label">' . h($group) . '</span><h2 class="section-title">' . h($group) . '</h2><div class="blog-list" style="margin-top:0.8rem">';
    foreach ($items as $post) {
        $cards .= '<a href="' . h($post['slug']) . '.html"><strong>' . h($post['title']) . '</strong><span>' . h($post['description']) . '</span></a>';
    }
    $cards .= '</div></section>';
}

$itemList = [];
$position = 1;
foreach ($posts as $post) {
    $itemList[] = [
        '@type' => 'ListItem',
        'position' => $position++,
        'url' => 'https://codecraftgh.com/blog/' . $post['slug'] . '.html',
        'name' => $post['title'],
    ];
}

$indexLd = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Blog',
    'name' => 'CodeCraft Ghana blog',
    'description' => 'Practical notes on websites, stores, software, and marketing for businesses in Ghana. Prices are in cedis and exclude tax.',
    'url' => 'https://codecraftgh.com/blog/',
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Codecraft Technologies',
        'url' => 'https://codecraftgh.com',
    ],
    'blogPost' => array_map(static function (array $post) use ($published): array {
        return [
            '@type' => 'BlogPosting',
            'headline' => $post['title'],
            'url' => 'https://codecraftgh.com/blog/' . $post['slug'] . '.html',
            'datePublished' => $published,
        ];
    }, $posts),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$indexBody = nav() . <<<HTML

<div class="page-header media" style="--header-image:url('../assets/images/hero-office.jpg')">
  <span class="section-label">Blog</span>
  <h1>Answers before you ask for a quote.</h1>
  <p>Notes from Codecraft Technologies in Accra. The figures are the published starting prices, in Ghana cedis, and they exclude tax. Published 14 November 2026.</p>
</div>
<div class="blog-groups">
{$cards}
</div>
HTML
. footer();

file_put_contents(__DIR__ . '/index.html', layout(
    'Blog | Codecraft Technologies Ghana',
    'Guides on website cost, online stores, custom software, SEO, and marketing for businesses in Ghana. Prices in cedis from CodeCraft in Accra.',
    'https://codecraftgh.com/blog/',
    $indexBody,
    $indexLd
));

foreach ($posts as $post) {
    $canonical = 'https://codecraftgh.com/blog/' . $post['slug'] . '.html';
    $related = '';
    foreach ($post['related'] as $slug) {
        $related .= '<a href="' . h($slug) . '.html">' . h($bySlug[$slug]['title']) . '</a>';
    }
    $article = '<article class="blog-article"><p class="crumbs"><a href="../index.html">Home</a> · <a href="index.html">Blog</a> · ' . h($post['group']) . '</p>'
        . '<h1 class="section-title">' . h($post['title']) . '</h1>'
        . $post['html']
        . '<p><a href="' . h($post['service']) . '">' . h($post['serviceLabel']) . '</a> · <a href="../contact.html">Book the free 30-minute call</a></p>'
        . '<h2>Keep reading</h2><div class="blog-related">' . $related . '</div></article>';

    $ld = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $post['title'],
        'description' => $post['description'],
        'datePublished' => $published,
        'dateModified' => $published,
        'inLanguage' => 'en-GH',
        'mainEntityOfPage' => $canonical,
        'image' => 'https://codecraftgh.com/assets/images/og-share-image.jpg',
        'author' => ['@type' => 'Organization', 'name' => 'Codecraft Technologies', 'url' => 'https://codecraftgh.com'],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Codecraft Technologies',
            'url' => 'https://codecraftgh.com',
            'logo' => ['@type' => 'ImageObject', 'url' => 'https://codecraftgh.com/assets/images/logo.png'],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $body = nav() . '<section>' . $article . '</section>' . footer();
    file_put_contents(
        __DIR__ . '/' . $post['slug'] . '.html',
        layout($post['title'] . ' | CodeCraft Ghana', $post['description'], $canonical, $body, $ld)
    );
}

$sitemapPath = dirname(__DIR__) . '/sitemap.xml';
$sitemap = file_get_contents($sitemapPath);
$sitemap = preg_replace('#\s*<url>\s*<loc>https://codecraftgh\.com/blog/[^<]*</loc>.*?</url>#s', '', $sitemap);
$block = "\n  <url>\n    <loc>https://codecraftgh.com/blog/</loc>\n    <lastmod>{$published}</lastmod>\n    <changefreq>weekly</changefreq>\n    <priority>0.8</priority>\n  </url>\n";
foreach ($posts as $post) {
    $block .= "  <url>\n    <loc>https://codecraftgh.com/blog/{$post['slug']}.html</loc>\n    <lastmod>{$published}</lastmod>\n    <changefreq>monthly</changefreq>\n    <priority>0.6</priority>\n  </url>\n";
}
$sitemap = str_replace('</urlset>', $block . '</urlset>', $sitemap);
file_put_contents($sitemapPath, $sitemap);

echo 'Wrote ' . count($posts) . " posts\n";
