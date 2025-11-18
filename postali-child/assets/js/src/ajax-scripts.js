jQuery(document).ready(function($) {

    //filter by  category
    var taxonomyArr = [];
    var reusltsOffset = 0;
    


    function filterResults(e) {
        reusltsOffset = 0;
        var taxId = $(this).attr('data-option');
        var count = 0;
        var taxonomyArrCount = taxonomyArr.length;


        if( $(e.currentTarget).hasClass('clear-filters') ) {
            taxonomyArr = [];
        } else {
            if( !taxonomyArr.length ) {
                taxonomyArr.push(taxId);
            } else {
                taxonomyArr.forEach(function( item, index) {
                    count++;
                    if( taxId == item ) {
                        taxonomyArr.splice(index, 1);
                    } else if ( taxId !== item && count == taxonomyArrCount ) {
                        taxonomyArr.push(taxId);
                    }
                    
                });
            }
        }
        
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_filter_results.ajaxurl,
            data: {
                action: 'filter_results_by_category',
                filter: taxonomyArr
            },
            success: function(data) {
                $('.results-wrapper').empty();
                $('.results-wrapper').append(data);
                $('.ajax-load-more-btn').text('Load More').removeClass('disabled');
            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log('error: ' + errorThrown);
            }
        })
    }


    $('.filter-option').on('click', filterResults);
    
    $('.clear-filters').on('click', filterResults);

    $('.ajax-load-more-btn').on('click', function() {
        reusltsOffset = reusltsOffset + 10;    
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_filter_results.ajaxurl,
            data: {
                action: 'load_results_pagination',
                offset: reusltsOffset,
                filter: taxonomyArr
            },
            success: function(data) {
                if( data == 'end-of-results') {
                    $('.ajax-load-more-btn').text('End of Results').addClass('disabled');
                } else {
                    $('.results-wrapper').append(data);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log('error: ' + errorThrown);
            }
        })
        console.log(taxonomyArr);
    });
    



});