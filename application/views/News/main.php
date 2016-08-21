<div class="container container-body news-main">
	<h2><?php echo lang('MAIN_NEWS_TITLE');?></h2>
	<hr style="margin-top: 15px;">
	<div id="article"></div>
	<div id="pagination"></div>
	
</div>
<script>
	$(document).ready(function() {
		LoadingPage();
		var limit= 10;
		var parameter = {
			limit: limit,
		}
		Article(parameter);
	});
	function Article(parameter) {
		var type = '<?php echo $this->uri->segment(1) ?>';
		if (type == 'news'){
			$url='<?php echo $_server?>../article/api/getArticle.do';
		}
		else{
			$url='<?php echo $_server?>../activity/api/getActivity.do';
		}
		var api = $.post( $url,parameter);
		api.done(function( data ) {
			var pag = $('#pagination').simplePaginator({
				totalPages: Math.ceil(data.data.recordsTotal/parameter.limit),
				nextLabel: '<?php echo lang('PAGINATION_NEXT') ?>',
				prevLabel: '<?php echo lang('PAGINATION_PREV') ?>',
				firstLabel: '<?php echo lang('PAGINATION_FIRST') ?>',
				lastLabel: '<?php echo lang('PAGINATION_LAST') ?>',
				pageChange: function(page) {
					parameter.page = page;
					var Article = $.post($url,parameter);
					Article.done(function( data ) {
						console.log(data);
						$('#article').html('');
						for (i = 0; i < data.data.dataList.length; i++) { 
							article = data.data.dataList[i];
							articleId = (type == 'news')? article.articleId : article.activityId;
							text = 	'<div class="row margin-t-25">'+
									'<div class="col-sm-3">'+
										'<div class="thumb" style="background-image: url('+article.coverPath+');"></div>'+
										// '<img src="'+article.coverPath+'" width="250" height="200">'+
									'</div>'+
									'<div class="col-sm-9" style="height:180px">'+
										'<h6 align="left" class="title-news">'+
											'<a href="<?php echo site_url()?>'+type+'dtl/'+articleId+'" target="_blank" title="'+article.title+'">'+
												article.title+
											'</a>'+
										'</h6>'+
										'<div id="activity-detail">'+ article.detail +'</div>'+
										'<div id="article-readmore">'+
											'<a href="<?php echo site_url()?>'+type+'dtl/'+articleId+'" target="_blank">'+
												'<span class="readmore">'+
													'<?php echo lang('MAIN_NEWS_READMORE');?>'+
												'</span>'+
											'</a>'+
										'</div>'+

										'<span class="publishdate">'+
											'วันที่ประกาศ '+ 
											FormatDT(article.createdDate)+
											' <i class="fa fa-user"></i> '+
											article.cntView+ 'คน'+
										'</span>'+
									'</div>'+
								'</div>';
							$('#article').append(text);
							UnLoadingPage()
						}
					});
					UnLoadingPage()
				}
			});
		});
	}
</script>