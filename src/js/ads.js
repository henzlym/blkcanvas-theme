import '../scss/components/ads.scss';

(function() {
    window.addEventListener('load', function(){

        /**
         * Display a test ad
         * @link https://developers.google.com/publisher-tag/samples/display-test-ad
         */
        window.googletag = window.googletag || {
            cmd: []
        };
        let slots = [
            {
                path:'/6355419/Travel/Europe/France/Paris',
                size:[300, 250],
                div:'box-ad-incontent_1'
            },
            {
                path:'/6355419/Travel/Europe/France',
                size:[300, 250],
                div:'box-ad-incontent_2'
            },
            {
                path:'/6355419/Travel/Europe/France',
                size:[300, 250],
                div:'box-ad-sidebar_1'
            },
            {
                path:'/6355419/Travel/Europe',
                size:[728, 90],
                div:'banner-ad_header'
            },
            {
                path:'/6355419/Travel/Europe',
                size:[728, 90],
                div:'banner-ad_footer'
            }
        ];

        googletag.cmd.push(function() {
            slots.forEach( slot => {
                googletag
                    .defineSlot(
                        slot.path, 
                        slot.size, 
                        slot.div
                    )
                    .setTargeting('test', 'lazyload')
                    .addService(googletag.pubads());
            });

            googletag.pubads().enableLazyLoad({
                // Fetch slots within 5 viewports.
                fetchMarginPercent: 0,
                // Render slots within 2 viewports.
                renderMarginPercent: 0,
                // Double the above values on mobile, where viewports are smaller
                // and users tend to scroll faster.
                mobileScaling: 1.0
            });
              
            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
            
            googletag.display(slots[0].div);

        });
        

    });

})();