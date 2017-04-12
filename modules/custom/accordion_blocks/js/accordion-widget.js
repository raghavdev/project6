(function($, Drupal) {
    Drupal.behaviors.accordion_blocks = {
        attach: function (context, settings) {
            $('.accordion_blocks_container', context).accordion({header: "h2.accordion-title",  icons: false, autoHeight: true, collapsible: true, active : 'none'});
        }
    }
})(jQuery, Drupal);