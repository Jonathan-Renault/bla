!function(e){e.sifs={containerSelector:".sifs-container",postSelector:".sifs-post",paginationSelector:".sifs-pagination",nextSelector:"a.sifs-next",loadingHtml:"Loading...",show:function(e){e.show()},nextPageUrl:null,init:function(s){for(var o in s)e.sifs[o]=s[o];e(function(){e.sifs.extractNextPageUrl(e("body")),e(".page-content").bind("scroll",e.sifs.scroll),e.sifs.scroll()})},scroll:function(){e.sifs.nearBottom()&&e.sifs.shouldLoadNextPage()&&e.sifs.loadNextPage()},nearBottom:function(){var s=e(window).scrollTop(),o=e(window).height(),t=e(e.sifs.containerSelector).find(e.sifs.postSelector).last().offset();if(t)return s>t.top-o},shouldLoadNextPage:function(){return!!e.sifs.nextPageUrl},loadNextPage:function(){$$("body");var s=e.sifs.nextPageUrl,o=e(e.sifs.loadingHtml);e.sifs.nextPageUrl=null,o.appendTo(e.sifs.containerSelector),app.progressbar.show(),e.get(s,function(s){var t=e(s),n=t.find(e.sifs.containerSelector).find(e.sifs.postSelector);o.remove(),e.sifs.show(n.hide().appendTo(e.sifs.containerSelector)),e.sifs.extractNextPageUrl(t),e.sifs.scroll(),app.progressbar.hide(),new LazyLoad})},extractNextPageUrl:function(s){var o=s.find(e.sifs.paginationSelector);e.sifs.nextPageUrl=o.find(e.sifs.nextSelector).attr("href"),o.remove()}}}(jQuery);
jQuery.sifs.init({containerSelector:wpifs_options.container,postSelector:wpifs_options.post,paginationSelector:wpifs_options.pagination,nextSelector:wpifs_options.next,loadingHtml:'<div class="wpifs-loading">'+wpifs_options.loading+"</div>",show:function(i){i.fadeIn(700)}});