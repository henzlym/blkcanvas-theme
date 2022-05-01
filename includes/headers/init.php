<?php
/**
 * How to add .htaccess code through a function?
 * @see https://wordpress.stackexchange.com/questions/36233/how-to-add-htaccess-code-through-a-function
 */

function bca_add_secure_headers()
{
    $htaccess_file = ABSPATH.'.htaccess';
    $insertion = array(
        '<IfModule mod_headers.c>',
        '   <FilesMatch "\.(php|html)$">',
        '       Header always set X-Content-Type-Options "nosniff"',
        '       Header set X-XSS-Protection "1; mode=block"',
        '       Header set Strict-Transport-Security "max-age=63072000; includeSubDomains; preload" env=HTTPS',
        '       Header set Content-Security-Policy "script-src \'unsafe-inline\' \'unsafe-eval\' http: https:"',
        '       Header set Referrer-Policy "same-origin"',
        '       Header set Feature-Policy "geolocation \'self\'"',
        '   </FilesMatch>',
        '</IfModule>'
    );
    return insert_with_markers($htaccess_file, 'BCA_SECURE_HEADERS', $insertion);
}

function bca_add_compression_headers()
{
    $htaccess_file = ABSPATH.'.htaccess';
    $insertion = array(
        '<IfModule mod_deflate.c>',
        '   # Compress HTML, CSS, JavaScript, Text, XML and fonts',
        '   AddOutputFilterByType DEFLATE application/javascript',
        '   AddOutputFilterByType DEFLATE application/rss+xml',
        '   AddOutputFilterByType DEFLATE application/vnd.ms-fontobject',
        '   AddOutputFilterByType DEFLATE application/x-font',
        '   AddOutputFilterByType DEFLATE application/x-font-opentype',
        '   AddOutputFilterByType DEFLATE application/x-font-otf',
        '   AddOutputFilterByType DEFLATE application/x-font-truetype',
        '   AddOutputFilterByType DEFLATE application/x-font-ttf',
        '   AddOutputFilterByType DEFLATE application/x-javascript',
        '   AddOutputFilterByType DEFLATE application/xhtml+xml',
        '   AddOutputFilterByType DEFLATE application/xml',
        '   AddOutputFilterByType DEFLATE font/opentype',
        '   AddOutputFilterByType DEFLATE font/otf',
        '   AddOutputFilterByType DEFLATE font/ttf',
        '   AddOutputFilterByType DEFLATE image/svg+xml',
        '   AddOutputFilterByType DEFLATE image/x-icon',
        '   AddOutputFilterByType DEFLATE text/css',
        '   AddOutputFilterByType DEFLATE text/html',
        '   AddOutputFilterByType DEFLATE text/javascript',
        '   AddOutputFilterByType DEFLATE text/plain',
        '   AddOutputFilterByType DEFLATE text/xml',
        '   # Remove browser bugs (only needed for really old browsers)',
        '   BrowserMatch ^Mozilla/4\.0[678] no-gzip',
        '   BrowserMatch ^Mozilla/4\.0[678] no-gzip',
        '   BrowserMatch \bMSIE !no-gzip !gzip-only-text/html',
        '   Header append Vary User-Agent',
        '</IfModule>'
    );
    return insert_with_markers($htaccess_file, 'BCA_COMPRESSION_HEADERS', $insertion);
}

function bca_add_cache_headers()
{
    $htaccess_file = ABSPATH.'.htaccess';
    $insertion = array(
        '',
        '# BROWSER CACHING USING EXPIRES HEADERS',
        '<IfModule mod_expires.c>',
        '   ExpiresActive on',
        '   ExpiresDefault "access plus 2 days"',
        '   ExpiresByType image/jpg "access plus 1 year"',
        '   ExpiresByType image/svg+xml "access 1 year"',
        '   ExpiresByType image/gif "access plus 1 year"',
        '   ExpiresByType image/jpeg "access plus 1 year"',
        '   ExpiresByType image/webp "access plus 1 year"',
        '   ExpiresByType image/png "access plus 1 year"',
        '   ExpiresByType text/css "access plus 1 year"',
        '   ExpiresByType text/javascript "access plus 1 year"',
        '   ExpiresByType application/javascript "access plus 1 year"',
        '   ExpiresByType application/x-shockwave-flash "access plus 1 year"',
        '   ExpiresByType image/ico "access plus 1 year"',
        '   ExpiresByType image/x-icon "access plus 1 year"',
        '   ExpiresByType text/html "access plus 600 seconds"',
        '</IfModule>',
        '',
        '# BROWSER CACHING USING CACHE-CONTROL HEADERS',
        '<IfModule mod_headers.c>',
        '   # One year for image and video files',
        '   <filesMatch ".(flv|gif|ico|jpg|jpeg|mp4|mpeg|png|svg|swf|webp)$">',
        '       Header set Cache-Control "max-age=31536000, public"',
        '   </filesMatch>',
        '',
        '   # One month for JavaScript and PDF files',
        '   <filesMatch ".(js|pdf)$">',
        '       Header set Cache-Control "max-age=31536000, public"',
        '   </filesMatch>',
        '',
        '   # One week for CSS files',
        '   <filesMatch ".(css)$">',
        '       Header set Cache-Control "max-age=31536000, public"',
        '   </filesMatch>',
        '</IfModule>',
        ''
    );
    return insert_with_markers($htaccess_file, 'BCA_CACHE_HEADERS', $insertion);
}

// add_action("admin_init", 'bca_add_secure_headers');
// add_action("admin_init", 'bca_add_cache_headers');
// add_action("admin_init", 'bca_add_compression_headers');