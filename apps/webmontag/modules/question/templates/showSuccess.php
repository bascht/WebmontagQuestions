<h1 class="question"><?php echo $question->getText() ?></h1>

  <div class="chart">
    <img id="vote_chart" src="#" />
  </div>

<div class="answers">
  <div class="answer yes">
    Ja
    <span class="tag"><?php echo $question->getYesTag(); ?></span>
    <div class="votes"></div>
  </div>
  <div class="answer no">
    Nein
    <span><?php echo $question->getNoTag(); ?></span>
    <div class="votes"></div>
  </div>
</div>


<div class="question" style="clear: both">
  <a href="http://twitter.com/home?status=<?php echo urlencode(sprintf('%s Ja: %s Nein: %s', $question->getText(), $question->getYesTag(), $question->getNoTag())); ?>"  ' title='Post this article on Twitter' target='_blank'>Diese Frage bei Twitter stellen</a>
</div>

<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		var Chart = function(){
			var store = {};

			return {
				set: function(type, count) {
					store[type] = count;
					return this;
				},
				render: function() {
					var data = [], list = [];
					for (var name in store) if (store.hasOwnProperty(name)) {
						
						list.push(name);
						data.push(store[name]);
					}

					if (data.length > 0) {
						$('#vote_chart').attr('src', 'http://chart.apis.google.com/chart?cht=p3&chs=400x200&chd=t:' + data.join(',') + '&chl=' + list.join('|'));
					}
				}
			};
		}();

		function fill_answers(query, type, box) {
			$.getJSON('http://search.twitter.com/search.json?callback=?&q='+escape(query), function(data, query) {
				$.each(data.results, function(i, item){
					$(box).append('<p class="vote"><img src='+item.profile_image_url+' title='+item.from_user+' /></p>');
				});

				Chart.set(type, data.results.length);
				Chart.render();
			});
		}
    
		fill_answers('<?php echo $question->getYesTag(); ?>', 'yes', $('.answer.yes .votes'));
		fill_answers('<?php echo $question->getNoTag(); ?>', 'no', $('.answer.no .votes'));
	});
</script>
