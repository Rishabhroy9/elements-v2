jQuery(document).ready(function( $ ) {
	$('#news-masonry').imagesLoaded( function() {
    let $grid = $('.grid').masonry({
        itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
        percentPosition: true,
        transitionDuration: 0,
    });
    
    const allArticles = $('#news-masonry article');
    let articles = allArticles.toArray();
        loadMore = $('#loadMore');
        ppp = 7;
        index = 0;
        totalArticles = allArticles.length;
    traverseArticles(articles);

    function traverseArticles(articles, startIndex = index, perPage = ppp){
        let limit = startIndex + perPage;
        for(let i = startIndex; i < limit; i++){
            manipulateArticle(articles[i]);
        }
        index = limit;
        $grid.masonry('layout');
    }

    //Specify how the articles should be shown
    function manipulateArticle(article){
        $(article).removeClass('hide');
    }

    function revealMoreNews(){
        traverseArticles(articles, index, ppp);
        if(index >= articles.length){
            $(this).remove();
        }
    }
	
    $(loadMore).on('click', revealMoreNews);
	});
});