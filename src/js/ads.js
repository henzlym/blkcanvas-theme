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
                        slot.div)
                    .addService(googletag.pubads());
            });

            googletag.pubads().enableSingleRequest();
            googletag.enableServices();
        });
        slots.forEach( slot => {
            googletag.cmd.push(function() {
                googletag.display(slot.div);
            });
        });

    });

})();