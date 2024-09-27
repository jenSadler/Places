<form action="/" method="get" autocomplete="off" class="input-group mb-3">
  <div class="input-group search-input">
    <input type="search" class="search-box w-100 form-control " placeholder="Search" aria-label="search nico" name="s" id="keyword" value="<?php echo esc_attr( get_search_query() ); ?>">
      <div class="input-group-append">
         <span class="input-group-append p-0">
          <i class="fas fa-search text-muted"></i>
         </span>
    </div>
   <!--<button class="btn w-100 page-list-search-button my-2 my-sm-2" id="search-button" >Search</button>-->
  </div>
</form>