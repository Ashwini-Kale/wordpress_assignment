<form role="search" method="get" class="searchform group" id="searchform" action="<?php echo home_url( '/' ); ?>">

 <input type="text" name="stores" title="stores" id="stores"  placeholder="What are you lokking for" value="<?php get_search_query();?>">
 <!-- <input type="hidden" name="post_type"  value=""> -->
 <input type="submit" value="Search" id="searchsubmit" >
</form>