   (function ($) {
        var $container = $('.portfolio'),
            colWidth = function () {
                var w = $container.width(), 
                    columnNum = 1,
                    columnWidth = 0;
                if (w > 1200) {
                    columnNum  = 4;
                } else if (w > 900) {
                    columnNum  = 3;
                } else if (w > 600) {
                    columnNum  = 2;
                } else if (w > 300) {
                    columnNum  = 1;
                }
                columnWidth = Math.floor(w/columnNum);
                $container.find('.item').each(function() {
                    var $item = $(this),
                        multiplier_w = $item.attr('class').match(/item-w(\d)/),
                        width = multiplier_w ? columnWidth*multiplier_w[1]-0 : columnWidth-0;
                    $item.css({
                        width: width,
                    });
                });
                return columnWidth;
            }
                        
            function refreshWaypoints() {
                setTimeout(function() {
                }, 1000);   
            }
                        
            $('nav.portfolio-filter ul a').on('click', function() {
                var selector = $(this).attr('data-filter');
                $container.isotope({ filter: selector }, refreshWaypoints());
                $('nav.portfolio-filter ul a').removeClass('active');
                $(this).addClass('active');
                return false;
            });
                
            function setPortfolio() { 
                setColumns();
                $container.isotope('reLayout');
            }
    
            isotope = function () {
                $container.isotope({
                    resizable: true,
                    itemSelector: '.item',
                    masonry: {
                        columnWidth: colWidth(),
                        gutterWidth: 0
                    }
                });
            };
        isotope();
    }(jQuery));