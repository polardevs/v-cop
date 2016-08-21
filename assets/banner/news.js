function scriptNews(p){
	var article = $.post(p._server+'../article/api/getArticle.do?limit=1');
	article.done(function( data ) {
		var news = data.data.dataList[0];
		$('#article-img').css('background-image', 'url(' + news.coverPath + ')');
		$('#article-title').html(news.
			title);
		$('#article-detail').html(news.detail);
		$('#article-updatedDate').html('วันที่ประกาศ '+ FormatDT(news.updatedDate) +' <i class="fa fa-user"></i> '+ news.cntView  + ' คน');
		$('#article-readmore').html('<a href="'+p.base_url+'newsdtl/'+ news.articleId +'" target="_blank"><span class="readmore">'+p.READMORE+'...</span></a>');
	});

	var activity = $.post(p._server+'../activity/api/getActivity.do?limit=1');
	activity.done(function( data ) {
		var activitys = data.data.dataList[0];
		$('#activity-img').css('background-image', 'url(' + activitys.coverPath + ')');
		$('#activity-title').html(activitys.title);
		$('#activity-detail').html(activitys.detail);
		$('#activity-updatedDate').html('วันที่ประกาศ '+ FormatDT(activitys.updatedDate) +' เข้าชม '+ activitys.cntView + ' คน');
		$('#activity-readmore').html('<a href="'+p.base_url+'activitydtl/'+ activitys.activityId +'" target="_blank"><span class="readmore">'+p.READMORE+'...</span></a>');
	});
}