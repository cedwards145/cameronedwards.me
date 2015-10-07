<div class="row">
  <div class="col-xs-12 col-md-10 col-md-offset-1">
    <h2>{title}</h2>
    <?php if ($this->session->userdata('loggedIn')) :?>
      <h4>
        <a href="#blog/edit/{id}">Edit post</a> |
        <a href="#blog/delete/{id}">Delete post</a>
      </h4>
    <?php endif; ?>
    <i>{date}</i> <br />
    <div class="post-body">
      {content}
    </div>
  </div>

  <div class="col-xs-12 col-md-8 col-md-offset-2">
    <div id="disqus_thread"></div>
      <script type="text/javascript">
          /* * * CONFIGURATION VARIABLES * * */
          var disqus_shortname  = 'cameronedwards';
          var disqus_url        = '<?php echo base_url() ?>blog/post/{id}';

          /* * * DON'T EDIT BELOW THIS LINE * * */
          (function() {
              var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
              dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
          })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/highlight.js"></script>
<script>
$(document).ready(function() {
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});
</script>
